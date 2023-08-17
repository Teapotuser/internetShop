<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImages;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request)
    {
        $categories = Category::all();
        $collections = Collection::all();
        // $category = Category::where('code', $code)->first();
        // $products = Product::where('category_id', $category->id)->paginate(6);
        //для карусели популярных товаров
        $products_bestsellers = Product::where('category_id', $category->id)->where('is_best_selling', 1)->get();
        // return view('category', compact('category', 'categories', 'collections', 'products', 'products_bestsellers'));
    
    
        $products_query = Product::query()->where('category_id', $category->id);

        //получаем только те коллекции что есть по фильтру
        $query_for_filter = clone $products_query;
        $query_for_filter->distinct()->select('collection_id')->get();
        $collections_all_forFilter = Collection::query()->whereIn('id', $query_for_filter)->get();

        //если есть коллекции в фильтре делаем фильтрацию
        if ($request->get('collection')) {
            $products_query->whereHas('collection', function (Builder $query) use ($request) {
                return $query->whereIn('code', $request->get('collection'));
            });
        }

        //делаем фильтрацию по ценам
        if ($request->get('minPrice')) {
            $products_query->minPrice($request->get('minPrice'));
        }
        if ($request->get('maxPrice')) {
            $products_query->maxPrice($request->get('maxPrice'));
        }

        //получаем только те коллекции что есть по фильтру
        /* $query_for_filter = clone $products_query;
        $query_for_filter->distinct()->select('collection_id')->get();
        $collections_all_forFilter = Collection::query()->whereIn('id', $query_for_filter)->get(); */

        //получаем мин макс цену что есть по фильтру
        $prices = clone $products_query;
        $prices = $prices->selectRaw('round(min(`products`.`price`)/100,2) as min,round(max(`products`.`price`)/100,2) as max')->first();

        //получаем сами товары отсортированные
        $products_query->customSort($request->get('sort'));
        $products = $products_query->with('collection')->paginate(6);

        //для карусели популярных товаров
        // $products_bestsellers = Product::where('category_id', $category->id)->where('is_best_selling', 1)->get();

        return view('category', compact('category', 'categories', 'collections', 'products', 'products_bestsellers', 'collections_all_forFilter', 'prices'));
    }
}
