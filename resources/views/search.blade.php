@extends('layouts.master')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('css/collection.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" type="text/css">
@endsection
@section('content')
<main>
        <div class="wrapper">   
           
            <div class="shop-wrapper">               
                <!-- левая панель -->
                <aside class="left-side"> 
                    @if ($products->total() > 0)                 
                    <div class="filters">
                        <!-- левая панель: Фильтр -->
                        <div class="list-box">
                            <div class="title-box open">
                                <p>Фильтр</p>
                                <div class="button-plus-minus">                                    
                                </div>                               
                            </div>
                            <div class="list-link open">
                               <!--  <div class="left-filter-title">
                                    <p>Коллекция</p>                                                                   
                                </div> -->
                                <form class="left-form-filter" method="get"  action="">
                                    <!-- <li>
                                        <input class="" type="checkbox" id="id_sheep" name="sheep">
                                        <label class="" for="id_sheep">Овечки Jolly Mäh</label>
                                    </li>  
                                    <li>
                                        <input class="" type="checkbox" id="id_unicorn" name="unicorn">
                                        <label class="" for="id_unicorn">Единорог Theodor и его друзья</label>
                                    </li> 
                                    <li>
                                        <input class="" type="checkbox" id="id_forest" name="forest">
                                        <label class="" for="id_forest">Лесные жители</label>
                                    </li> 
                                    <li>
                                        <input class="" type="checkbox" id="id_wild" name="wild">
                                        <label class="" for="id_wild">Дикие обитатели</label>
                                    </li> 
                                    <li>
                                        <input class="" type="checkbox" id="id_farm" name="farm">
                                        <label class="" for="id_farm">Веселая ферма</label>
                                    </li>       -->                                
                                <!-- </form> -->
                                @isset($categories_all_forFilter)
                                    <div class="left-filter-title">
                                        <p>Категория</p>                                                                   
                                    </div>
                                    @foreach ($categories_all_forFilter as $category_Filter)
                                        <li>
                                            <input type="checkbox" id="{{ $category_Filter->id }}"
                                                    value="{{$category_Filter->code}}"
                                                    @checked(in_array($category_Filter->code,Request::get('category')??[]))
                                                    name="category[]">
                                            <label
                                                for="{{ $category_Filter->id }}">{{ $category_Filter->name }}</label>
                                        </li>
                                    @endforeach
                                @endisset    
                                @isset($collections_all_forFilter)
                                    <div class="left-filter-title">
                                        <p>Коллекция</p>                                                                   
                                    </div>
                                    @foreach ($collections_all_forFilter as $collection_Filter)
                                        <li>
                                            <input type="checkbox" id="{{ $collection_Filter->id }}"
                                                    value="{{$collection_Filter->code}}"
                                                    @checked(in_array($collection_Filter->code,Request::get('collection')??[]))
                                                    name="collection[]">
                                            <label
                                                for="{{ $collection_Filter->id }}">{{ $collection_Filter->name }}</label>
                                        </li>
                                    @endforeach
                                @endisset                                     

                                <div class="left-filter-title">
                                        <p>Новинки и акции</p>                                                                   
                                    </div>
                                    <li>
                                        <input class="" type="checkbox" id="discount" name="discount" @if (request()->has('discount')) checked @endif >  
                                        <label class="" for="discount">Акция</label>
                                    </li>
                                    <li>
                                        <input class="" type="checkbox" id="new" name="new" @if (request()->has('new')) checked @endif >
                                        <label class="" for="new">Новинка</label>
                                    </li>
                                <!-- левая панель: Фильтр по цене -->
                                    <div class="filter-price">
                                        <div class="left-filter-title">
                                            <p>Цена</p>                                                                   
                                        </div>
                                        <div class="price-input">
                                            <div class="field">
                                                <span>Мин.</span>
                                                <!-- <input type="number" class="input-min" value="2500"> -->
                                                <input type="number" class="input-min" value="{{Request::get('minPrice') ?? 0}}">
                                            </div>
                                            <div class="separator">-</div>
                                            <div class="field">
                                                <span>Макс.</span>
                                                <!-- <input type="number" class="input-max" value="7500"> -->
                                                <input type="number" class="input-max" value="{{Request::get('maxPrice') ?? 200}}">
                                            </div>
                                        </div>
                                        <div class="slider">
                                            <div class="progress"></div>
                                        </div>
                                        <div class="range-input">
                                            <!-- <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                                            <input type="range" class="range-max" min="0" max="10000" value="7500" step="100"> -->
                                            <input type="range" class="range-min" name="minPrice" min="0" max="250" value="{{Request::get('minPrice')?? 0}}" step="10">
                                            <input type="range" class="range-max" name="maxPrice" min="0" max="250" value="{{Request::get('maxPrice')?? 200}}" step="10">
                                        </div>
                                    </div>
                                    <div  class="filter-buttons-container">
                                        <button type="submit" class="apply-filter">Применить</button>
                                        <button type="button" class="reset-filter">Сбросить</button>
                                    </div>
                                </form>
                            </div>                            
                        </div>                        
                    </div>
                    @endif
                </aside>
                <section class="right-side"> <!-- Правая галерея товаров -->
                    <div class="right-side-wrapper">
                        @if ($products->total() > 0)
                            <h1 class="right-side-title"><span>{{ $products->total() }}</span> товаров найдены для <span>"{{ request()->query('sSearch') }}"</span></h1>
                        
                            <!--Здесь была Сортировка галереи товаров-->             

                            <!--  <ul class="shop_gallery"> здесь была Галерея товаров-->
                            @include('includes.product_gallery')
                        @else
                            <h1 class="right-side-title">Товары для <span>"{{ request()->query('sSearch') }}"</span> не найдены </h1>
                            </br>
                            </br>
                            </br>
                        @endif
                    </div> 
                </section> 
            </div> 
        </div>
    </main>
@endsection        
@section('custom_js')
<script src="{{ asset('js/price-control.js') }}" type="text/javascript"></script>
@endsection 