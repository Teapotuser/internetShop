<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Product\StoreRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  Список товаров
    public function index()
    {
        $products = Product::paginate(6);       
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Станица создания нового товара
    public function create()
    {
        $collections = Collection::all();
        $categories = Category::all();
        return view('admin.product.create', compact('collections', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Сохранение нового товара
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        if ($request->file('picture')){
            $file = $request->file('picture');            
            $picture = Storage::putFile('/public/Products/'.$validated['article'], $file);
          
            $validated['picture'] =$picture;
        }
        $collection = Collection::create($validated);      
        Storage::makeDirectory('/public/Products/' . $product->article);
        
        return redirect(route('dashboard.poduct.index'))->with('success', 'Товар "' . $product->title . '" добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    //  Отображение View (формы) товара
    public function show(Product $product)
    {
        $collections = Collection::all();
        $categories = Category::all();
        return view('admin.product.show', compact('collections', 'categories', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // Станица (форма) редактирования товара
    public function edit(Product $product)
    {
        $collections = Collection::all();
        $categories = Category::all();
        return view('admin.product.edit', compact('collections', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // Сохранение обновленного (отредактированного) товара
    public function update(StoreRequest $request, Product $product)
    {
        $validated = $request->validated();
        if ($request->file('picture')||$request->validated('removeImage')) {
            if ($product->picture) {
                // Storage::delete($category->picture);
                Storage::deleteDirectory('/public/Products/' . $validated['code']);
                $collection->picture=null;
            }
        }
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $picture = Storage::putFile('/public/Products/' . $validated['code'], $file);
            $validated['picture'] = $picture;
        }
        $product->update($validated);
        return redirect(route('dashboard.product.index'))->with('success', 'Товар "' . $product->title . '" успешно сохранен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        if ($product->picture) {
            // Storage::delete($category->picture);
            Storage::deleteDirectory('/public/Products/' . $collection->code);
        }
    }
}
