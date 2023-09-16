<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;

/* use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter; */

class CollectionController extends Controller
{
    /* public function show(string $code)
    {
        $categories = Category::all();
        $collections = Collection::all();
        $collection = Collection::where('code', $code)->first(); */
        // dd($collection);
        // $products = Product::where('collection_id', $collection->id)->paginate(6);
        /* $products = QueryBuilder::for(Product::class)->where('collection_id', $collection->id)->allowedFilters(
            AllowedFilter::exact('title'),
            AllowedFilter::exact('description'),
            AllowedFilter::exact('article'),
            AllowedFilter::exact('category_id'), //для чекбоксов категорий в фильтре
            AllowedFilter::scope('price_from'),
            AllowedFilter::scope('price_to'),
        )->allowedSorts(['title', 'price'])->paginate(6);  */
        // фильтр, чекбоксы категорий
        /* $categories_all_forFilter = $products->mapToGroups(function ($item) {
            return [$item->category]; */
       /*  });   */
        // dd($$categories_all_forFilter);     
        //для карусели популярных товаров
        /* $products_bestsellers = Product::where('collection_id', $collection->id)->where('is_best_selling', 1)->get();
        return view('collection', compact('collection', 'categories', 'collections', 'products', 'categories_all_forFilter', 'products_bestsellers'));
    } */

    public function show(Collection $collection,Request $request)
    {
        $categories = Category::all();
        $collections = Collection::all();
        $products_query = Product::query()->where('collection_id', $collection->id)->IsActive();

        $query_for_filter = clone $products_query;
        $categories_all_forFilter = Category::query()->whereIn('id', $query_for_filter->distinct()->get('category_id'))->get();

        //получаем только те коллекции что есть по фильтру
        /* $query_for_filter = clone $products_query;
        $query_for_filter->distinct()->select('collection_id')->get();
        $collections_all_forFilter = Collection::query()->whereIn('id', $query_for_filter)->get(); */

        //получаем мин макс цену что есть по фильтру
        /* $prices = clone $products_query;
        $prices = $prices->selectRaw('round(min(`products`.`price`)/100,2) as min,round(max(`products`.`price`)/100,2) as max')->first(); */

        // фильтруем по категории если есть запрос на фильтрацию
        if ($request->get('category')) {
            $products_query->whereHas('category', function (Builder $query) use ($request) {
                return $query->whereIn('code', $request->get('category'));
            });
        }

         //делаем фильтрацию по ценам
         if ($request->get('minPrice')) {
            $products_query->minPrice($request->get('minPrice'));
        }
        if ($request->get('maxPrice')) {
            $products_query->maxPrice($request->get('maxPrice'));
        }

        if ($request->has('new')) {
            $products_query->where('is_new', 1);
        }

        if ($request->has('discount')) {
            $products_query->where('discount', '>', 0);
        }
        
        //получаем товары
        $products_query->with('collection');
        $products_query->customSort($request->get('sort'));
        $products = $products_query->paginate(6);

        //для карусели популярных товаров
        // $products_bestsellers = Product::where('collection_id', $collection->id)->where('is_best_selling', 1)->get();
        $products_bestsellers = $collection->getBestSellers();

        return view('collection', compact('collection', 'categories', 'collections', 'products', 'categories_all_forFilter', 'products_bestsellers'));
    }
}
