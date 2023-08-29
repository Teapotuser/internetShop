@extends('layouts.master')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/password.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/profile-ordershistory.css') }}" type="text/css">
     <!--  <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" type="text/css"> -->
@endsection
@section('content')
<main>
        <div class="wrapper">              
            <div class="shop-wrapper">               
                <!-- левая панель -->
                <aside class="left-side">
                    <div class="profile-left-side">
                        <div class="profile-details-box">
                            <div class="profile-left-side-photo-container">
                                <img src="/images/NICI/eule-profile3-trim.png" alt="Users photo">
                            </div>
                            <h3>Имя Фамилия</h3>
                            <p>email-registration@gmail.com</p>
                        </div>
                        <nav class="profile-left-side-links-box">
                            <ul>
                                <li>
                                    <a href="#" class="profile-left-side-title-box active">
                                        <p>Главная</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>  
                                <li>
                                    <a href="#" class="profile-left-side-title-box">
                                        <p>Личные данные</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>                                
                                <li>
                                    <a href="#" class="profile-left-side-title-box">
                                        <p>История заказов</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>
                                <li>
                                    <a href="#" class="profile-left-side-title-box">
                                        <p>Подписка</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>
                                <li>
                                    <a href="#" class="profile-left-side-title-box">
                                        <p>Сменить пароль</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>
                                <li>
                                    <a href="#" class="profile-left-side-title-box">
                                        <p>Выход</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>
                            </ul>
                        </nav>
                    </div>                       
                </aside>
                <section class="right-side"> <!-- Правая галерея товаров -->
                    <div class="right-side-wrapper">
                        <h1 class="right-side-title">Личный кабинет</h1>

                        <div class="right-side-profile-title">История заказов</div>                         
                         <!--  Форма Личных данных и Адреса -->
                        <form class="form-order">
                            <div class="form-order-wrapper">
                                <div class="decor form-profile-personaldata-panel">                                    
                                    <div class="form-inner">                                        
                                        <h3>Адрес</h3>
                                                                                                     
                                    </div>                                                   
                                </div>
                            </div>        
                        </form>

                        
                        <div class="orderhistory-header-bottom">
                            <div class="orderhistory-horizont-menu-wrap">                                
                                <nav class="orderhistory-main_nav orderhistory-menu__body _active"> 
                                    <ul class="orderhistory-horizont-menu orderhistory-menu__list">
                                        <li>
                                            <div class="orderhistory-menu__wrapper">
                                                <p class="orderhistory-menu__link">Каталог</p>
                                                <span class="orderhistory-menu__arrow"></span>
                                            </div>
                                            <ul class="orderhistory-menu__sublist">
                                                <li>
                                                    <div class="orderhistory-menu__wrapper">
                                                        <!-- <p class="orderhistory-menu__sublink">Категории</p> -->
                                                        <p class="orderhistory-menu__sublink @if(Route::is('category.show')) active @endif">Категории</p>
                                                        <span class="orderhistory-menu__arrow"></span>
                                                    </div>
                                                    <!-- 3 уровень меню -->
                                                    <ul class="orderhistory-menu__sublist">                                                        
                                                        <li>
                                                            <a class="orderhistory-menu__sublink" href="#">Мягкие игрушки </a>
                                                        </li>                                                        
                                                    <!--  <li><a href="#" class="orderhistory-menu__sublink">Мягкие игрушки</a></li>
                                                        <li><a href="#" class="orderhistory-menu__sublink">Брелки</a></li>
                                                        <li><a href="#" class="orderhistory-menu__sublink">Магниты</a></li>
                                                        <li><a href="#" class="orderhistory-menu__sublink">Подушки</a></li> -->
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="orderhistory-menu__wrapper">
                                                        <!-- <p class="orderhistory-menu__sublink">Коллекции</p> -->
                                                        <p class="orderhistory-menu__sublink @if(Route::is('collection.show')) active @endif">Коллекции</p>
                                                        <span class="orderhistory-menu__arrow"></span>
                                                    </div>    
                                                    <!-- 3 уровень меню -->
                                                    <ul class="orderhistory-menu__sublist">
                                                       
                                                        <li>
                                                            <a class="orderhistory-menu__sublink" href="#">Овечки Jolly Mäh</a>
                                                        </li>
                                                        
                                                        <!-- <li><a href="#" class="orderhistory-menu__sublink">Овечки Jolly Mäh</a></li>
                                                        <li><a href="#" class="orderhistory-menu__sublink">Единорог Theodor и его друзья</a></li>
                                                        <li><a href="#" class="orderhistory-menu__sublink">Лесные жители</a></li>
                                                        <li><a href="#" class="orderhistory-menu__sublink">Дикие обитатели</a></li>
                                                        <li><a href="#" class="orderhistory-menu__sublink">Веселая ферма</a></li>       -->                                  
                                                    </ul>
                                                </li>                               
                                            </ul>
                                        </li>
                                        <li><a href="#" class="orderhistory-menu__link">Акции</a></li>
                                        <li><a href="#" class="orderhistory-menu__link">Доставка и оплата</a></li>
                                        <!-- <li><a href="#" class="orderhistory-menu__link">Контакты</a></li> -->
                                        <li>
                                            <div class="orderhistory-menu__wrapper">
                                                <p class="orderhistory-menu__link">Контакты</p>
                                                <span class="orderhistory-menu__arrow"></span>
                                            </div>
                                            <ul class="orderhistory-menu__sublist">
                                                <li>
                                                    <a class="orderhistory-menu__sublink" href="#">Обратная связь</a>
                                                </li>
                                                <!-- <li><a href="#" class="orderhistory-menu__sublink">Овечки Jolly Mäh</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Единорог Theodor и его друзья</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Лесные жители</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Дикие обитатели</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Веселая ферма</a></li>       -->                                  
                                            </ul>
                                        </li>    

                                        <li class="orderhistory-profile-hidden">
                                            <div class="orderhistory-menu__wrapper">
                                                <a href="#" class="orderhistory-menu__link">Мой профиль</a>
                                                <span class="orderhistory-menu__arrow"></span>
                                            </div>    
                                            <ul class="orderhistory-menu__sublist">                                                                               
                                                    <li><a href="#" class="orderhistory-menu__sublink">Личные данные</a></li>
                                                    <li><a href="#" class="orderhistory-menu__sublink">История заказов</a></li>
                                                    <!-- <li><a href="#" class="orderhistory-menu__sublink">Выход</a></li> -->                                                
                                                    <li><a href="#" class="orderhistory-menu__sublink">Логин</a></li>
                                                    <li><a href="#" class="orderhistory-menu__sublink">Регистрация</a></li>                                                                           
                                            </ul>
                                        </li>
                                    </ul>
                                </nav> 
                            </div>    
                        </div>
                       

                    <!--Здесь была Сортировка галереи товаров-->   
                   <!--  <ul class="shop_gallery"> здесь была Галерея товаров-->
                   
                    </div> 
                </section> 
            </div> 
        </div>
    </main>
@endsection     
@section('custom_js')
<script src="{{ asset('js/file-upload-pairs.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/view-hide-password.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/profile-ordershistory.js') }}" type="text/javascript"></script>
@endsection    