@extends('layouts.admin')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-index.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-table.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-order.css') }}" type="text/css">
    @endsection  
@section('dashboard-content')
<div class="overview">
                <div class="title">
                    <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
                    <div class="title-rectangle-icon">
                        <div class="dasboard-icon"></div>
                    </div>
                    <span class="text">Аналитика</span>
                </div>

                <div class="boxes">
                    <a href="{{route('dashboard.order.index')}}" class="box box1">
                        <div class="box-text">
                            <!-- <i class="uil uil-thumbs-up"></i> -->
                            <span class="text">Всего заказов</span>
                            <span class="number">{{ $orders_count }}</span>
                        </div>
                        <!-- <div class="box-icon-container"> -->
                            <div class="box-icon"></div>
                        <!-- </div> -->
                    </a>
                    <a href="{{route('dashboard.product.index')}}" class="box box2">
                        <div class="box-text">
                            <!-- <i class="uil uil-comments"></i> -->
                            <span class="text">Всего товаров</span>
                            <span class="number">{{ $products_count }}</span>
                        </div>
                        <div class="box-icon"></div>
                    </a>
                    <a href="{{route('dashboard.collection.index')}}" class="box box3">
                        <div class="box-text">
                            <!-- <i class="uil uil-share"></i> -->
                            <span class="text">Всего коллекций</span>
                            <span class="number">{{ $collections_count }}</span>
                        </div>
                        <div class="box-icon"></div>
                    </a>
                </div>
            </div>

            <div class="activity">
                <!-- <div class="title">                   
                    <div class="title-rectangle-icon">
                        <div class="recent-icon"></div>
                    </div>
                    <span class="text">Последние заказы</span>
                </div> -->

                <div class="title title-with-button">
                    <!-- <i class="uil uil-clock-three"></i> -->
                    <div class="title-left">
                        <div class="title-rectangle-icon">
                            <div class="recent-icon"></div>
                        </div>
                        <span class="text">Недавние заказы</span>
                    </div>    
                    <a href="{{route('dashboard.order.index')}}" class="admin-add-button">
                        <div class="title-go-to-orders-icon"></div>
                        <span>Заказы</span>
                    </a>    
                </div>

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
                    <p class="account">{{$order->name}}  {{$order->last_name}}</p>
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
                    <p class="account order-status--{{$order->getStatusClass()}} dark-mode-dark-text">
                        {{$order->getStatusTitle()}}
                    </p>                    
                </div>                
                <div class="account-card-item order-actions-column">
                    <p class="card-mobile-text">Действие</p>                            
                    <!-- <p class="account">HJGHG7</p> -->
                    <div class="account">
                        <div class="wrapper-icon">
                            <a href="{{route('dashboard.order.show', $order)}}" class="admin-action-ahref"><div class="btn-view"></div></a>
                            <!-- <a href="{{route('dashboard.order.edit', $order)}}" class="admin-action-ahref"><div class="btn-edit"></div></a>
                            <a class="popup-with-delete-form admin-action-ahref" href="#delete-form" data-action="{{route('dashboard.order.destroy', $order)}}">
                                <div class="btn-delete"></div>
                            </a> -->
                            <!-- link that opens popup -->
                            <!-- <a class="popup-with-delete-form admin-action-ahref" href="#delete-form"><div class="btn-delete"></div></a> -->
                        </div>                               
                    </div>
                </div>
            </div>
            @endforeach           
        </div>        
    </div>

                <!-- <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <span class="data-list">Prem Shahi</span>
                        <span class="data-list">Deepa Chand</span>                                                
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <span class="data-list">premshahi@gmail.com</span>
                        <span class="data-list">deepachand@gmail.com</span>                                                
                    </div>
                    <div class="data joined">
                        <span class="data-title">Joined</span>
                        <span class="data-list">2022-02-12</span>
                        <span class="data-list">2022-02-12</span>                                                
                    </div>
                    <div class="data type">
                        <span class="data-title">Type</span>
                        <span class="data-list">New</span>
                        <span class="data-list">Member</span>                                        
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>                                              
                    </div>
                </div> -->
            </div>
@endsection