@extends('layouts.master')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">    
@endsection
@section('content')
    <main>
        <div class="wrapper">   
           
            <div class="shop-wrapper">               
                <!-- левая панель -->                
                <section class="right-side"> <!-- Правая галерея товаров -->              
                    <h2 class="section-header">Обратная связь</h2>
                   <!--  Форма адреса -->
                   <form class="form-order">
                        <div class="form-order-wrapper">
                            <div class="decor form-feedback-panel">
                                <!--  <div class="form-left-decoration"></div>
                                <div class="form-right-decoration"></div> 
                                <div class="circle"></div> -->
                                <div class="form-inner">
                                    <h3>Напишите нам</h3>
                                    <input type="text" placeholder="Имя *" minLength="1" maxLength="150" required autocomplete="off">
                                    <input type="text" placeholder="Фамилия *" minLength="1" maxLength="150" required autocomplete="off">
                                    <input type="email" placeholder="Email *" minLength="1" maxLength="150" required autocomplete="off">
                                    <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Номер телефона" minLength="1" maxLength="20" autocomplete="off">
                                    <textarea placeholder="Сообщение..." rows="4" autocomplete="off"></textarea>     
                                    <!-- <input type="text" placeholder="Адрес" class="delivery-address input-margin-top" maxLength="250" >                             -->
                                    <!-- <p class="info-text">Вы можете создать аккаунт после оформления заказа</p> -->
                                    <div class="feedbackform-center-button">
                                        <button type="submit" class="main-cart-button-order btn-buy">Отправить сообщение</button>
                                        <!-- <a href="#" type="button" class="main-cart-button-order">Оформить заказ</a> -->
                                    </div> 
                                    <div class="feedback-img-container">
                                        <img class="" src="images/NICI/sheep_pencil.png">
                                    </div>                                 
                                </div>                                                   
                            </div>
                        </div>        
                    </form>
                    
                </section> 
            </div> 
        </div>
    </main>   
@endsection        
@section('custom_js')
<!-- <script src="{{ asset('js/price-control.js') }}" type="text/javascript"></script> -->
@endsection 