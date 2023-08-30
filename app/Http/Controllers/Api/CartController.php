<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\Client\NewOrder;
use App\Notifications\Client\NewRegistration;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        return view('cart');
    }

    public function clear(): JsonResponse
    {
        Session::forget('cart');
        $cart = [];
        return response()->json(['cart' => array_values($cart)]);
    }

    public function getCart(): JsonResponse
    {
        $cart = Session::get('cart');

        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [];
            Session::put('cart', $cart);
        }

        return response()->json(['cart' => array_values($cart)]);
    }

    public function addToCart($id, $quantity): JsonResponse
    {
        if ($quantity <= 0) {
            $quantity = 1;
        }
        
        $product = Product::where('article', '=', $id)->first();

        if (!$product) {

            return response()->json(['message' => 'product not found'], 404);
        }

        $cart = Session::get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $id => [
                    "id" => $id,
                    "name" => $product->title,
                    "quantity" => $quantity && is_numeric($quantity) ? $quantity : 1,
                    "price" => $product->issetDiscount() ? $product->getPriceWithDiscount() : $product->price,
                    "picture" => Storage::url($product->picture),
                    "url" => route('product.show', $id)
                ]
            ];

            Session::put('cart', $cart);

            return response()->json(['message' => $product->title . ' добавлен в корзину!', 'type' => 'added', 'cart' => array_values($cart)]);

        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            if ($quantity && is_numeric($quantity)) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + $quantity;
            } else {
                $cart[$id]['quantity']++;
            }

            Session::put('cart', $cart);
            return response()->json([
                'msg' => $cart[$id]['name'] . ' в корзине ' . $cart[$id]['quantity'] . ' шт!',
                'type' => 'increase',
                'cart' => array_values($cart)]);
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $id,
            "name" => $product->title,
            "quantity" => $quantity,
            "price" => $product->price,
            "picture" => Storage::url($product->picture),
            "url" => route('product.show', $id)
        ];

        Session::put('cart', $cart);

        return response()->json(['msg' => $product->title . ' добавлен в корзину!', 'type' => 'added', 'cart' => array_values($cart)]);
    }

    public function update(Request $request): JsonResponse
{
    $cart = Session::get('cart');

    if ($request->id and $request->quantity) {
        $cart[$request->id]["quantity"] = $request->quantity;
        Session::put('cart', $cart);
        $msg = $cart[$request->id]['name'] . ' добавлен в корзину!';
        $type = 'added';
        } else {
            $msg = 'Данного товара нет в корзине';
            $type = 'error';
        }

        return response()->json(['msg' => $msg, 'type' => $type, 'cart' => array_values($cart)]);
    }

    public function remove(Request $request): JsonResponse
    {
        $cart = Session::get('cart');
        if ($request->id) {

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                Session::put('cart', $cart);
            }
        }
        return response()->json(['msg' => 'Product removed successfully', 'cart' => array_values($cart)]);
    }

    public function checkout()
    {
        $items = Session::get('cart');
        $sum = 0;
        if (is_array($items)) {
            array_walk($items, function (&$item, $key) {
                $item['total'] = round($item['price'] * $item['quantity'], 2);
            });
            $sum = array_sum(array_column($items, 'total'));
        }


        return view('checkout', compact(['sum', 'items']));
    }

    public function storeOrder(Request $request)
    {

        if (!is_array(Session::get('cart')) || count(Session::get('cart')) == 0) {
            return back()->with(['error' => 'Корзина пуста']);
        }
        // $admins = User::where('role', 'admin')->get();
        $create_account = $request->get('create-account');
        if ($create_account) {
            $request->validate([
                'email' => ['required', 'unique:users'],
                'name' => ['required'],
                'last_name' => ['required'],
                'phone_number' => ['required'],
                'password' => ['required', 'confirmed'],
            ]);

            $user = User::create([
                'name' => $request->get('name'),
                'last_name' => $request->get('last_name'),
                'phone_number' => $request->get('phone_number'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
            ]);

            $request->merge(['user_id' => $user->id]);

            // $user->notify(new NewRegistration($user, $request->get('password')));
        }
        $cart_items = Session::get('cart');
        $items = [];
        foreach ($cart_items as $item) {
            $product = Product::where('article', $item['id'])->first();
            if ($product) {
                $items[] = ['price' => $item['price'] * 100, 'quantity' => $item['quantity'], 'product_id' => $product['id']];
            }
        }

        $order = Order::create($request->all());

        $order->order_products()->createMany($items);
        $order->load('order_products');

        Session::forget('cart');

       /*  if (isset($user) && $user != null) {
            $user->notify(new NewOrder($order));
        } else {
            Notification::route('mail', [
                $request->get('email') => $request->get('name') . ' ' . $request->get('last_name'),
            ])->notify(new NewOrder($order));
        }

        foreach ($admins as $admin) {
            $admin->notify(new \App\Notifications\Admin\NewOrder($order));
            if ($create_account) {
                $admin->notify(new \App\Notifications\Admin\NewRegistration($user));
            }
        }  */

        return view('orderconfirm', compact(['order', 'create_account']));
    }
}
