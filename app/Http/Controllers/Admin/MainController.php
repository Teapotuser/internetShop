<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use App\Models\Collection;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;

class MainController extends Controller
{
    public function index()
    {        
       /*  $orders = Order::all(); */
       $collections_count = Collection::query()->count();
       $orders_count = Order::query()->count();
       $products_count = Product::query()->count();

        $orders = Order::query()->orderBy('created_at', 'desc')->limit(6)->get();

        // $orderPrices = $orders->orderPrice();
        return view('admin.index', compact('collections_count', 'orders_count', 'products_count', 'orders'));        
    }
}
