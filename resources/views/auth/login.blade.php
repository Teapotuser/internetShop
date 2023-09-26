@extends('layouts.master')
@section('custom_css')
    <link rel="stylesheet" href="{{asset('css/order-form-new.css')}}">
    <link rel="stylesheet" href="{{asset('css/password.css')}}">
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
                            <span class="breadcrumb-title breadcrumb-title--active">Логин и Регистрация</span>
                        <!-- </a> -->
                    </li>
                </ul>
           </nav>
            <div class="shop-wrapper">
                <section class="right-side"> <!-- Формы логина и регистрации -->
                    <div class="form-wrapper">
                        <!--Форма логина-->
                        <form method="POST" action="{{ route('login') }}" class="login-form-decor">
                            @csrf
                            <div class="form-inner">
                                <h3>Логин пользователей</h3>
                                <div class="">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           required autocomplete="email" autofocus
                                           placeholder="Ваш e-mail *"> <!--value="{{ old('email') }}" -->

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="">
                                    <div class="password-input-wrapper">
                                        <input id="password" type="password"
                                            class="form-control password-field @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="off" placeholder="Ваш пароль *">
                                        <button type="button" name="" value="" class="view-password-button">
                                            <img class="view-password-icon" src="{{ asset('images/noun-hide-5783163-grey.svg') }}" alt="hide-pass">
                                        </button>  
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- <div class="">
                                    <div class="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div> -->
                                <div class="center-button">
                                    <div class="">
                                        <button type="submit" class="img_block__button">
                                            Вход
                                        </button>

                                        <!--  @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>


                                        @endif -->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--Форма регистрации-->
                        <form method="POST" action="{{ route('register') }}" class="login-form-decor">
                            @csrf
                            <div class="form-inner">
                                <h3>Регистрация нового пользователя</h3>
                                <div class="">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name" required
                                           autocomplete="name" autofocus
                                           placeholder="Имя *"> <!--value="{{ old('name') }}" -->

                                    <!-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->
                                </div>
                                <div class="">
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name" required autocomplete="last_name" autofocus
                                           placeholder="Фамилия *"><!--value="{{ old('last_name') }}" -->

                                    <!--  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->
                                </div>
                                <div class="">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           required autocomplete="email"
                                           placeholder="E-mail *"><!--value="{{ old('email') }}" -->

                                    <!--  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror -->
                                </div>
                                <div class="">
                                    <input id="phone_number" type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                           placeholder="Номер телефона *"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           name="phone_number" required
                                           autocomplete="phone_number"><!--value="{{ old('phone_number') }}" -->

                                    <!-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror -->
                                </div>
                                <div class="">
                                    <div class="password-input-wrapper">
                                        <input id="password" type="password"
                                            class="form-control password-field @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="off" placeholder="Пароль *">
                                        <button type="button" name="" value="" class="view-password-button">
                                            <img class="view-password-icon" src="{{ asset('images/noun-hide-5783163-grey.svg') }}" alt="hide-pass">
                                        </button>  
                                    </div> 
                                    <!-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->
                                </div>
                                <div class="">
                                    <div class="password-input-wrapper">
                                        <input id="password-confirm" type="password" class="form-control password-field @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" required autocomplete="off"
                                            placeholder="Подтвердите пароль *">
                                        <button type="button" name="" value="" class="view-password-button">
                                            <img class="view-password-icon" src="{{ asset('images/noun-hide-5783163-grey.svg') }}" alt="hide-pass">
                                        </button> 
                                    </div>
                                </div>
                                <div class="center-button">
                                    <div class="">
                                        <button type="submit" class="img_block__button">
                                            Продолжить<!-- {{ __('Register') }} -->
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </div>
    </main>
@endsection  
@section('custom_js')
<script src="{{ asset('js/view-hide-password.js') }}" type="text/javascript"></script>
@endsection                    
                
{{--<form method="POST" action="{{ route('login') }}">--}}
{{--    @csrf --}}

{{--    <div class="row mb-3"> --}}
{{--        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

{{--        <div class="col-md-6"> --}}
{{--            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

{{--            @error('email') --}}
{{--                <span class="invalid-feedback" role="alert"> --}}
{{--                    <strong>{{ $message }}</strong> --}}
{{--                </span> --}}
{{--            @enderror --}}
{{--        </div> --}}
{{--    </div> --}}

{{--    <div class="row mb-3"> --}}
{{--        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

{{--        <div class="col-md-6"> --}}
{{--            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}

{{--            @error('password') --}}
{{--                <span class="invalid-feedback" role="alert"> --}}
{{--                    <strong>{{ $message }}</strong> --}}
{{--                </span> --}}
{{--            @enderror --}}
{{--        </div> --}}
{{--    </div> --}}

{{--    <div class="row mb-3"> --}}
{{--        <div class="col-md-6 offset-md-4"> --}}
{{--            <div class="form-check"> --}}
{{--                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}

{{--                <label class="form-check-label" for="remember"> --}}
{{--                    {{ __('Remember Me') }} --}}
{{--                </label> --}}
{{--            </div> --}}
{{--        </div> --}}
{{--    </div> --}}

{{--    <div class="row mb-0"> --}}
{{--        <div class="col-md-8 offset-md-4"> --}}
{{--            <button type="submit" class="btn btn-primary"> --}}
{{--                {{ __('Login') }} --}}
{{--            </button> --}}

{{--            @if (Route::has('password.request')) --}}
{{--                <a class="btn btn-link" href="{{ route('password.request') }}"> --}}
{{--                    {{ __('Forgot Your Password?') }} --}}
{{--                </a> --}}
{{--            @endif --}}
{{--        </div> --}}
{{--    </div> --}}
{{-- </form> --}}