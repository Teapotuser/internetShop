@extends('layouts.master')
@section('custom_css')
    <link rel="stylesheet" href="{{asset('css/order-form-new.css')}}">
    <link rel="stylesheet" href="{{asset('css/password.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endsection
@section('content')
    <main>
        <div class="wrapper">
            <div class="shop-wrapper">
                <!-- левая панель -->
                <section class="right-side">
                    <!-- Правая галерея товаров -->
                    <h2 class="section-header">Оформление заказа</h2>
                    <!--  Форма адреса -->
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
                    @if(Session::get('cart')&& count(Session::get('cart')))
                    <form class="form-order" action="{{route('saveOrder')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-order-wrapper">
                            <div class="decor form-order-panel">
                                <div class="form-inner">
                                    <h3>Контактная информация</h3>
                                    <input type="text" placeholder="Имя *" minlength="1" maxlength="150" required=""
                                           value="{{old('name',Auth::user()?->name)}}"
                                           name="name">
                                    <input type="text" placeholder="Фамилия *" minlength="1" maxlength="150"
                                           value="{{old('last_name',Auth::user()?->last_name)}}"
                                           name="last_name"
                                           required="">
                                    <input type="email" placeholder="E-mail *" minlength="1" maxlength="150" required=""
                                           value="{{old('email',Auth::user()?->email)}}"
                                           name="email">
                                    <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone_number"
                                           value="{{old('phone_number',Auth::user()?->phone_number)}}"
                                           placeholder="Номер телефона *" minlength="1" maxlength="20" required="">
                                    @guest()
                                        <a href="{{route('login')}}" class="is-registered-question">Вы уже
                                            зарегистрированы?</a>
                                        <p class="info-text">Вы можете создать аккаунт после оформления заказа</p>
                                        <div class="form-inner-checkbox">

                                            <input type="checkbox" id="create-account" name="create-account" @checked(old('create-account', )) >
                                            <label for="create-account">
                                                <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                     class="svg-checkbox">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"></path>
                                                </svg>
                                                Зарегистрировать аккаунт
                                            </label>
                                        </div>

                                        <!-- Поля ввода и подтверждения пароля -->
                                        <div class="">
                                            <div class="password-input-wrapper @if(old('create-account')!='on') hidden @endif">
                                                <input id="password" type="password"
                                                    class="form-control password-field input-margin-top password @if(old('create-account')!='on') hidden @endif"
                                                    name="password" autocomplete="off" placeholder="Пароль *" @if(old('create-account')=='on') required @endif>
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
                                            <div class="password-input-wrapper @if(old('create-account')!='on') hidden @endif">
                                                <input id="password-confirm" type="password"
                                                    class="form-control password-field password @if(old('create-account')!='on') hidden @endif" name="password_confirmation"
                                                    autocomplete="off" placeholder="Подтвердите пароль *" @if(old('create-account')=='on') required @endif>
                                                <button type="button" name="" value="" class="view-password-button">
                                                    <img class="view-password-icon" src="{{ asset('images/noun-hide-5783163-grey.svg') }}" alt="hide-pass">
                                                </button>  
                                            </div>   
                                        </div>
                                        <!-- <input type="submit" value="Отправить"> -->
                                    @endguest

                                </div>
                            </div>
                            <div class="form-order-middle-wrapper form-order-panel">
                                <!--  Форма способа доставки -->
                                <div class="decor">
                                    <div class="form-inner">
                                        <h3>Способ доставки</h3>
                                        <ul class="ul-margin-bottom-zero">
                                            <li>
                                                <input type="radio" id="pickup" name="delivery_method" value="pickup"
                                                    @checked(old('delivery_method', true))>
                                                <label for="pickup">Самовывоз</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="post" name="delivery_method"
                                                       value="post" @checked(old('delivery_method', ))>
                                                <label for="post">Адресная доставка</label>
                                            </li>
                                        </ul>                                        
                                        <input type="text" placeholder="Адрес" class="delivery-address hidden input-margin-top"
                                               value="{{old('address')}}"
                                               name="address"
                                               maxlength="250">
                                        <input type="text" placeholder="Город" name="city"
                                        value="{{old('city')}}"
                                        class="delivery-address hidden" maxlength="150">  
                                        <input type="text" placeholder="Индекс" name="zip_code"
                                        value="{{old('zip_code')}}"
                                        class="delivery-address hidden" maxlength="20">     
                                    </div>
                                </div>
                                <!--  Форма способа оплаты -->
                                <div class="decor">
                                    <div class="form-inner">
                                        <h3>Метод оплаты</h3>
                                        <ul class="ul-margin-bottom-zero">
                                            <li>
                                                <input type="radio" id="cash" name="payment_method" value="cash"
                                                    @checked(old('payment-method', true))>
                                                <label for="cash">Наличными</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="card" name="payment_method"
                                                       value="card" @checked(old('payment_method', ))>
                                                <label for="card">Кредитной картой</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Содержание заказа -->
                            <div class="decor form-order-panel">
                                <div class="form-inner">
                                    <h3>Заказ</h3>
                                    <!--  Таблица товаров в корзине -->
                                    <div class="orderform-cart-table-container">
                                        <!-- Заголовок таблицы -->
                                        <div class="orderform-cart-row" data-set="relative">
                                            <div class="orderform-cart-item-container orderform-cart-column"
                                                 data-set="50%">
                                                <span class="orderform-cart-item orderform-cart-header">Товар</span>
                                            </div>
                                            <div class="orderform-cart-qtysum-container orderform-cart-column"
                                                 data-set="50%">
                                                <span
                                                    class="orderform-cart-quantity orderform-cart-header">Кол-во</span>
                                                <span class="orderform-cart-sum orderform-cart-header">Сумма</span>
                                            </div>
                                        </div>
                                        <!-- Строка таблицы -->
                                        @foreach($items as $item)

                                            <div class="orderform-cart-row">
                                                <div class="orderform-cart-item-container orderform-cart-column"
                                                     data-set="50%">
                                                    <div class="orderform-cart-item">
                                                        <a href="{{route('product.show',$item['id'])}}"
                                                           class="orderform-cart-title">{{$item['name']}}</a>
                                                        <div class="orderform-cart-article">
                                                            Артикул: {{$item['id']}}</div>
                                                    </div>
                                                </div>
                                                <div class="orderform-cart-qtysum-container orderform-cart-column"
                                                     data-set="50%">
                                                    <div class="orderform-cart-quantity">
                                                        <span>{{$item['quantity']}}</span><span>шт.</span>
                                                    </div>
                                                    <div class="orderform-cart-sum">
                                                        <span>{{round($item['quantity']*$item['price'],2)}}</span><span> р.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                    <div class="orderform-cart-total">
                                        <strong class="orderform-cart-total-title">Всего:</strong>
                                        <span class="orderform-cart-total-price">{{$sum}} р.</span>
                                    </div>
                                    <!-- <input type="submit" value="Отправить"> -->
                                    <div class="orderform-center-button">
                                        <button type="submit" class="main-cart-button-order">Оформить заказ</button>
                                        <!-- <a href="#" type="button" class="main-cart-button-order">Оформить заказ</a> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    @else
                        <p class="section-header">Корзина пуста</p>
                        <br>
                        <a href="{{url('/')}}" class="main-cart-back"> Перейти к покупкам</a>
                        <br>
                    @endif
                </section>
            </div>
        </div>
    </main>
@endsection
@section('custom_js')
    <script src="{{asset('js/orderform-control.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/view-hide-password.js') }}" type="text/javascript"></script>
@endsection 
