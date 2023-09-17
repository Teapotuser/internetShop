<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Collection\StoreRequest;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  Список коллекций
    public function index()
    {
        $collections = Collection::all();
        return view('admin.collection.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Станица создания новой коллекции
    public function create()
    {
        return view('admin.collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Сохранение новой коллекции
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $collection = Collection::create($validated);
        if ($request->file('picture')){
            $file = $request->file('picture');            
            // $picture = Storage::putFile('/public/collections/'.$validated['code'], $file);
            $picture = Storage::putFileAs('/public/collections/'. $collection->id, $file, $file->getClientOriginalName());
            // $validated['picture'] =$picture;
            $collection->picture = $picture;
            $collection->save();
        }
        // $collection = Collection::create($validated);      
        Storage::makeDirectory('/public/Products/' . $collection->id);
        
        return redirect(route('dashboard.collection.index'))->with('success', 'Коллекция "' . $collection->name . '" добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    //  Отображение View коллекции
    public function show(Collection $collection)
    {
        return view('admin.collection.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    // Станица (форма) редактирования коллекции
    public function edit(Collection $collection)
    {
        return view('admin.collection.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    // Сохранение обновленной (отредактированной) коллекции
    public function update(StoreRequest $request, Collection $collection)
    {
        $validated = $request->validated();
        if ($request->file('picture')||$request->validated('removeImage')) {
            if ($collection->picture) {
                // Storage::delete($category->picture);
                // Storage::deleteDirectory('/public/collections/' . $validated['code']);
                Storage::deleteDirectory('/public/collections/' . $collection->id);
                $collection->picture=null;
            }
        }
        if ($request->file('picture')) {
            $file = $request->file('picture');
            // $picture = Storage::putFile('/public/collections/' . $validated['code'], $file);
            $picture = Storage::putFileAs('/public/collections/'. $collection->id, $file, $file->getClientOriginalName());
            $validated['picture'] = $picture;
        }
        $collection->update($validated);
        return redirect(route('dashboard.collection.index'))->with('success', 'Коллекция "' . $collection->name . '" успешно сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    // Удаление коллекции
    public function destroy(Collection $collection)
    {
        // $collection->delete();
        $collection->forceDelete();
        if ($collection->picture) {
            // Storage::delete($category->picture);
            Storage::deleteDirectory('/public/collections/' . $collection->id);
        }
        $files_in_Products_folder = Storage::allFiles('/public/Products/' . $collection->id);
        $directories_in_Products_folder = Storage::allDirectories('/public/Products/' . $collection->id);
        if ((count($files_in_Products_folder) == 0) && (count($files_in_Products_folder) == 0)) {
            Storage::deleteDirectory('/public/Products/' . $collection->id);
        }
        // return back();
        return redirect(route('dashboard.collection.index'))->with('success', 'Коллекция "' . $collection->name . '" удалена');
    }
}
