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