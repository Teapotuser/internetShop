@extends('layouts.master')
@section('custom_css') 
    <!-- <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">  -->
    <link rel="stylesheet" href="{{ asset('css/subscription.css') }}" type="text/css">    
@endsection
@section('content')
    <main>
        <div class="wrapper">   
           <!-- Хлебные крошки -->
           <nav class="breadcrumbs-panel">
                <ul class="breadcrumbs-list">
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link">
                            <!-- <span class="breadcrumb-title">Главная</span> -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" x="0px" y="0px"><g data-name="Layer 1"><path d="M17.6,6.2l-8-6A1,1,0,0,0,8.4.2l-8,6A1,1,0,0,0,1.6,7.8L2,7.5V15a1,1,0,0,0,1,1H15a1,1,0,0,0,1-1V7.5l.4.3a1,1,0,0,0,1.2-1.6ZM8,14V10h2v4Zm6-8v8H12V9a1,1,0,0,0-1-1H7A1,1,0,0,0,6,9v5H4V6H4L9,2.25,14,6Z" fill="#484848"/></g></svg>
                        </a>
                    </li>
                    <!-- <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link">
                            <span class="breadcrumb-title">Категории</span>
                        </a>
                    </li> -->
                    <li class="breadcrumb-item">
                        <!-- <a href="#" class="breadcrumb-link breadcrumb-link--active"> -->
                            <span class="breadcrumb-title breadcrumb-title--active">Подписка на рассылку</span>
                        <!-- </a> -->
                    </li>
                </ul>
           </nav>
            <div class="shop-wrapper">               
                <!-- левая панель -->                
                <section class="right-side"> <!-- Правая галерея товаров --> 
                    @isset($message)
                        {{$message}}
                    @endisset  
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <!-- <li>{{ $error }}</li> -->
                            <div class="msg">{{ $error }}</div>
                        @endforeach
                        <!-- </ul> -->
                    @endif           
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
                                    <input type="email" name="subsribe-email" placeholder="Email *" minLength="1" maxLength="150" required autocomplete="off" @error('subsribe-email') class="invalid" @enderror value="{{old('subsribe-email', Auth::user()?->email)}}">
                                    <br>                                 
                                    <!-- <p class="info-text">Вы можете создать аккаунт после оформления заказа</p> -->
                                    <div class="form-inner-checkbox">
                                        <input type="checkbox" id="create-account" name="agree" @checked(old('agree', )) >
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