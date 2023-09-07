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
                    <div class="category">
                        <div class="list-box">
                            <div class="title-box open">
                                <p>Категории</p>
                                <div class="button-plus-minus">                                    
                                </div>                               
                            </div>
                            <div class="list-link open">
                                <nav>
                                    @foreach ($categories as $category_leftbar)
                                        <li>
                                            <a @if(url()->current() == route('category.show', $category_leftbar->code) )
                                                class="active"
                                            @endif
                                            href="{{ route('category.show', $category_leftbar->code) }}">{{ $category_leftbar->name }} </a>
                                        </li>
                                    @endforeach

                                   <!--  <li><a href="#">Мягкие игрушки</a></li>
                                    <li><a href="#">Брелки</a></li>
                                    <li><a href="#">Магниты</a></li>
                                    <li><a href="#">Подушки</a></li> -->
                                </nav>
                            </div>
                        </div>
                        <!-- левая панель: Коллекции -->
                        <div class="list-box">
                            <div class="title-box open">
                                <p>Коллекции</p>
                                <div class="button-plus-minus">                                    
                                </div>                               
                            </div>
                            <div class="list-link open">
                                <nav>
                                    @foreach ($collections as $collection_leftbar)
                                        <li><a href="{{ route('collection.show', $collection_leftbar->code) }}">{{ $collection_leftbar->name }}</a></li> 
                                    @endforeach                                   

                                   <!--  <li><a href="#">Овечки Jolly Mäh</a></li>
                                    <li><a href="#">Единорог Theodor и его друзья</a></li>
                                    <li><a href="#">Лесные жители</a></li>
                                    <li><a href="#">Дикие обитатели</a></li>
                                    <li><a href="#">Веселая ферма</a></li> -->
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="filters">
                        <!-- левая панель: Фильтр -->
                        <div class="list-box">
                            <div class="title-box open">
                                <p>Фильтр</p>
                                <div class="button-plus-minus">                                    
                                </div>                               
                            </div>
                            <div class="list-link open">
                                <!-- <div class="left-filter-title">
                                    <p>Категория или коллекция</p>                                                                   
                                </div> -->
                                <form id="left-form-filter" class="left-form-filter" method="get"  action="{{ route('new.arrival') }}">
                                    {{csrf_field()}}
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
                                        <p>Акция</p>                                                                   
                                    </div>
                                    <li>
                                        <input class="" type="checkbox" id="discount" name="discount" @if (request()->has('discount')) checked @endif >  
                                        <label class="" for="discount">Акция</label>
                                    </li>
                                    <!-- <li>
                                        <input class="" type="checkbox" id="new" name="new" @if (request()->has('new')) checked @endif >
                                        <label class="" for="new">Новинка</label>
                                    </li> -->

                                    
                                                             
                                <!-- </form> -->
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
                                            <input type="range" class="range-max" name="maxPrice"min="0" max="250" value="{{Request::get('maxPrice')?? 200}}" step="10">
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
                </aside>
                <section class="right-side"> <!-- Правая галерея товаров -->
                    <div class="right-side-wrapper">
                        <h1 class="right-side-title">Новинки</h1>
                        <div class="right-side-description">
                            <p><strong>Встречайте нового персонажа NICI в коллекции Овечки Jolly Mäh: Волк Ulvy в овечьей шубке</strong></p>  
                            <p>Благодаря детальному дизайну со съемным капюшоном с овечьими ушками крутой волк притягивает взгляды. Одетый в шубку с капюшоном из пушистого плюша, имитирующую овчину, волк Ulvy пользуется большой популярностью среди молодых и взрослых!</p>
                            <!-- <div class="right-side-description-img-wrapper">
                                <div class="iframe-container">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/uhNwp3wXjvY?si=aSq0Qnbzt0BClSll" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                       
                                </div>
                            </div> -->
                        </div>                        

                        <div class="iframe-container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/uhNwp3wXjvY?si=aSq0Qnbzt0BClSll" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                       
                        </div>

                    <!--Здесь была Сортировка галереи товаров-->             

                   <!--  <ul class="shop_gallery"> здесь была Галерея товаров-->
                        @include('includes.product_gallery')
                    </div> 
                </section> 
            </div> 
        </div>
    </main>
@endsection 
@section('custom_js')
<script src="{{ asset('js/price-control.js') }}" type="text/javascript"></script>
@endsection        