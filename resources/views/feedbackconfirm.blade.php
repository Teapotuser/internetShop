@extends('layouts.master')
@section('custom_css')
    <link rel="stylesheet" href="{{asset('css/feedback-confirm.css')}}">
    <link rel="stylesheet" href="{{asset('css/order-form-new.css')}}">
@endsection
@section('content')
    <main>
        <div class="wrapper">
            <div class="shop-wrapper">
                <!-- левая панель -->
                <section class="right-side">
                    <!-- Правая галерея товаров -->
                    <h2 class="section-header">Подтверждение отправки сообщения</h2>
                    <!--  Форма адреса -->
                    <div class="feedback-confirmation-container">
                        <div class="feedback-confirmation-card">
                            <div class="icon-container">
                                <div class="circle"></div>
                                <div class="icon-circle">
                                    <div class="feedback-confirm-img-container">
                                        <img class="" src="{{asset('images/NICI/Egon_Postmappen-feedbackconfirm.png')}}">
                                    </div>
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         version="1.1" x="0px" y="0px" viewBox="0 0 100 100"
                                         style="enable-background:new 0 0 100 100;" xml:space="preserve" class="icon"><path
                                            d="M95.5509872,17.8440819c-2.5986938-2.5986881-6.8119583-2.5986881-9.4107132-0.0000648L35.9452019,68.0378723  l-22.085495-22.0844002c-2.5986881-2.5986252-6.8119555-2.5985603-9.4106426,0.0001259  c-2.5987515,2.5987549-2.5987515,6.8120842,0,9.4107742L31.2398472,82.15522  c1.2985706,1.2998581,3.0026379,1.9497223,4.7053547,1.9497223c1.7027779,0,3.4068451-0.6498642,4.7053528-1.9497223  l54.9004326-54.9004288C98.1496735,24.6561012,98.1496735,20.4427681,95.5509872,17.8440819z"
                                            fill="#ffffff"></path>
                                    </svg> -->
                                </div>
                            </div>
                            <h3 class="title">Сообщение успешно отправлено!</h3>
                            <p class="message">Благодарим за ваше обращение!</p>
                            <p class="message">Спасибо, что помогаете нам стать лучше.</p>                           
                            <p class="message bottom-margin">В ближайшие 48 часов мы пришлем ответ на вашу почту <span>{{ session('user_email_feedback') }}</span>.</p>
                        
                            <!--  <div class="order-confirm-img-container">
                                <img class="" src="{{asset('images/NICI/shopping_cart_with_bags_lion_einhorn.png')}}">
                            </div> -->
                            <a href="{{ route('feedback.form') }}" class="btn-buy">Отправить новое сообщение</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
