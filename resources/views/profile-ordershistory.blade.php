@extends('layouts.master')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/password.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/profile-ordershistory.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/profile-cart.css') }}" type="text/css">
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
                                                
                        <div class="orderhistory-header-bottom">
                            <div class="orderhistory-horizont-menu-wrap">                                
                                <nav class="orderhistory-main_nav orderhistory-menu__body _active"> 
                                    <ul class="orderhistory-horizont-menu orderhistory-menu__list">                                      
                                        <li>
                                            <div class="orderhistory-menu__wrapper">
                                                <!-- <p class="orderhistory-menu__link">Заказ #12</p> -->
                                                <div class="orderhistory-menu__link order-prev">
                                                    <div class="order-prev__header">
                                                        <span class="order-prev__number">Заказ № 12</span>
                                                        <span class="order-prev__date">от 4 сентября 2023 г.</span>
                                                        <div class="order-status order-status--waiting order-prev__status">Ожидает подтверждения</div>
                                                        <span class="link-green link-underline order-prev__link">
                                                            <span>Детали заказа</span>
                                                            <span class="orderhistory-menu__arrow link-green"></span>
                                                        </span>    
                                                    </div>
                                                    <div class="order-prev__body">
                                                        <div class="order-prev__block">
                                                            <div class="order-prev__item">
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Контактное лицо
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">Вениамин Константинопольский</span>
                                                                        <span class="order-prev-line__value">+375293710984</span>
                                                                        <span class="order-prev-line__value">email-in-order@gmail.com</span>
                                                                        <!-- <span class="order-prev-line__descr"></span> -->
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Способ доставки
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">Адресная доставка</span>                                                                        
                                                                        <!-- <span class="order-prev-line__descr"></span> -->
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Адрес доставки
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">220015 РБ г. Минск, ул. Берестянская, д. 17, кв. 25</span>
                                                                        <span class="order-prev-line__value">Трек номер: RZ548758674857RB</span>
                                                                        <span class="order-prev-line__descr">Доставка по Беларуси 3-7 дней</span>
                                                                    </div>                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="order-prev__block">
                                                            <div class="order-prev__item">
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Количество товаров
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">24 шт.</span> -->
                                                                        <!-- <span class="order-prev-line__descr"></span> -->
                                                                   <!--  </div>                                                                    
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="order-prev__block">
                                                            <div class="order-prev__item">
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Способ оплаты
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">Кредитной картой</span>
                                                                        <!-- <span class="order-prev-line__descr"></span> -->
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Заказ оплачен
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">Нет / 23.09.2023</span>
                                                                        <!-- <span class="order-prev-line__descr">Доставка по Беларуси 3-7 дней</span> -->
                                                                    </div>                                                                    
                                                                </div>
                                                            </div>

                                                            <div class="order-prev__total">
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label label-pink">
                                                                        Количество товаров
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">24 шт.</span>
                                                                        <!-- <span class="order-prev-line__descr">Доставка по Беларуси 3-7 дней</span> -->
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label label-pink">
                                                                        Стоимость товаров
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">123.45 р.</span>
                                                                        <!-- <span class="order-prev-line__descr"></span> -->
                                                                    </div>                                                                    
                                                                </div>                                                                

                                                                <div class="order-prev-total-price">
                                                                    <span class="label-pink">
                                                                       Итого
                                                                    </span>
                                                                    <span class="order-prev-total-price__number label-pink">
                                                                       129.24 р.
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <span class="orderhistory-menu__arrow"></span> -->
                                            </div>
                                            <ul class="orderhistory-menu__sublist">
                                                <li>
                                                    <div class="orderhistory-menu__sublink">
                                                        <div>
                                                        </div>

                                                        <!--  Таблица товаров в корзине -->
                                                        <div class="orderitem-table-container">
                                                            <!-- Заголовок таблицы -->
                                                            <div class="orderitem-row" data-set="relative">
                                                                <div class="orderitem-itemimage-container orderitem-not-column" data-set="50%">
                                                                    <span class="orderitem-image orderitem-header orderitem-column"></span>
                                                                    <span class="orderitem-item orderitem-header orderitem-column">Название товара</span>
                                                                </div>
                                                                <div class="orderitem-priceqtysum-container orderitem-not-column" data-set="50%">                                    
                                                                    <span class="orderitem-hide orderitem-header orderitem-column"></span>
                                                                    <span class="orderitem-quantity orderitem-header orderitem-column">Количество</span>
                                                                    <span class="orderitem-price orderitem-header orderitem-column">Цена</span>                                    
                                                                    <span class="orderitem-sum orderitem-header orderitem-column">Сумма</span>
                                                                    <!-- <span class="main-cart-delete orderitem-header orderitem-column"></span> -->
                                                                </div>
                                                                <!-- <div data-set="40%">
                                                                </div> -->
                                                                <!-- <span class="main-cart-remove main-cart-header main-cart-column" data-set="absolute"></span> -->
                                                            </div>
                                                            <!-- Строка таблицы -->
                                                            <div class="orderitem-row">
                                                                <div class="orderitem-itemimage-container orderitem-not-column" data-set="50%">
                                                                    <div class="orderitem-image orderitem-column">
                                                                        <a href="#"><img src="images/goods/48531_01_HA_Frei.jpg" alt="" class="orderitem-img"></a>
                                                                    </div>
                                                                    <div class="orderitem-item orderitem-column">
                                                                        <a href="#" class="orderitem-title">Мягкая игрушка Овечка Jolly Frances</a>
                                                                        <div>Артикул: NICI1111</div>
                                                                        <div>Размер: 25 см</div>
                                                                    </div>
                                                                </div>
                                                                <div class="orderitem-priceqtysum-container orderitem-not-column" data-set="50%">
                                                                    <div class="orderitem-hide orderitem-column"></div>
                                                                    <div class="orderitem-quantity orderitem-column">
                                                                        <p class="orderitem-header-hide">Кол-во</p>                                                                            
                                                                        <!-- <div class="main-cart-quantity-controls"> -->
                                                                        <p><span>2</span><span>  шт.</span></p>
                                                                            <!--  <button class="cart-minus-quantity" data-id="${id}">-</button>
                                                                            <input type="number" value="1" class="cart-quantity" data-id="${id}">
                                                                            <button class="cart-plus-quantity" data-id="${id}">+</button>   -->                              
                                                                        <!-- </div>  -->
                                                                    </div>
                                                                    <div class="orderitem-price orderitem-column">
                                                                        <div class="orderitem-price-amount"><!-- <p hide gap>header price</p> -->
                                                                            <p class="orderitem-header-hide">Цена</p>
                                                                            <p>53.12 р.</p>
                                                                        </div>
                                                                    </div>                                    
                                                                    <div class="orderitem-sum orderitem-column">
                                                                        <p class="orderitem-header-hide">Сумма</p>
                                                                        <span>53.12</span><span> р.</span>
                                                                    </div> 
                                                                    <!-- <div class="main-cart-delete orderitem-column"></div>                                     -->
                                                                </div>                                  
                                                                <!-- <div class="main-cart-remove"> -->
                                                                    <!--Remove cart-->
                                                                    <!-- <form action="" method="post" class="">
                                                                        <button class="cart-remove" data-id="${id}"></button>
                                                                    </form>                                   
                                                                </div>                             -->
                                                            </div>  
                                                            <!-- Строка таблицы -->                                                                                       
                                                        </div>                               
                                

                                                    </div>
                                                </li>
                                                <!-- <li><a href="#" class="orderhistory-menu__sublink">Овечки Jolly Mäh</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Единорог Theodor и его друзья</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Лесные жители</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Дикие обитатели</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Веселая ферма</a></li>       -->                                  
                                            </ul>
                                        </li>    

                                        <li>
                                            <div class="orderhistory-menu__wrapper">
                                                <!-- <p class="orderhistory-menu__link">Заказ #12</p> -->
                                                <div class="orderhistory-menu__link order-prev">
                                                    <div class="order-prev__header">
                                                        <span class="order-prev__number">Заказ № 13</span>
                                                        <span class="order-prev__date">от 15 сентября 2023 г.</span>
                                                        <div class="order-status order-status--waiting order-prev__status">Ожидает подтверждения</div>
                                                        <span class="link-green link-underline order-prev__link">
                                                            <span>Детали заказа</span>
                                                            <span class="orderhistory-menu__arrow link-green"></span>
                                                        </span>    
                                                    </div>
                                                    <div class="order-prev__body">
                                                        <div class="order-prev__block">
                                                            <div class="order-prev__item">
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Контактное лицо
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">Вениамин Константинопольский</span>
                                                                        <span class="order-prev-line__value">+375293710984</span>
                                                                        <span class="order-prev-line__value">email-in-order@gmail.com</span>
                                                                        <!-- <span class="order-prev-line__descr"></span> -->
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Способ доставки
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">Адресная доставка</span>                                                                        
                                                                        <!-- <span class="order-prev-line__descr"></span> -->
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Адрес доставки
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">220015 РБ г. Минск, ул. Берестянская, д. 17, кв. 25</span>
                                                                        <span class="order-prev-line__value">Трек номер: RZ548758674857RB</span>
                                                                        <span class="order-prev-line__descr">Доставка по Беларуси 3-7 дней</span>
                                                                    </div>                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="order-prev__block">
                                                            <div class="order-prev__item">
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Количество товаров
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">24 шт.</span> -->
                                                                        <!-- <span class="order-prev-line__descr"></span> -->
                                                                   <!--  </div>                                                                    
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="order-prev__block">
                                                            <div class="order-prev__item">
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Способ оплаты
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">Кредитной картой</span>
                                                                        <!-- <span class="order-prev-line__descr"></span> -->
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label">
                                                                        Заказ оплачен
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">Нет / 23.09.2023</span>
                                                                        <!-- <span class="order-prev-line__descr">Доставка по Беларуси 3-7 дней</span> -->
                                                                    </div>                                                                    
                                                                </div>
                                                            </div>

                                                            <div class="order-prev__total">
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label label-pink">
                                                                        Количество товаров
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">24 шт.</span>
                                                                        <!-- <span class="order-prev-line__descr">Доставка по Беларуси 3-7 дней</span> -->
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="order-prev-line">
                                                                    <span class="order-prev-line__label label-pink">
                                                                        Стоимость товаров
                                                                    </span>
                                                                    <div class="order-prev-line__body">
                                                                        <span class="order-prev-line__value">123.45 р.</span>
                                                                        <!-- <span class="order-prev-line__descr"></span> -->
                                                                    </div>                                                                    
                                                                </div>                                                                

                                                                <div class="order-prev-total-price">
                                                                    <span class="label-pink">
                                                                       Итого
                                                                    </span>
                                                                    <span class="order-prev-total-price__number label-pink">
                                                                       129.24 р.
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <span class="orderhistory-menu__arrow"></span> -->
                                            </div>
                                            <ul class="orderhistory-menu__sublist">
                                                <li>
                                                    <div class="orderhistory-menu__sublink">
                                                        <div>
                                                        </div>

                                                        <!--  Таблица товаров в корзине -->
                                                        <div class="orderitem-table-container">
                                                            <!-- Заголовок таблицы -->
                                                            <div class="orderitem-row" data-set="relative">
                                                                <div class="orderitem-itemimage-container orderitem-not-column" data-set="50%">
                                                                    <span class="orderitem-image orderitem-header orderitem-column"></span>
                                                                    <span class="orderitem-item orderitem-header orderitem-column">Название товара</span>
                                                                </div>
                                                                <div class="orderitem-priceqtysum-container orderitem-not-column" data-set="50%">                                    
                                                                    <span class="orderitem-hide orderitem-header orderitem-column"></span>
                                                                    <span class="orderitem-quantity orderitem-header orderitem-column">Количество</span>
                                                                    <span class="orderitem-price orderitem-header orderitem-column">Цена</span>                                    
                                                                    <span class="orderitem-sum orderitem-header orderitem-column">Сумма</span>
                                                                    <!-- <span class="main-cart-delete orderitem-header orderitem-column"></span> -->
                                                                </div>
                                                                <!-- <div data-set="40%">
                                                                </div> -->
                                                                <!-- <span class="main-cart-remove main-cart-header main-cart-column" data-set="absolute"></span> -->
                                                            </div>
                                                            <!-- Строка таблицы -->
                                                            <div class="orderitem-row">
                                                                <div class="orderitem-itemimage-container orderitem-not-column" data-set="50%">
                                                                    <div class="orderitem-image orderitem-column">
                                                                        <a href="#"><img src="images/goods/48531_01_HA_Frei.jpg" alt="" class="orderitem-img"></a>
                                                                    </div>
                                                                    <div class="orderitem-item orderitem-column">
                                                                        <a href="#" class="orderitem-title">Мягкая игрушка Овечка Jolly Frances</a>
                                                                        <div>Артикул: NICI1111</div>
                                                                        <div>Размер: 25 см</div>
                                                                    </div>
                                                                </div>
                                                                <div class="orderitem-priceqtysum-container orderitem-not-column" data-set="50%">
                                                                    <div class="orderitem-hide orderitem-column"></div>
                                                                    <div class="orderitem-quantity orderitem-column">
                                                                        <p class="orderitem-header-hide">Кол-во</p>                                                                            
                                                                        <!-- <div class="main-cart-quantity-controls"> -->
                                                                        <p><span>2</span><span>  шт.</span></p>
                                                                            <!--  <button class="cart-minus-quantity" data-id="${id}">-</button>
                                                                            <input type="number" value="1" class="cart-quantity" data-id="${id}">
                                                                            <button class="cart-plus-quantity" data-id="${id}">+</button>   -->                              
                                                                        <!-- </div>  -->
                                                                    </div>
                                                                    <div class="orderitem-price orderitem-column">
                                                                        <div class="orderitem-price-amount"><!-- <p hide gap>header price</p> -->
                                                                            <p class="orderitem-header-hide">Цена</p>
                                                                            <p>53.12 р.</p>
                                                                        </div>
                                                                    </div>                                    
                                                                    <div class="orderitem-sum orderitem-column">
                                                                        <p class="orderitem-header-hide">Сумма</p>
                                                                        <span>53.12</span><span> р.</span>
                                                                    </div> 
                                                                    <!-- <div class="main-cart-delete orderitem-column"></div>                                     -->
                                                                </div>                                  
                                                                <!-- <div class="main-cart-remove"> -->
                                                                    <!--Remove cart-->
                                                                    <!-- <form action="" method="post" class="">
                                                                        <button class="cart-remove" data-id="${id}"></button>
                                                                    </form>                                   
                                                                </div>                             -->
                                                            </div>  
                                                            <!-- Строка таблицы -->                                                                                       
                                                        </div>                               
                                

                                                    </div>
                                                </li>
                                                <!-- <li><a href="#" class="orderhistory-menu__sublink">Овечки Jolly Mäh</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Единорог Theodor и его друзья</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Лесные жители</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Дикие обитатели</a></li>
                                                <li><a href="#" class="orderhistory-menu__sublink">Веселая ферма</a></li>       -->                                  
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