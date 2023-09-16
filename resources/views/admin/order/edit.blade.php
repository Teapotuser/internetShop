@extends('layouts.admin')
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('admin/css/admin-form.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/dropdown-control.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-alert1.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/select2-mystyle.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-table.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-orderitem.css') }}" type="text/css">
@endsection
@section('dashboard-content')
    <div class="overview">
        <div class="title title-with-button">
            <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
            <div class="title-left">
                <div class="title-rectangle-icon">
                    <div class="title-add-icon"></div>
                </div>
                <span class="text">Редактирование заказа</span>
            </div>
            <a href="{{route('dashboard.order.index')}}" class="admin-back-button">
                <div class="title-back-icon"></div>
                <span>Назад</span>
            </a>
        </div>
    </div>
    <!-- отображение сообщения, что при сохранении Коллекции возникли ошибки -->
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

    <!-- @if(session()->has('success'))
        <div class="alert-container">
            <div class="alert alert-success show showAlert">
                <div class="alert-success-icon"></div>
                <div class="msg">{{ session()->get('success') }}</div>
            <div class="close-btn">
                <button type="button" id="close-alert-button"></button>
            </div>
        </div>
    </div>
    @endif -->
    <!-- Форма добавления Пользователя -->
    <div class="form-wrapper">
        <!--Форма логина-->
        <form method="POST" action="{{ route('dashboard.order.update',$order) }}" enctype="multipart/form-data"
              class="login-form-decor" id="order-form">
            @csrf
            @method('PATCH')
            <div class="form-inner">
                <div class="two-fields-product-container">
                    <div>
                        <label for="order_number">Номер заказа *</label>
                        <input type="number" name="order_number" id="order_number" minLength="1" maxLength="50" disabled
                               autocomplete="off" value="{{ $order->id }}">

                    </div>
                    <div>
                        <label for="created_at">Дата создания*</label>
                        <input type="date" name="created_at" id="created_at" min="2023-04-01" autocomplete="off"
                               disabled
                               value="{{ $order->created_at->format('Y-m-d') }}">
                    </div>
                </div>
                <!-- Комбобокс Роль -->
                <label for="status">Статус *</label>
                <br>
                <div class="form-group">
                    <div class="dropdown">
                        <button type="button" class="dropdown__button enabled">
                            <div class="dropdown__button-text enabled">{{$order->getStatusTitle()}}</div>
                        </button>
                        <ul class="dropdown__list">
                            <li class="dropdown__list-item" data-value="New">Новый</li>
                            <li class="dropdown__list-item" data-value="Paid">Оплачен</li>
                            <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                            <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                            <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                        </ul>
                        <input type="hidden" name="status" id="status" value="{{ $order->status}}"
                               class="dropdown__input-hidden">
                    </div>
                </div>
                <!--End of Комбобокс Роль-->
                <div class="two-fields-product-container">
                    <div>
                        <label for="orderitems_count">Количество товаров (шт.)</label>
                        <input type="number" name="orderitems_count" id="orderitems_count" disabled
                               autocomplete="off" value="{{ $order->getOrderItemsCount() }}">

                    </div>
                    <div>
                        <label for="order_total">Сумма (р.)</label>
                        <input type="text" name="order_total" id="order_total" disabled
                               autocomplete="off" value="{{ $order->orderPrice() }}">
                    </div>
                </div>

                <h3 class="file-upload-pairs-title">Контактное лицо</h3>

                <label for="select2-user">Пользователь *</label>
                <select class="select2-users" id="select2-user" name="user_id">
                    <option></option>

                    @foreach($users as $user)
                        <option
                            @selected($order->user_id==$user->id)
                            data-name="{{$user->name}}"
                            data-last_name="{{$user->last_name}}"
                            data-email="{{$user->email}}"
                            data-phone_number="{{$user->phone_number}}"
                            value="{{$user->id}}">{{implode(' ',[$user->name,$user->last_name,$user->email,$user->phone_number])}}</option>
                    @endforeach
                </select>

                <label for="name">Имя *</label>
                <input type="text" name="name" id="name" minLength="1" maxLength="150" required autocomplete="off"
                       @disabled($order->user_id)
                       value="{{ $order->getUserName() }}">

                <label for="last_name">Фамилия *</label>
                <input type="text" name="last_name" id="last_name" minLength="1" maxLength="200" required
                       @disabled($order->user_id)
                       autocomplete="off"
                       value="{{ $order->getUserLastName() }}">

                <label for="email">E-mail *</label>
                <input type="email" name="email" id="email" minLength="1" maxLength="150" required
                       @disabled($order->user_id)
                       autocomplete="off"
                       value="{{ $order->getUserEmail() }}">

                <label for="phone_number">Телефон *</label>
                <input @disabled($order->user_id)
                       type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone_number" id="phone_number"
                       minLength="1" maxLength="20" required autocomplete="off" value="{{ $order->getUserPhone() }}">

                <h3 class="file-upload-pairs-title">Данные доставки</h3>
                <ul class="ul-margin-bottom-zero">
                    <li class="radiobutton-row">
                        <input type="radio" id="pickup" name="delivery_method" value="pickup"
                            @checked($order->delivery_method)>
                        <label for="pickup">Самовывоз</label>
                    </li>
                    <li class="radiobutton-row">
                        <input type="radio" id="post" name="delivery_method"
                               value="post" @checked($order->delivery_method)>
                        <label for="post">Адресная доставка</label>
                    </li>
                </ul>
                <br>
                <label for="address">Адрес</label>
                <input type="text" name="address" id="address" minLength="1" maxLength="500" autocomplete="off"
                       value="{{ $order->address }}">

                <div class="two-fields-product-container">
                    <div>
                        <label for="city">Город</label>
                        <input type="text" name="city" id="city" minLength="1" maxLength="200" autocomplete="off"
                               value="{{ $order->city }}">
                    </div>
                    <div>
                        <label for="zip_code">Индекс</label>
                        <input type="text" name="zip_code" id="zip_code" minLength="1" maxLength="20" autocomplete="off"
                               value="{{ $order->zip_code }}">
                    </div>
                </div>
                <label for="track_number">Трек номер посылки</label>
                <input type="text" name="track_number" id="track_number" minLength="1" maxLength="150"
                       autocomplete="off" value="{{ $order->track_number }}">

                <h3 class="file-upload-pairs-title">Данные оплаты</h3>
                <ul class="ul-margin-bottom-zero">
                    <li class="radiobutton-row">
                        <input type="radio" id="cash" name="payment_method" value="cash"
                            @checked($order->payment_method)>
                        <label for="cash">Наличными</label>
                    </li>
                    <li class="radiobutton-row">
                        <input type="radio" id="card" name="payment_method"
                               value="card" @checked($order->payment_method)>
                        <label for="card">Кредитной картой</label>
                    </li>
                </ul>
                <br>
                <div class="two-fields-product-container">
                    <div>
                        <br>
                        <div class="form-inner-checkbox">
                            <input type="checkbox" id="is_paid" name="is_paid"
                                   class="checkbox-customized" @checked($order->is_paid)>
                            <label for="is_paid">
                                <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                </svg>
                                Оплачен
                            </label>
                        </div>
                        <br>
                    </div>
                    <div>
                        <label for="payment_date">Дата оплаты</label>
                        <input type="date" name="payment_date" id="payment_date" min="2023-04-01" autocomplete="off"

                               value="{{ $order->payment_date }}">
                    </div>
                </div>
            </div>
        </form>

    </div>

    <!-- Таблица с данными Вадим-->
    <!-- Строка заголовков таблицы-->
    <div class="accounts-list">
        <div class="accounts-head orderitem">
            <p class="head-orderitem-image">Изображение</p>
            <p class="head-orderitem-title">Название</p>
            <p class="head-orderitem-quantity">Количество</p>
            <p class="head-orderitem-price">Цена</p>
            <p class="head-orderitem-sum">Сумма</p>
            <p class="head-orderitem-actions"></p>
        </div>
        <div class="account-rows">
            <!-- Строки таблицы-->

            @foreach($order->order_products as $product)
                <div class="account-card list itemRow">
                    <div class="account-card-item orderitem-image-column orderitem">
                        <p class="card-mobile-text">Изображение</p>
                        <div class="account admin-table-img-container">
                            <img class="admin-table-img" src="{{$product->product->picture}}" alt="">
                        </div>
                    </div>
                    <div class="account-card-item orderitem-title-column orderitem">
                        <p class="card-mobile-text">Название</p>
                        <p class="account">{{$product->product->title}}</p>
                        <p class="account orderitem">Артикул: {{$product->product->article}}</p>
                        <p class="account orderitem">Размер: {{$product->product->size}} см</p>
                    </div>
                    <div class="account-card-item orderitem-quantity-column orderitem">
                        <p class="card-mobile-text">Количество</p>
                        <p class="account">
                        <div class="admin-orderitem-quantity-controls">
                            <button class="admin-orderitem-minus-quantity">-</button>
                            <input type="hidden" form="order-form" value="{{$product->product_id}}" name="products[]">
                            <input type="number" form="order-form" value="{{$product->quantity}}"
                                   class="admin-orderitem-quantity"
                                   name="quantity[]">
                            <button class="admin-orderitem-plus-quantity">+</button>
                        </div>
                        </p>
                    </div>
                    <div class="account-card-item orderitem-price-column orderitem">
                        <p class="card-mobile-text">Цена</p>
                        <p class="account"><span>{{$product->price/100}}</span> р.</p>
                    </div>
                    <div class="account-card-item orderitem-sum-column orderitem">
                        <p class="card-mobile-text">Сумма</p>
                        <p class="account"><span>{{$product->price / 100 * $product->quantity}}</span> р.</p>
                    </div>


                </div>
            @endforeach


            <div class="account-card list orderitem-total"> <!--  list -->
                <div class="account-card-item orderitem-total-title-column orderitem">
                    <p class="card-mobile-text"><!-- Название --></p>
                    <p class="account">Итого:</p>
                </div>
                <div class="account-card-item orderitem-total-quantity-column orderitem">
                    <p class="card-mobile-text">Количество</p>
                    <p class="account"><span>{{$order->getOrderItemsCount()}}</span> шт.</p>
                </div>
                <div class="account-card-item orderitem-total-sum-column orderitem">
                    <p class="card-mobile-text">Сумма</p>
                    <p class="account"><span>{{$order->orderPrice()}}</span> р.</p>
                </div>

                <div class="account-card-item orderitem-actions-column orderitem orderitem-total">
                    <p class="card-mobile-text"><!-- Действие --></p>
                    <!-- <p class="account">HJGHG7</p> -->
                    <div class="account">
                        <div class="wrapper-icon">
                            <!-- <button class="admin-action-ahref orderitem" >
                                <div class="btn-delete"></div>
                            </button>   -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="admin-save-button-wrapper">
        <div class="center-button">
            <div class="">
                <button type="submit" class="admin-save-button" form="order-form">
                    <div class="admin-save-icon"></div>
                    <span>Сохранить</span>
                </button>
                <div></div>
            </div>
        </div>
    </div>

@endsection
@section('custom_js')
    <script src="{{ asset('js/jquery.min.js') }}" type='text/javascript'></script>
    <script src="{{ asset('admin/js/dropdown-control.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/admin-alert-form.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/select2-with-search.js') }}" type="text/javascript"></script>
    {{--    <script src="{{ asset('admin/js/cart.js.js') }}" type="text/javascript"></script>--}}
@endsection
