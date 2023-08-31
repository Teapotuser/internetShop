@extends('layouts.master')
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/password.css')}}">
@endsection
@section('content')
    <main>
        <div class="wrapper">
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
@endsection
