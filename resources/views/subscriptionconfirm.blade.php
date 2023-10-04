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
                        <a href="{{route('index')}}" class="breadcrumb-link">
                            <!-- <span class="breadcrumb-title">Главная</span> -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" x="0px" y="0px"><g data-name="Layer 1"><path d="M17.6,6.2l-8-6A1,1,0,0,0,8.4.2l-8,6A1,1,0,0,0,1.6,7.8L2,7.5V15a1,1,0,0,0,1,1H15a1,1,0,0,0,1-1V7.5l.4.3a1,1,0,0,0,1.2-1.6ZM8,14V10h2v4Zm6-8v8H12V9a1,1,0,0,0-1-1H7A1,1,0,0,0,6,9v5H4V6H4L9,2.25,14,6Z" fill="#484848"/></g></svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('subscription.form')}}" class="breadcrumb-link">
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
                                </div>
                            </div>
                            @if(!session('unsubscribe'))
                                <h3 class="title">Подписка успешно оформлена!</h3>
                                <p class="message">Поздравляем, вы подписались на нашу рассылку!</p>
                                <!-- <p class="message">Спасибо, что помогаете нам стать лучше.</p>                            -->
                                <p class="message bottom-margin">Самые интересные новости, выгодные акции и предложения магазина вы сможете найти в вашей почте <span>{{session('user_email')}}</span>.</p>
                            @else
                                <h3 class="title">Вы успешно отписались от рассылки!</h3>
                                <p class="message">Спасибо, что были с нами. Надеемся, наши письма были полезными для вас.</p>
                                <p class="message">Вы больше не будете получать рассылку на вашу почту <span>{{session('user_email')}}</span>.</p>
                                <p class="message bottom-margin">В любой момент вы можете подписаться на рассылку снова.</p>
                            @endif
                            <!--  <div class="order-confirm-img-container">
                                <img class="" src="{{asset('images/NICI/shopping_cart_with_bags_lion_einhorn.png')}}">
                            </div> -->
                            <a href="{{ route('index') }}" class="btn-buy">На главную</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
