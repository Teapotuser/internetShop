<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Category;
use App\Models\ProductImages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Product\StoreRequest;
use Illuminate\Support\Facades\Storage;
use View;

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
        $validated['price'] = $validated['price'] * 100;
        $product = Product::create($validated);

        if ($request->file('picture')){
            $file = $request->file('picture');            
            // $picture = Storage::putFile('/public/Products/'.$validated['article'], $file);
            $picture = Storage::putFileAs('/public/Products/'. $product->collection_id .'/'. $product->id, $file, $file->getClientOriginalName());
            // $picture = Storage::putFile('/public/Products/' . $product->id, $file);
            $product->update(['picture' => $picture]);
          
            // $validated['picture'] =$picture;
        }
        /* $collection = Collection::create($validated);      
        Storage::makeDirectory('/public/Products/' . $product->article); */

        if ($request->file('preview_path')) {
            foreach ($request->file('preview_path') as $key => $item) {
                $file = $item;
                // $picture = Storage::putFile('/public/Products/' . $product->id, $file);
                // $preview_path = $file->storeAs('/public/Products/' . $product->collection_id . '/' . $product->id . '/carousel/preview', $file->getClientOriginalName());
                $preview_path = Storage::putFileAs('/public/Products/'. $product->collection_id .'/'. $product->id . '/carousel/preview', $file, $file->getClientOriginalName());
                if (str_starts_with($key, 'img')) {
                    $image = ProductImages::find(trim($key, 'img'));
                    if (Storage::exists($image->preview_path)) {
                        Storage::delete($image->preview_path);
                    }
                    $image->update(['preview_path' => $preview_path]);
                } else {
                    $preview_paths[] = $preview_path;
                }
                // $product->update(['picture' => $picture]);
            }
        }
        
        if ($request->file('path')) {
            foreach ($request->file('path') as $key => $item) {
                $file = $item;
                $path = $file->storeAs('/public/Products/' . $product->collection_id . '/' . $product->id . '/carousel', $file->getClientOriginalName());
                if (str_starts_with($key, 'img')) {
                    $image = ProductImages::find(trim($key, 'img'));
                    if (Storage::exists($image->path)) {
                        Storage::delete($image->path);
                    }
                    $image->update(['path' => $path]);
                } else {
                    $paths[] = $path;
                }
            }
        }

        if (isset($paths) && isset($preview_paths)) {
            $images = array_combine($preview_paths, $paths);
            $store_images = [];
            $x = 0;
            foreach ($images as $preview => $image) {
                $store_images[] = [
                    'counter' => $x,
                    'path' => $image,
                    'preview_path' => $preview
                ];
                $x++;
            }
            $product->images()->createMany($store_images);
        }

        return redirect(route('dashboard.product.index'))->with('success', 'Товар "' . $product->title . '" добавлен');
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

        //Если у товара меняется collection_id:
        if ($validated['collection_id'] != $product->collection_id) {
            Storage::move('/public/Products/' . $product->collection_id . '/' . $product->id,'/public/Products/' . $validated['collection_id'] . '/' . $product->id);
            $product->collection_id = $validated['collection_id'];
            if ($product->picture) {
                $new_product_picture_path = explode('/',$product->picture);
                $new_product_picture_path[1]=$validated['collection_id'];

                $product->picture = implode('/',$new_product_picture_path);
            }

            $product->save();
            foreach ($product->images as $image) {
                $preview_path_new = explode('/', $image->preview_path);
                $preview_path_new[1] = $product->collection_id;
                $preview_path_new = implode('/', $preview_path_new);
                $path_new = explode('/', $image->path);
                $path_new[1] = $product->collection_id;
                $path_new = implode('/', $path_new);
                $image->update([
                    'preview_path' => $preview_path_new,
                    'path' => $path_new,
                ]);
            }
        }

        if ($request->file('picture')||$request->validated('removeImage')) {
            if ($product->picture) {
                // Storage::delete($category->picture);
                // Storage::deleteDirectory('/public/Products/' . $validated['code']);
                Storage::delete($product->picture);// удаляем только картинку, без папки
                $product->picture = null;
            }
        }
        if ($request->file('picture')) {
            $file = $request->file('picture');
            // $picture = Storage::putFile('/public/Products/' . $validated['code'], $file);
            // $picture = Storage::putFile('/public/Products/' . $product->id, $file);
            $picture = Storage::putFileAs('/public/Products/'. $product->collection_id .'/'. $product->id, $file, $file->getClientOriginalName());
            $validated['picture'] = $picture;
        }

        if ($request->file('preview_path')) {
            foreach ($request->file('preview_path') as $key => $item) {
                $file = $item;
                $preview_path = $file->storeAs('/public/Products/' . $product->collection_id . '/' . $product->id . '/carousel/preview', $file->getClientOriginalName());
                // dump($key,str_starts_with($key,'img'),trim($key,'img'));
                if (str_starts_with($key,'img')) {
                    $image = ProductImages::find(trim($key,'img'));
                    if (Storage::exists($image->preview_path)) {
                        Storage::delete($image->preview_path);
                    }
                    $image->update(['preview_path' => $preview_path]);
                } else {
                    $preview_paths[] = $preview_path;
                }
            }
        }

        if ($request->file('path')) {
            foreach ($request->file('path') as $key => $item) {
                $file = $item;
                $path = $file->storeAs('/public/Products/' . $product->collection_id . '/' . $product->id . '/carousel', $file->getClientOriginalName());
                if (str_starts_with($key,'img')) {
                    $image = ProductImages::find(trim($key,'img'));
                    if (Storage::exists($image->path)) {
                        Storage::delete($image->path);
                    }
                    $image->update(['path' => $path]);
                } else {
                    $paths[] = $path;
                }
            }
        }

        if (isset($paths) && isset($preview_paths)) {
            $images = array_combine($preview_paths, $paths);
            $store_images = [];
            $x = 0;
            foreach ($images as $preview => $image) {
                $store_images[] = [
                    'counter' => $x,
                    'path' => $image,
                    'preview_path' => $preview
                ];
                $x++;
            }
            $product->images()->createMany($store_images);
        }

        $validated['price'] = $validated['price'] * 100;
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
        if ($product->images()->count()) {
            //удаляем только папку с каруселью
            if (Storage::deleteDirectory('/public/Products/' . $product->collection_id . '/' . $product->id . '/carousel')) {
                $product->images()->delete();
            }
        }
        return redirect(route('dashboard.product.index'))->with('success', 'Товар "' . $product->title . '" успешно удален');
    }
}
