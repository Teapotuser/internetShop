@extends('layouts.master')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">   
    <link rel="stylesheet" href="{{asset('css/admin-alert1.css')}}">   
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
                        <div class="alert-container">
                            <div class="alert alert-success show showAlert">
                                <div class="alert-success-icon"></div>
                                <div class="alert-msg-container">
                                    <div class="msg">{{$message}}</div>
                                </div>
                                <div class="close-btn">
                                    <button type="button" id="close-alert-button"></button>
                                </div>
                            </div>
                        </div>
                    @endisset      
                    <h2 class="section-header">Обратная связь</h2>
                   <!--  Форма адреса -->
                   <form class="form-order" method="POST" action="{{route('feedback.post')}}">
                        @csrf
                        <div class="form-order-wrapper">
                            <div class="decor form-feedback-panel">                                
                                <div class="form-inner">
                                    <h3>Напишите нам</h3>
                                    <input type="text" name="name" placeholder="Имя *" minLength="1" maxLength="150" required autocomplete="off" @error('name') class="is-invalid" @enderror value="{{old('name', Auth::user()?->name)}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <input type="text" name="last_name" placeholder="Фамилия *" minLength="1" maxLength="150" required autocomplete="off" @error('last_name') class="is-invalid" @enderror value="{{old('last_name', Auth::user()?->last_name)}}">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <input type="email" name="email" placeholder="Email *" minLength="1" maxLength="150" required autocomplete="off" @error('email') class="is-invalid" @enderror value="{{old('email', Auth::user()?->email)}}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <input type="number" name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Номер телефона" minLength="1" maxLength="20" autocomplete="off" @error('phone_number') class="is-invalid" @enderror value="{{old('phone_number', Auth::user()?->phone_number)}}">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <textarea name="message" placeholder="Сообщение..." rows="4" autocomplete="off" @error('message') class="is-invalid" @enderror>{{old('message','')}}</textarea>     
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror

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
<script src="{{ asset('js/admin-alert-form.js') }}" type="text/javascript"></script>
@endsection 