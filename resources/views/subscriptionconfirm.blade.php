@extends('layouts.master')
@section('custom_css')
    <link rel="stylesheet" href="{{asset('css/feedback-confirm.css')}}">
    <link rel="stylesheet" href="{{asset('css/order-form-new.css')}}">
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
                            <span class="breadcrumb-title">Подписка на рассылку</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <!-- <a href="#" class="breadcrumb-link breadcrumb-link--active"> -->
                            <span class="breadcrumb-title breadcrumb-title--active">Подтверждение подписки</span>
                        <!-- </a> -->
                    </li>
                </ul>
           </nav>
            <div class="shop-wrapper">
                <!-- левая панель -->
                <section class="right-side">
                    <!-- Правая галерея товаров -->
                    <h2 class="section-header">Подтверждение подписки</h2>
                    <!--  Форма адреса -->
                    <div class="feedback-confirmation-container">
                        <div class="feedback-confirmation-card">
                            <div class="icon-container">
                                <div class="circle"></div>
                                <div class="icon-circle">
                                    <div class="feedback-confirm-img-container">
                                        <img class="" src="{{asset('images/NICI/subscription-confirm.png')}}">
                                    </div>
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         version="1.1" x="0px" y="0px" viewBox="0 0 100 100"
                                         style="enable-background:new 0 0 100 100;" xml:space="preserve" class="icon"><path
                                            d="M95.5509872,17.8440819c-2.5986938-2.5986881-6.8119583-2.5986881-9.4107132-0.0000648L35.9452019,68.0378723  l-22.085495-22.0844002c-2.5986881-2.5986252-6.8119555-2.5985603-9.4106426,0.0001259  c-2.5987515,2.5987549-2.5987515,6.8120842,0,9.4107742L31.2398472,82.15522  c1.2985706,1.2998581,3.0026379,1.9497223,4.7053547,1.9497223c1.7027779,0,3.4068451-0.6498642,4.7053528-1.9497223  l54.9004326-54.9004288C98.1496735,24.6561012,98.1496735,20.4427681,95.5509872,17.8440819z"
                                            fill="#ffffff"></path>
                                    </svg> -->
                                </div>
                            </div>
                            <h3 class="title">Подписка успешно оформлена!</h3>
                            <p class="message">Поздравляем, вы подписались на нашу рассылку!</p>
                            <!-- <p class="message">Спасибо, что помогаете нам стать лучше.</p>                            -->
                            <p class="message bottom-margin">Самые интересные новости, выгодные акции и предложения магазина вы сможете найти в вашей почте <span>user_email_subscription@mail.ru</span>.</p>
                        
                            <h3 class="title">Вы успешно отписались от рассылки!</h3>
                            <p class="message">Спасибо, что были с нами. Надеемся, наши письма были полезными для вас.</p>
                            <p class="message">Вы больше не будете получать рассылку на вашу почту <span>user_email_subscription@mail.ru</span>.</p>
                            <p class="message bottom-margin">В любой момент вы можете подписаться на рассылку снова.</p>
                        
                            <!--  <div class="order-confirm-img-container">
                                <img class="" src="{{asset('images/NICI/shopping_cart_with_bags_lion_einhorn.png')}}">
                            </div> -->
                            <a href="{{ route('feedback.form') }}" class="btn-buy">На главную</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
