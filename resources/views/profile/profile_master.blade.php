@extends('layouts.master')
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/password.css')}}">
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
                   <!--  <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link">
                            <span class="breadcrumb-title">Личный кабинет</span>
                        </a>
                    </li> -->
                    <li class="breadcrumb-item">
                        <!-- <a href="#" class="breadcrumb-link breadcrumb-link--active"> -->
                            <span class="breadcrumb-title breadcrumb-title--active">Личный кабинет</span>
                        <!-- </a> -->
                    </li>
                </ul>
           </nav>
            <div class="shop-wrapper">
                <!-- левая панель -->
                @include('profile.partials.sidebar')
                <section class="right-side"> <!-- Правая галерея товаров -->
                    <div class="right-side-wrapper">
                        <h1 class="right-side-title">Личный кабинет</h1>
                        @yield('profile_content')
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
@section('custom_js')
    <script src="{{ asset('js/file-upload-pairs.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/view-hide-password.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin-alert-form.js') }}" type="text/javascript"></script>
@endsection
