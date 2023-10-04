@extends('profile.profile_master')
@section('profile_content')
    <div class="right-side-profile-title">Сменить пароль</div>

    <!-- отображение сообщения -->
    @if(session('message'))                  
        <div class="alert-container">
            <div class="alert alert-success show showAlert">
                <div class="alert-success-icon"></div>
                <div class="alert-msg-container">
                    <div class="msg">{{session('message')}}</div>
                </div>
                <div class="close-btn">
                    <button type="button" id="close-alert-button"></button>
                </div>
            </div>
        </div>
   @endif
 <!-- отображение сообщения, что при Логине/Регистрации возникли ошибки -->
    @if($errors->any())
        <div class="alert-container">
            <div class="alert alert-danger showAlert show">
                <div class="alert-danger-icon"></div>
                <!-- <ul> -->
                <div class="alert-msg-container">
                    @foreach($errors->all() as $error)
                        <!-- <li>{{ $error }}</li> -->
                        <div class="msg">{{ $error }}</div>
                    @endforeach
                <!-- </ul> -->
                </div>
                <div class="close-btn">
                    <button type="button" id="close-alert-button"></button>
                </div>
            </div>        
        </div>
    @endif

    <!--  Форма Сменить пароль -->
    <form class="form-order" action="{{ route('profile.update-password.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-order-wrapper">
            <div class="decor form-profile-changepassword-panel">                
                <div class="form-inner">
                    <div class="form-profile-changepassword-panel-container">
                        <div class="">
                            <!-- <h3>Адрес</h3> -->
                            <div class="password-input-wrapper">
                                <input id="password" type="password"
                                       class="form-control password-field @error('current_password') is-invalid @enderror"
                                       name="current_password" required autocomplete="off"
                                       placeholder="Старый пароль *">
                                <button type="button" name="" value="" class="view-password-button">
                                    <img class="view-password-icon"
                                         src="{{ asset('images/noun-hide-5783163-grey.svg') }}"
                                         alt="hide-pass">
                                </button>
                            </div>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="">
                            <div class="password-input-wrapper">
                                <input id="password" type="password"
                                       class="form-control password-field @error('password'||'password_confirmation') is-invalid @enderror"
                                       name="password" required autocomplete="off"
                                       placeholder="Новый пароль *">
                                <button type="button" name="" value="" class="view-password-button">
                                    <img class="view-password-icon"
                                         src="{{ asset('images/noun-hide-5783163-grey.svg') }}"
                                         alt="hide-pass">
                                </button>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="">
                            <div class="password-input-wrapper">
                                <input id="password-confirm" type="password"
                                       class="form-control password-field @error('password_confirmation'||'password') is-invalid @enderror"
                                       name="password_confirmation" required autocomplete="off"
                                       placeholder="Подтвердите пароль *">
                                <button type="button" name="" value="" class="view-password-button">
                                    <img class="view-password-icon"
                                         src="{{ asset('images/noun-hide-5783163-grey.svg') }}"
                                         alt="hide-pass">
                                </button>
                            </div>
                            @error('password_confirmation'||'password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="feedbackform-center-button">
                        <button type="submit" class="main-cart-button-order btn-buy">Сохранить
                            изменения
                        </button>
                        <!-- <a href="#" type="button" class="main-cart-button-order">Оформить заказ</a> -->
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
