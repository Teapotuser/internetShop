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
            <span class="text">Добавление нового заказа</span>  
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
    <form method="POST" action="{{ route('dashboard.order.store') }}" enctype="multipart/form-data" class="login-form-decor" id="order-form">
        @csrf
        <div class="form-inner">
            <div class="two-fields-product-container">
                <div>
                    <label for="order_number">Номер заказа *</label>
                    <input type="number" name="order_number" id="order_number" minLength="1" maxLength="50" required autocomplete="off" value="{{ old('order_number') }}" disabled>
                    @error('order_number')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror  
                </div>
                <div>
                    <label for="created_at">Дата создания *</label>
                    <input type="date" name="created_at" id="created_at" min="2023-04-01" autocomplete="off" value="{{ old('created_at',\Carbon\Carbon::now()->format('Y-m-d')) }}" disabled>
                    @error('created_at')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror 
                </div>
            </div>
            <!-- Комбобокс Роль --> 
            <label for="status">Статус *</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button enabled"><div class="dropdown__button-text enabled">Новый</div></button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="New" >Новый</li>
                        <li class="dropdown__list-item" data-value="Paid" >Оплачен</li>
                        <li class="dropdown__list-item" data-value="Sent" >Отправлен</li>
                        <li class="dropdown__list-item" data-value="Cancelled" >Отменен</li>
                        <li class="dropdown__list-item" data-value="Finished" >Завершен</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->                        
                    </ul>
                    <input type="hidden" name="status" id="status" value="{{ old('status','New') }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Роль--> 
            <div class="two-fields-product-container">
                <div>
                    <label for="orderitems_count">Количество товаров (шт.)</label>
                    <input type="number" name="orderitems_count" id="orderitems_count" min="1" max="10000" autocomplete="off" value="{{ old('orderitems_count') }}" disabled>
                    @error('orderitems_count')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror  
                </div>
                <div>
                    <label for="order_total">Сумма (р.)</label>
                    <input type="text" name="order_total" id="order_total" minLength="1" maxLength="50"  autocomplete="off" value="{{ old('order_total') }}" disabled>
                    @error('order_total')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror 
                </div>
            </div>
            
            <h3 class="file-upload-pairs-title">Контактное лицо</h3>

            <label for="select2-user">Пользователь</label>
            <select class="select2-users" id="select2-user" name="user_id">
                <option></option>
                @foreach($users as $user)
                    <option
                        data-name="{{$user->name}}"
                        data-last_name="{{$user->last_name}}"
                        data-email="{{$user->email}}"
                        data-phone_number="{{$user->phone_number}}"
                        data-city="{{$user->city}}"
                        data-address="{{$user->address}}"
                        data-zip_code="{{$user->zip_code}}"
                        value="{{$user->id}}">{{implode(' ',[$user->name,$user->last_name,$user->email,$user->phone_number])}}</option>
                @endforeach
            </select>
            <br>
            <label for="name">Имя *</label>
            <input type="text" name="name" id="name" minLength="1" maxLength="150" required autocomplete="off" value="{{ old('name') }}">
            @error('name')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="last_name">Фамилия *</label>
            <input type="text" name="last_name" id="last_name" minLength="1" maxLength="200" required autocomplete="off" value="{{ old('last_name') }}">
            @error('last_name')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="email">E-mail *</label>
            <input type="email" name="email" id="email" minLength="1" maxLength="150" required autocomplete="off" value="{{ old('email') }}">
            @error('email')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror             
            <label for="phone_number">Телефон *</label>
            <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone_number" id="phone_number" minLength="1" maxLength="20" required autocomplete="off" value="{{ old('phone_number') }}">
            @error('phone_number')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror                      

           <!--  <p class="label">Изображение</p>
            <div class="file-upload-container">
                <figure class="file-upload-preview-image-container">
                    <img id="chosen-image" class="chosen-image" src="{{ asset('/admin/images/Untitled.png')}}">
                    <figcaption id="file-name" class="file-name"></figcaption>
                </figure>
        
                <input type="file" id="upload-button" class="upload-button" accept="image/*" name="picture">
                <label for="upload-button" class="upload-file-label">
                    <div class="file-upload-icon"></div>
                    <span>Загрузить файл</span>
                </label>
                <button type="button" id="clear-file-button" class="clear-file-button hidden"></button>                            
            </div>
            <br>   -->

            <h3 class="file-upload-pairs-title">Данные доставки</h3>
            <ul class="ul-margin-bottom-zero">
                <li class="radiobutton-row">
                    <input type="radio" id="pickup" name="delivery_method" value="pickup"
                        @checked(old('delivery_method', true))>
                    <label for="pickup">Самовывоз</label>
                </li>
                <li class="radiobutton-row">
                    <input type="radio" id="post" name="delivery_method"
                            value="post" @checked(old('delivery_method', ))>
                    <label for="post">Адресная доставка</label>
                </li>
            </ul>  
            <br>
            <label for="address">Адрес</label>
            <input type="text" name="address" id="address" minLength="1" maxLength="500" autocomplete="off" value="{{ old('address') }}">
            @error('address')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <div class="two-fields-product-container">
                <div>
                    <label for="city">Город</label>
                    <input type="text" name="city" id="city" minLength="1" maxLength="200" autocomplete="off" value="{{ old('city') }}">
                    @error('city')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="zip_code">Индекс</label>
                    <input type="text" name="zip_code" id="zip_code" minLength="1" maxLength="20" autocomplete="off" value="{{ old('zip_code') }}">
                    @error('zip_code')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <label for="track_number">Трек номер посылки</label>
            <input type="text" name="track_number" id="track_number" minLength="1" maxLength="150" autocomplete="off" value="{{ old('track_number') }}">
            @error('track_number')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror

            <h3 class="file-upload-pairs-title">Данные оплаты</h3>
            <ul class="ul-margin-bottom-zero">
                <li class="radiobutton-row">
                    <input type="radio" id="cash" name="payment_method" value="cash"
                        @checked(old('payment-method', true))>
                    <label for="cash">Наличными</label>
                </li>
                <li class="radiobutton-row">
                    <input type="radio" id="card" name="payment_method"
                            value="card" @checked(old('payment_method', ))>
                    <label for="card">Кредитной картой</label>
                </li>
            </ul>
            <br>
            <div class="two-fields-product-container">
                <div>
                <br>
                    <div class="form-inner-checkbox">
                        <input type="checkbox" id="is_paid" name="is_paid" class="checkbox-customized" @checked(old('is_paid', 0))>
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
                    <input type="date" name="payment_date" id="payment_date" min="2023-04-01" autocomplete="off" value="{{ old('payment_date') }}">
                    @error('payment_date')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror 
                </div>
            </div>                     
                           
            <!--Комбобокс Коллекции товара-->           
            <!-- <label for="collection_id">Коллекция</label>
            <br>
            <select name="collection_id" id="collection_id" class="admin-combobox">
                <option @selected(Request::get('sort') =='date' || is_null(Request::get('sort'))) value="date">Новизне</option>
                <option @selected(Request::get('sort')=='jolly_maeh') value="jolly_maeh">Овечки Jolly Mäh</option>
                <option @selected(Request::get('sort')=='unicorn_theodor') value="unicorn_theodor">Единорог Theodor и его друзья</option>
                <option @selected(Request::get('sort')=='price-low') value="price-low">Уменьшению цены</option>
                <option @selected(Request::get('sort')=='price-high') value="price-high">Увеличению цены</option>                                
            </select> --> 

            <h3 class="file-upload-pairs-title">Состав заказа</h3>

            <label for="select2-product">Товар *</label>
            <select class="js-example-basic-single" id="select2-product">
                <option></option>

                <!-- <optgroup label="Овечки">    
                    <option value="AL">Мягкая игрушка Овечка Jolly Frances</option>                        
                    <option value="WY">Мягкая игрушка Овечка Jolly Rosa</option>
                </optgroup>
                <optgroup label="Единорог Theodor">
                    <option>Nested option</option>
                </optgroup> -->

                @foreach($products->groupBy('collection_id') as $collection=>$items)
                    <optgroup label="{{\App\Models\Collection::find($collection)->name}}">
                        @foreach($items as $product)
                            <option
                                data-price="{{$product->issetDiscount()? $product->getPriceWithDiscount() : $product->price}}"
                                data-articul="{{$product->article}}"
                                data-size="{{$product->size}}"
                                data-url="{{route('product.show',$product->id)}}"
                                data-picture="{{Storage::url($product->picture)}}"
                                value="{{$product->id}}">{{$product->title}}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>                  
                     
            <div class="center-button">
                <div class="">                                
                    <button type="button" class="add-orderitem-to-order-button" id="add-orderitem-to-order-button">
                        <div class="add-orderitem-to-order-icon"></div>
                        <span>Добавить товар</span>                                    
                    </button> 
                    <div></div>                           
                </div>                            
            </div>

           <!--  <div class="center-button">
                <div class="">                                
                    <button type="submit" class="admin-save-button" form="order-form">
                        <div class="admin-save-icon"></div>
                        <span>Сохранить</span>                                    
                    </button> 
                    <div></div>                           
                </div>                            
            </div> -->

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
            <p class="head-orderitem-actions">Действие</p>
        </div>
        <div class="account-rows">
            <!-- Строки таблицы-->
            
           <!--  <div class="account-card list">
                <div class="account-card-item orderitem-image-column orderitem">
                    <p class="card-mobile-text">Изображение</p>                    
                    <div class="account admin-table-img-container">
                        <img class="admin-table-img" src="{{Storage::url($product->picture)}}" alt=""> 
                    </div>
                </div>
                <div class="account-card-item orderitem-title-column orderitem">
                    <p class="card-mobile-text">Название</p>
                    <p class="account">{{$product->title}}</p>
                    <p class="account orderitem">Артикул: {{$product->article}}</p>
                    <p class="account orderitem">Размер: {{$product->size}} см</p>
                </div>               
                <div class="account-card-item orderitem-quantity-column orderitem">
                    <p class="card-mobile-text">Количество</p>
                    <p class="account">
                        <div class="admin-orderitem-quantity-controls">
                            <button class="admin-orderitem-minus-quantity" data-id="${id}">-</button>
                            <input type="number" form="order-form" value="1" class="admin-orderitem-quantity" data-id="${id}">
                            <button class="admin-orderitem-plus-quantity" data-id="${id}">+</button>                                
                        </div>
                    </p>
                </div>
                <div class="account-card-item orderitem-price-column orderitem">
                    <p class="card-mobile-text">Цена</p>
                    <p class="account">{{$product->price}} р.</p>
                </div>
                <div class="account-card-item orderitem-sum-column orderitem">
                    <p class="card-mobile-text">Сумма</p>
                    <p class="account">123.45 р.</p>
                </div>
                
                <div class="account-card-item orderitem-actions-column orderitem">
                    <p class="card-mobile-text">Действие</p>                        
                    <div class="account">
                        <div class="wrapper-icon">                           
                            <button class="admin-action-ahref orderitem" >
                                <div class="btn-delete"></div>
                            </button>                                                    
                        </div>                               
                    </div>
                </div>
            </div>
             -->
            
            <div class="account-card list orderitem-total"> <!--  list -->                
                <div class="account-card-item orderitem-total-title-column orderitem">
                    <p class="card-mobile-text"><!-- Название --></p>
                    <p class="account">Итого:</p>                    
                </div>               
                <div class="account-card-item orderitem-total-quantity-column orderitem">
                    <p class="card-mobile-text">Количество</p>
                    <p class="account"><span></span> шт.</p>
                </div>               
                <div class="account-card-item orderitem-total-sum-column orderitem">
                    <p class="card-mobile-text">Сумма</p>
                    <p class="account"><span></span> р.</p>
                </div>
                
                <div class="account-card-item orderitem-actions-column orderitem orderitem-total">
                    <p class="card-mobile-text"><!-- Действие --></p>                      
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

     <!-- <div class="form-wrapper"> -->
    <!--Форма логина--> 
    <!-- <form method="POST" action="{{ route('dashboard.order.store') }}" enctype="multipart/form-data" class="login-form-decor" id="order-form">        -->
    <!-- <div class="login-form-decor"> -->
        <!-- <div class="form-inner"> -->
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
    <!-- </div> -->
    <!-- </div> -->
  
@endsection
@section('custom_js')
<script src="{{ asset('js/jquery.min.js') }}" type='text/javascript'></script>
<script src="{{ asset('admin/js/dropdown-control.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('admin/js/file-upload.js') }}" type="text/javascript"></script> -->
<!-- <script src="{{ asset('admin/js/file-upload-pairs.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('admin/js/admin-alert-form.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/select2-with-search.js') }}" type="text/javascript"></script>
@endsection  