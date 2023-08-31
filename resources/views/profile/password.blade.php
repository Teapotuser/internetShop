@extends('profile.profile_master')
@section('profile_content')
    <div class="right-side-profile-title">Сменить пароль</div>
    <!--  Форма Сменить пароль -->
    <form class="form-order" action="{{ route('profile.update-password.update') }}" method="POST">
        @csrf
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
                            <!-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror -->
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
                            <!-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror -->
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
