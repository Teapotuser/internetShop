@extends('layouts.admin')
@section('custom_css')         
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-table.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-order.css') }}" type="text/css">
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
                <div class="title-order-icon"></div>
            </div>
            <span class="text">Заказы</span>
        </div>    
        <a href="{{route('dashboard.order.create')}}" class="admin-add-button">
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
            <p class="head-order-id">Номер</p>
            <p class="head-order-title">Имя</p>
            <!-- <p class="head-user-email">E-mail</p> -->
            <p class="head-order-creationdate">Создан</p>
            <p class="head-order-sum">Сумма</p>
            <p class="head-order-payment">Оплата</p>
            <p class="head-order-status">Статус</p>
            <p class="head-order-actions">Действие</p>
        </div>
        <div class="account-rows">
            <!-- Строки таблицы-->
            @foreach($orders as $order)
            <div class="account-card list"> <!--  list -->
                <div class="account-card-item order-id-column">
                    <p class="card-mobile-text">Номер</p>
                    <p class="account">{{$order->id}}</p>
                </div>
                <div class="account-card-item order-title-column">
                    <p class="card-mobile-text">Имя</p>
                    <p class="account">{{$order->getUserFIO()}}</p>
                </div>
                <!-- <div class="account-card-item user-email-column">
                    <p class="card-mobile-text">E-mail</p>
                    <p class="account">{{$order->email}}</p>
                </div> -->
                <div class="account-card-item order-creationdate-column">
                    <p class="card-mobile-text">Создан</p>
                    <p class="account">{{$order->created_at->format('d-m-Y')}}</p>
                </div>
                <div class="account-card-item order-sum-column">
                    <p class="card-mobile-text">Сумма</p>
                    <p class="account">{{$order->orderPrice()}} р.</p>
                </div>  
                <div class="account-card-item order-payment-column">
                    <p class="card-mobile-text">Оплата</p>
                    <p class="account">
                        @if($order->is_paid)
                            Да
                        @else
                            Нет
                        @endif</p>
                </div>          
                <div class="account-card-item order-status-column">
                    <p class="card-mobile-text">Статус</p>
                    <p class="account">
                        {{$order->getStatusTitle()}}
                    </p>                    
                </div>                
                <div class="account-card-item order-actions-column">
                    <p class="card-mobile-text">Действие</p>                            
                    <!-- <p class="account">HJGHG7</p> -->
                    <div class="account">
                        <div class="wrapper-icon">
                            <a href="{{route('dashboard.order.show', $order)}}" class="admin-action-ahref"><div class="btn-view"></div></a>
                            <a href="{{route('dashboard.order.edit', $order)}}" class="admin-action-ahref"><div class="btn-edit"></div></a>
                            <a class="popup-with-delete-form admin-action-ahref" href="#delete-form" data-action="{{route('dashboard.order.destroy', $order)}}">
                                <div class="btn-delete"></div>
                            </a>
                            <!-- link that opens popup -->
                            <!-- <a class="popup-with-delete-form admin-action-ahref" href="#delete-form"><div class="btn-delete"></div></a> -->
                        </div>                               
                    </div>
                </div>
            </div>
            @endforeach           
        </div>        
    </div>

    <!-- Popup удаления заказа -->
    <div id="delete-form" class="mfp-hide white-popup-block">
        <form method="post" class="admin-form-delete">
            @csrf
            @method('DELETE')    
            <p>Вы действительно хотите удалить Заказ?<p>
            <br>            
            <div class="confirm-delete-buttons-container">
                <a href="#" class="admin-delete-cancel-button popup-modal-dismiss">
                    <div class="admin-delete-cancel-icon"></div>
                    <span>Отмена</span>
                </a>                 
                <button type="submit" class="admin-delete-yes-button">
                    <div class="admin-delete-yes-icon"></div>
                    <span>Удалить</span>                                    
                </button>
            </div> 
        </form> 
    </div>

    <!--Пагинация списка товаров (по 6 товаров на странице) -->
    {{ $orders->withQueryString()->links('admin.pagination') }}
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