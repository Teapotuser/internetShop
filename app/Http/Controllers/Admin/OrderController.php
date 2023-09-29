<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
// use App\Models\OrderProducts;
use App\Models\Product;
use App\Models\User;
use App\Events\OrderCreated;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Order\StoreOrder;
use App\Http\Requests\Admin\Order\StoreRequest;
use App\Http\Requests\Admin\Order\UpdateOrder;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Список заказов
    public function index()
    {
        
       /*  $orders = Order::all();
        
        $orders->map(function ($order) {
            $order['orderPrice'] = $order->orderPrice;
            return $order;
        }); */
        $orders = Order::paginate(6);

        // $orderPrices = $orders->orderPrice();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Станица создания нового заказа
    public function create()
    {
        $products = Product::query()->IsActive()->get();
        $users = User::where('role', 'user')->get();
        return view('admin.order.create', compact(['products', 'users']));      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {
        $products = array_combine($request->get('products'), $request->get('quantity'));
        $append_products_array = [];
        foreach ($products as $product => $value) {
            $prod = Product::find($product);
            $append_products_array[] = [
                'product_id' => $product,
                'quantity' => $value,
                'price' => $prod->issetDiscount() ? $prod->getPriceWithDiscount() * 100 : $prod->price * 100
            ];
        }

        $order = Order::create([
            'user_id' => $request->validated('user_id'),
            'name' => $request->validated('name'),
            'last_name' => $request->validated('last_name'),
            'email' => $request->validated('email'),
            'phone_number' => $request->validated('phone_number'),
            'address' => $request->validated('delivery_method') == 'post' ? $request->validated('address') : null,
            'city' => $request->validated('delivery_method') == 'post' ? $request->validated('city') : null,
            'zip_code' => $request->validated('delivery_method') == 'post' ? $request->validated('zip_code') : null,
            'delivery_method' => $request->validated('delivery_method'),
            'payment_method' => $request->validated('payment_method'),
            'status' => $request->validated('status'),
            'is_paid' => $request->validated('is_paid') == 'on',
            'track_number' => $request->validated('track_number'),
            'payment_date' => $request->validated('payment_date'),
        ]);

        $order->order_products()->createMany($append_products_array);

        OrderCreated::dispatch($order);

        return to_route('dashboard.order.index')->with('success', 'Заказ №"' . $order->id . '" создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
         return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $statuses = collect([
            ['value' => 'New', 'name' => 'Новый'],
            // ['value' => 'Waiting', 'name' => 'Ожидает подтверждения'],
            ['value' => 'Paid', 'name' => 'Оплачен'],
            ['value' => 'Sent', 'name' => 'Отправлен'],
            ['value' => 'Cancelled', 'name' => 'Отменен'],
            ['value' => 'Finished', 'name' => 'Завершен']
        ]);
        $products = Product::query()->IsActive()->get();
        $users = User::where('role', 'user')->get();
        return view('admin.order.edit', compact(['products', 'users', 'order','statuses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder $request, Order $order)
    {
        $products = array_combine($request->get('products'), $request->get('quantity'));
        $append_products_array = [];
        foreach ($products as $product => $value) {
            $prod = Product::find($product);
            $append_products_array[] = [
                'product_id' => $product,
                'quantity' => $value,
                'price' => $prod->issetDiscount() ? $prod->getPriceWithDiscount() * 100 : $prod->price * 100
            ];
        }

        $order->update([
            'user_id' => $request->validated('user_id'),
            'name' => $request->validated('name'),
            'last_name' => $request->validated('last_name'),
            'email' => $request->validated('email'),
            'phone_number' => $request->validated('phone_number'),
            'address' => $request->validated('delivery_method') == 'post' ? $request->validated('address') : null,
            'city' => $request->validated('delivery_method') == 'post' ? $request->validated('city') : null,
            'zip_code' => $request->validated('delivery_method') == 'post' ? $request->validated('zip_code') : null,
            'delivery_method' => $request->validated('delivery_method'),
            'payment_method' => $request->validated('payment_method'),
            'status' => $request->validated('status'),
            'is_paid' => $request->validated('is_paid') == 'on',
            'track_number' => $request->validated('track_number'),
            'payment_date' => $request->validated('payment_date'),
        ]);


        $order->order_products()->delete();
        $order->order_products()->createMany($append_products_array);

        return to_route('dashboard.order.index')->with('success', 'Заказ №"' . $order->id . '" обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return to_route('dashboard.order.index')->with('success', 'Заказ №"' . $order->id . '" удален');
    }
}
