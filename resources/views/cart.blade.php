@extends('layouts.master')
@section('custom_css')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/order-form-new.css')}}" type="text/css">
@endsection
@section('content')
    <main>
        <div class="wrapper">

            <div class="shop-wrapper">
                <section class="right-side"> <!-- Правая панель -->
                    <div class="cart_container cart-content-section">
                        <h2 class="section-header">Корзина
                            покупок @if(!Session::get('cart') || count(Session::get('cart'))==0)
                                пуста
                            @endif</h2>
                        <!--  Таблица товаров в корзине  -->
                        @if(Session::get('cart') && count(Session::get('cart')))
                            <div class="cart-table-container">
                                <!-- Заголовок таблицы -->
                                <div class="main-cart-row" data-set="relative">
                                    <div class="main-cart-itemimage-container main-cart-not-column" data-set="50%">
                                        <span class="main-cart-image main-cart-header main-cart-column"></span>
                                        <span
                                            class="main-cart-item main-cart-header main-cart-column">Название товара</span>
                                    </div>
                                    <div class="main-cart-priceqtysum-container main-cart-not-column" data-set="50%">
                                        <span class="main-cart-hide main-cart-header main-cart-column"></span>
                                        <span
                                            class="main-cart-quantity main-cart-header main-cart-column">Количество</span>
                                        <span class="main-cart-price main-cart-header main-cart-column">Цена</span>
                                        <span class="main-cart-sum main-cart-header main-cart-column">Сумма</span>
                                        <span class="main-cart-delete main-cart-header main-cart-column"></span>
                                    </div>
                                </div>
                               <!--  <div class="main-cart-items-wrapper">

                                </div> -->
                                <div class="main-cart-total main-cart-row-footer">
                                    <strong class="main-cart-total-title">Итого:</strong>
                                    <span class="main-cart-total-price"></span>
                                </div>
                            </div>
                            <div class="main-cart-buttons-container">
                                @if(Session::get('cart') && count(Session::get('cart')))
                                    <button type="button" class="main-cart-clear-cart">Очистить корзину</button>
                                    <a href="{{url('/')}}" type="button" class="main-cart-back">Продолжить покупки</a>
                                    <a href="{{ route('checkout') }}" class="main-cart-button-order">Оформить заказ</a>
                                @else
                                    <a href="{{url('/')}}" type="button" class="main-cart-back">Перейти к покупкам</a>
                                @endif
                            </div>
                        @else
                            <div class="main-cart-buttons-container">
                                <a href="{{url('/')}}" type="button" class="main-cart-back">Перейти к покупкам</a>
                            </div>
                        @endif


                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection

