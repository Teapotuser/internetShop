<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class CollectionController extends Controller
{
    public function show(string $code)
    {
        $categories = Category::all();
        $collections = Collection::all();
        $collection = Collection::where('code', $code)->first();
        // dd($collection);
        // $products = Product::where('collection_id', $collection->id)->paginate(6);
        $products = QueryBuilder::for(Product::class)->where('collection_id', $collection->id)->allowedFilters(
            AllowedFilter::exact('title'),
            AllowedFilter::exact('description'),
            AllowedFilter::exact('article'),
            AllowedFilter::exact('category_id'), //для чекбоксов категорий в фильтре
            AllowedFilter::scope('price_from'),
            AllowedFilter::scope('price_to'),
        )->allowedSorts(['title', 'price'])->paginate(6); 
        // фильтр, чекбоксы категорий
        $categories_all_forFilter = $products->mapToGroups(function ($item) {
            return [$item->category];
        });  
        // dd($$categories_all_forFilter);     
        //для карусели популярных товаров
        $products_bestsellers = Product::where('collection_id', $collection->id)->where('is_best_selling', 1)->get();
        return view('collection', compact('collection', 'categories', 'collections', 'products', 'categories_all_forFilter', 'products_bestsellers'));
    }
}
