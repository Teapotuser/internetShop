<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Список категорий
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Станица создания новой категории
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Сохранение новой категории
    public function store(StoreRequest $request)
    {
        // dd($request->file('picture'));
        $validated = $request->validated();
        $category = Category::create($validated);
        if ($request->file('picture')){
            $file = $request->file('picture');            
            // $picture = Storage::putFile('/public/categories/'.$validated['code'], $file);
            // $picture = Storage::putFile('/public/categories/' . $category->id, $file->getClientOriginalName());
            $picture = $file->storeAs('/public/categories/' . $category->id, $file->getClientOriginalName());
          
            // $validated['picture'] =$picture;
            $category->picture = $picture;
            $category->save();
        }
        // $category = Category::create($validated);      

        return redirect(route('dashboard.category.index'))->with('success', 'Категория "' . $category->name . '" добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    //  Отображение категории
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // Станица редактирования категории
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // Сохранение обновленной (отредактированной) категории
    public function update(StoreRequest $request, Category $category)
    {
        $validated = $request->validated();
        if ($request->file('picture')||$request->validated('removeImage')) {
            if ($category->picture) {
                // Storage::delete($category->picture);
                // Storage::deleteDirectory('/public/categories/' . $validated['code']);
                Storage::deleteDirectory('/public/categories/' . $category->id);
                $category->picture = null;
            }
        }
        if ($request->file('picture')) {
            $file = $request->file('picture');

            // $picture = Storage::putFile('/public/categories/' . $validated['code'], $file);
            // $picture = Storage::putFile('/public/categories/' . $category->id, $file);
            $picture = $file->storeAs('/public/categories/' . $category->id, $file->getClientOriginalName());
            $validated['picture'] = $picture;
        }
        $category->update($validated);
        return redirect(route('dashboard.category.index'))->with('success', 'Категория "' . $category->name . '" успешно сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // Удаление категории
    public function destroy(Category $category)
    {
        // $category->delete();
        $category->forceDelete();
        if ($category->picture) {
            // Storage::delete($category->picture);
            // Storage::deleteDirectory('/public/categories/' . $category->code);
            Storage::deleteDirectory('/public/categories/' . $category->id);
        }
        // return back();
        return redirect(route('dashboard.category.index'))->with('success', 'Категория "' . $category->name . '" удалена');
    }
}
