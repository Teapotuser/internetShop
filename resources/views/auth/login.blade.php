@extends('layouts.master')
@section('custom_css')
    <link rel="stylesheet" href="{{asset('css/order-form-new.css')}}">
@endsection
@section('content')
    <main>
        <div class="wrapper">
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
                                           placeholder="Ваш e-mail"> <!--value="{{ old('email') }}" -->

                                    <!-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->
                                </div>
                                <div class="">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password" placeholder="Ваш пароль">

                                    <!-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->
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
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password" placeholder="Пароль *">

                                    <!-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->
                                </div>
                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="Подтвердите пароль *">
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