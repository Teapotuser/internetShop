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

            $categories_all_forFilter = Category::all();
            //Фильтры ($filtrs) по умолчанию надо задать и в "CollectionController" и в "CategoryController" или будет ошибка
		    $filters = [ 'minPrice' => 0, 'maxPrice' => 250, 'discount' => '', 'new' => ''/* , 'sort' => 'name' */ ];//задаём по умолчанию фильтр цен          
            return view('index', compact('categories', 'collections', 'products', 'categories_all_forFilter','filters') ); 
            }

        public function indexFilter(Request $request) {
            $categories = Category::all();
            $collections = Collection::all();
            // $products = Product::paginate(6);
            // $productsQuery = Product::query();
            $products_query = Product::query()->with(['collection','category'])->IsActive(); //Даниил добавил with
            
            $categories_all_forFilter = Category::all();

             //если есть категории в фильтре делаем фильтрацию
            if ($request->get('category')) {
                $products_query->whereHas('category', function (Builder $query) use ($request) {
                    return $query->whereIn('code', $request->get('category'));
                });
            }

            $minPrice = $request->minPrice;
            $maxPrice = $request->maxPrice;
            // $sorto = $request->sort; $ascDesc = 'asc';
            
            /* if ($request->filled('discount')) {
                $productsQuery->where('discount', $request->discount);
            } */

            if ($minPrice) {
                $products_query->minPrice($minPrice);
            }
            if ($maxPrice) {
                $products_query->maxPrice($maxPrice);
            }

            if ($request->has('discount')) {
                $products_query->where('discount', '>', 0);
            }

            if ($request->has('new')) {
                $products_query->where('is_new', 1);
            }

            $filters = [ 'minPrice' => $minPrice, 'maxPrice' => $maxPrice, 'discount' => $request->discount, 'new' => $request->new /*,  'sort' => $sorto */ ];
            // dd($filters);
            $products_query->customSort($request->get('sort'));
            $products = $products_query->paginate(6)/* ->withPath("?" . $request->getQueryString()) */;
            return view('index', compact('categories', 'collections', 'products', 'categories_all_forFilter') ); 
        }

        /* public function indexSearch(Request $request) {
            return view('search', compact('categories', 'collections', 'products', 'filters') );
        } */

        

}
