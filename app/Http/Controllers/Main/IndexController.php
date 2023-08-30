<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

/* use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter; */

class IndexController extends Controller
{
   
    /* public function index() {
        $categories = Category::all();
        $collections = Collection::all(); */
        // $products = Product::paginate(6);
        /* $products = QueryBuilder::for(Product::class)->allowedFilters( */
            /* AllowedFilter::exact('title'),  *///берется из DB
            /* AllowedFilter::exact('description'), */ //берется из DB
           /*  AllowedFIlter::exact('article'),  *///берется из DB
            /* AllowedFilter::scope('price_from'), */ //берется из методов в модели, не из DB
            /* AllowedFilter::scope('price_to'), */ //берется из методов в модели, не из DB
       /*  )->allowedSorts(['title', 'price'])->paginate(6);
        return view('index', compact('categories', 'collections', 'products') ); 
        } */

        public function index(Request $request) {
            $categories = Category::all();
            $collections = Collection::all();
            // $products = Product::paginate(6); 
            $products = Product::customSort($request->get('sort'))->IsActive()->paginate(6);
            //Фильтры ($filtrs) по умолчанию надо задать и в "CollectionController" и в "CategoryController" или будет ошибка
		    $filters = [ 'minPrice' => 0, 'maxPrice' => 250, 'discount' => '', 'new' => ''/* , 'sort' => 'name' */ ];//задаём по умолчанию фильтр цен          
            return view('index', compact('categories', 'collections', 'products', 'filters') ); 
            }

        public function indexFilter(Request $request) {
            $categories = Category::all();
            $collections = Collection::all();
            // $products = Product::paginate(6);
            // $productsQuery = Product::query();
            $productsQuery = Product::query()->with(['collection','category']); //Даниил добавил with
            

            $minPrice = $request->minPrice;
            $maxPrice = $request->maxPrice;
            // $sorto = $request->sort; $ascDesc = 'asc';
            
            /* if ($request->filled('discount')) {
                $productsQuery->where('discount', $request->discount);
            } */

            if ($minPrice) {
                $productsQuery->minPrice($minPrice);
            }
            if ($maxPrice) {
                $productsQuery->maxPrice($maxPrice);
            }

            if ($request->has('discount')) {
                $productsQuery->where('discount', '>', 0);
            }

            if ($request->has('new')) {
                $productsQuery->where('is_new', 1);
            }

            $filters = [ 'minPrice' => $minPrice, 'maxPrice' => $maxPrice, 'discount' => $request->discount, 'new' => $request->new /*,  'sort' => $sorto */ ];
            // dd($filters);
            $productsQuery->customSort($request->get('sort'));
            $products = $productsQuery->paginate(6)/* ->withPath("?" . $request->getQueryString()) */;
            return view('index', compact('categories', 'collections', 'products', 'filters') ); 
        }

        /* public function indexSearch(Request $request) {
            return view('search', compact('categories', 'collections', 'products', 'filters') );
        } */

        

}
