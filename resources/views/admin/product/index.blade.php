@extends('layouts.admin')
@section('custom_css')         
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-table.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-product.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-pagination.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-alert1.css') }}" type="text/css">
@endsection
@section('dashboard-content')
<div class="activity">
    <div class="title title-with-button">
        <!-- <i class="uil uil-clock-three"></i> -->
        <div class="title-left">
            <div class="title-rectangle-icon">
                <div class="title-product-icon"></div>
            </div>
            <span class="text">Товары</span>
        </div>    
        <a href="{{route('dashboard.product.create')}}" class="admin-add-button">
            <div class="title-add-icon"></div>
            <span>Добавить</span>
        </a>    
    </div>
<!-- Отображение сообщения что Коллекция новая или отредактированная добавлена -->
    <!-- <div class="alert-container"> -->
        @if(session()->has('success'))
        <div class="alert-container">
            <div class="alert alert-success showAlert show">
                <div class="alert-success-icon"></div>
                <div class="alert-msg-container">
                    <div class="msg">{{ session()->get('success') }}</div>
                </div>    
                <div class="close-btn">
                    <button type="button" id="close-alert-button"></button>
                </div>            
            </div>  
        </div>      
        @endif
    <!-- </div> -->

    <!-- <div class="alert-container">
        <div class="alert alert-success showAlert show">
            <div class="alert-success-icon"></div>
            <div class="msg">Warning: This is a warning alert!</div>
            <div class="close-btn">
                <button type="button" id="close-alert-button"></button>
            </div>            
        </div>
    </div> -->
    <!-- Таблица с данными Вадим-->
    <!-- Строка заголовков таблицы-->
    <div class="accounts-list">
        <div class="accounts-head">
            <p class="head-product-id">Номер</p>
            <p class="head-product-title">Название</p>
            <p class="head-product-article">Артикул</p>
            <p class="head-product-price">Цена</p>
            <p class="head-product-image">Изображение</p>
            <p class="head-product-actions">Действие</p>
        </div>
        <div class="account-rows">
            <!-- Строки таблицы-->
            @foreach($products as $product)
            <div class="account-card list"> <!--  list -->
                <div class="account-card-item product-id-column">
                    <p class="card-mobile-text">Номер</p>
                    <p class="account">{{$product->id}}</p>
                </div>
                <div class="account-card-item product-title-column">
                    <p class="card-mobile-text">Название</p>
                    <p class="account">{{$product->title}}</p>
                </div>
                <div class="account-card-item product-article-column">
                    <p class="card-mobile-text">Артикул</p>
                    <p class="account">{{$product->article}}</p>
                </div>
                <div class="account-card-item product-price-column">
                    <p class="card-mobile-text">Цена</p>
                    <p class="account">{{$product->price}}</p>
                </div>
                <div class="account-card-item product-image-column">
                    <p class="card-mobile-text">Изображение</p>
                    <!-- <p class="account">7675.89</p> -->
                    <div class="account admin-table-img-container">
                        @if($product->picture == null)
                            <div></div>
                        @else                            
                            <img class="admin-table-img" src="{{Storage::url($product->picture)}}" alt=""> 
                        @endif                        
                    </div>
                </div>
                <div class="account-card-item product-actions-column">
                    <p class="card-mobile-text">Действие</p>                            
                    <!-- <p class="account">HJGHG7</p> -->
                    <div class="account">
                        <div class="wrapper-icon">
                            <a href="{{route('dashboard.product.show', $product)}}" class="admin-action-ahref"><div class="btn-view"></div></a>
                            <a href="{{route('dashboard.product.edit', $product)}}" class="admin-action-ahref"><div class="btn-edit"></div></a>
                            <!-- link that opens popup -->
                            <!-- <a class="popup-with-delete-form admin-action-ahref" href="#delete-form"><div class="btn-delete"></div></a> -->
                            <a class="popup-with-delete-form admin-action-ahref" href="#delete-form" data-action="{{route('dashboard.product.destroy', $product)}}">
                                <div class="btn-delete"></div>
                            </a>                            
                        </div>                               
                    </div>
                </div>
            </div>
            @endforeach           
        </div>        
    </div>

    <!-- Popup удаления категории -->
    <div id="delete-form" class="mfp-hide white-popup-block">
        <form method="post" class="admin-form-delete">
            @csrf
            @method('DELETE')    
            <p>Вы действительно хотите удалить Товар?<p>
            <br>
            <!-- <p><a class="popup-modal-dismiss" href="#">Нет</a></p> -->
            <!-- <button class="btn-delete" data-id="${id}"></button> -->
            <div class="confirm-delete-buttons-container">
                <a href="#" class="admin-delete-cancel-button popup-modal-dismiss">
                    <div class="admin-delete-cancel-icon"></div>
                    <span>Отмена</span>
                </a> 
                <!-- <button class="admin-delete-cancel-button">
                    <div class="admin-delete-cancel-icon"></div>
                    <span>Отменить</span>                                    
                </button>  -->
                <button type="submit" class="admin-delete-yes-button">
                    <div class="admin-delete-yes-icon"></div>
                    <span>Удалить</span>                                    
                </button>
            </div> 
        </form> 
    </div>

    <!--Пагинация списка товаров (по 6 товаров на странице) -->
    {{ $products->withQueryString()->links('admin.pagination') }}
    <!-- <div class="activity-data">        
    </div> -->
</div>
@endsection
@section('custom_js')
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/admin-popup.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/admin-alert.js') }}" type="text/javascript"></script>
@endsection  