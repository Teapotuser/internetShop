@extends('layouts.master')
@section('custom_css') 
    <!-- <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">  -->
    <link rel="stylesheet" href="{{ asset('css/subscription.css') }}" type="text/css">    
@endsection
@section('content')
    <main>
        <div class="wrapper">   
           
            <div class="shop-wrapper">               
                <!-- левая панель -->                
                <section class="right-side"> <!-- Правая галерея товаров --> 
                    @isset($message)
                        {{$message}}
                    @endisset             
                    <h2 class="section-header">Подписка на рассылку</h2>
                    <div class="right-side-description"> 
                        <p>Просто подпишитесь на нашу регулярную рассылку, и вы всегда будете первыми узнавать о новых статьях и предложениях.<br>
Конечно, вы можете в любое время отказаться от подписки на рассылку новостей, перейдя на эту страницу.
                        </p>
                    </div>
                   <!--  Форма адреса -->
                   <form class="form-order" method="POST" action="{{route('subscription.post')}}">
                        @csrf
                        <div class="form-order-wrapper">
                            <div class="decor form-feedback-panel">                                
                                <div class="form-inner">
                                    <h3>Подписка на рассылку</h3>
                                    <ul class="ul-margin-bottom-zero">
                                        <li>
                                            <input type="radio" id="subscribe" name="subscription_choice" value="subscribe"
                                                @checked(old('subscription_choice', true))>
                                            <label for="subscribe">Подписаться на рассылку</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="unsubscribe" name="subscription_choice"
                                                    value="unsubscribe" @checked(old('subscription_choice', ))>
                                            <label for="unsubscribe">Отписаться от рассылки</label>
                                        </li>
                                    </ul>  
                                    <br> 
                                    <input type="email" name="email" placeholder="Email *" minLength="1" maxLength="150" required autocomplete="off" @error('email') class="invalid" @enderror value="{{old('email', Auth::user()?->email)}}">
                                    <br>                                 
                                    <!-- <p class="info-text">Вы можете создать аккаунт после оформления заказа</p> -->
                                    <div class="form-inner-checkbox">
                                        <input type="checkbox" id="create-account" name="create-account" @checked(old('create-account', )) >
                                        <label for="create-account">
                                            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                    class="svg-checkbox">
                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"></path>
                                            </svg>
                                            Настоящим я соглашаюсь с тем, что NICI BY хранит мои контактные данные, чтобы отправлять мне информацию/предложения о своей продукции в электронном виде. Я могу отозвать свое согласие в любое время, отписавшись от рассылки новостей на этой странице
                                        </label>
                                    </div>

                                    <div class="feedbackform-center-button">
                                        <button type="submit" class="main-cart-button-order btn-buy">Сохранить</button>
                                        <!-- <a href="#" type="button" class="main-cart-button-order">Оформить заказ</a> -->
                                    </div> 
                                    <div class="subscription-img-container">
                                        <img class="" src="{{ asset('images/NICI/subscription.png') }}">
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