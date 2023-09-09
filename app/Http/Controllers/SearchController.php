<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
   //Функция при нажатии на кнопку Search
    public function find(Request $request) {
        $search = $request->input('sSearch');
        // $productsQuery = Product::query();
        /* $products =  Product::where('title', 'LIKE', '%' . $search . '%')
        ->orWhere('description', 'LIKE', '%' . $search . '%')
        ->orWhere('article', 'LIKE', '%' . $search . '%')
        ->paginate(6); */

        /* $products_found_count = Product::where('title', 'LIKE', '%' . $search . '%')
        ->orWhere('description', 'LIKE', '%' . $search . '%')
        ->orWhere('article', 'LIKE', '%' . $search . '%')
        ->count(); */
        
        $products_query = Product::query()->IsActive()->where('title', 'LIKE', '%' . $search . '%')
        ->orWhere('description', 'LIKE', '%' . $search . '%')
        ->orWhere('article', 'LIKE', '%' . $search . '%');

        //получаем только те категории что есть по фильтру
        $query_for_category_filter = clone $products_query;
        $query_for_category_filter->distinct()->select('category_id')->get();
        $categories_all_forFilter = Category::query()->whereIn('id', $query_for_category_filter)->get();

        //получаем только те коллекции что есть по фильтру
        $query_for_collection_filter = clone $products_query;
        $query_for_collection_filter->distinct()->select('collection_id')->get();
        $collections_all_forFilter = Collection::query()->whereIn('id', $query_for_collection_filter)->get();

        //если есть категории в фильтре делаем фильтрацию
        if ($request->get('category')) {
            $products_query->whereHas('category', function (Builder $query) use ($request) {
                return $query->whereIn('code', $request->get('category'));
            });
        }
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

        if ($request->has('new')) {
            $products_query->where('is_new', 1);
        }

        if ($request->has('discount')) {
            $products_query->where('discount', '>', 0);
        }

        //получаем сами товары отсортированные
        $products_query->customSort($request->get('sort'));
        // $products = $products_query->with('collection')->paginate(6);
        $products = $products_query->paginate(6);
        
        // $products = Product::where('category_id', $category->id)->paginate(6);
        /* $categories = Category::all();
        $collections = Collection::all(); */
            
        // return view('search', compact('categories', 'collections', 'products') );
        return view('search', compact('products', 'categories_all_forFilter', 'collections_all_forFilter') );
    }

    //Функция ajax при печатании в текстовом поле поиска
    public function search(Request $request) {
        $search = $request->input('sSearch');
       
        // $productsQuery = Product::query();
        $products_found =  Product::where('title', 'LIKE', '%' . $search . '%')
        ->orWhere('description', 'LIKE', '%' . $search . '%')
        ->orWhere('article', 'LIKE', '%' . $search . '%')
        ->get();
        /* $products_found_count = Product::where('title', 'LIKE', '%' . $search . '%')
        ->orWhere('description', 'LIKE', '%' . $search . '%')
        ->orWhere('article', 'LIKE', '%' . $search . '%')
        ->count();  */       
        $total_products_found_count = $products_found->count();
        $products_found = $products_found->take(3);// тут вставить то число сколько хотите чтобы отображалось результатов в выпадашке
            
        // return view('search_list', compact('products_found', 'products_found_count') );
        return view('search-results-mini', compact('products_found', 'total_products_found_count'));
    }
}
