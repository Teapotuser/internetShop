@extends('layouts.master')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">    
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
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link">
                            <span class="breadcrumb-title">Контакты</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <!-- <a href="#" class="breadcrumb-link breadcrumb-link--active"> -->
                            <span class="breadcrumb-title breadcrumb-title--active">Обратная связь</span>
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
                    <h2 class="section-header">Обратная связь</h2>
                   <!--  Форма адреса -->
                   <form class="form-order" method="POST" action="{{route('feedback.post')}}">
                        @csrf
                        <div class="form-order-wrapper">
                            <div class="decor form-feedback-panel">                                
                                <div class="form-inner">
                                    <h3>Напишите нам</h3>
                                    <input type="text" name="name" placeholder="Имя *" minLength="1" maxLength="150" required autocomplete="off" @error('name') class="invalid" @enderror value="{{old('name', Auth::user()?->name)}}">
                                    <input type="text" name="last_name" placeholder="Фамилия *" minLength="1" maxLength="150" required autocomplete="off" @error('last_name') class="invalid" @enderror value="{{old('last_name', Auth::user()?->last_name)}}">
                                    <input type="email" name="email" placeholder="Email *" minLength="1" maxLength="150" required autocomplete="off" @error('email') class="invalid" @enderror value="{{old('email', Auth::user()?->email)}}">
                                    <input type="number" name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Номер телефона" minLength="1" maxLength="20" autocomplete="off" @error('phone_number') class="invalid" @enderror value="{{old('phone_number', Auth::user()?->phone_number)}}">
                                    <textarea name="message" placeholder="Сообщение..." rows="4" autocomplete="off" @error('message') class="invalid" @enderror>{{old('message','')}}</textarea>     
                                    
                                    <div class="feedbackform-center-button">
                                        <button type="submit" class="main-cart-button-order btn-buy">Отправить сообщение</button>
                                        <!-- <a href="#" type="button" class="main-cart-button-order">Оформить заказ</a> -->
                                    </div> 
                                    <div class="feedback-img-container">
                                        <img class="" src="{{ asset('images/NICI/sheep_pencil.png') }}">
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