@extends('layouts.admin')
@section('custom_css')         
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-table.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-user.css') }}" type="text/css">
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
                <div class="title-user-icon"></div>
            </div>
            <span class="text">Пользователи</span>
        </div>    
        <a href="{{route('dashboard.user.create')}}" class="admin-add-button">
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
            <p class="head-user-id">Номер</p>
            <p class="head-user-title">Имя</p>
            <p class="head-user-email">E-mail</p>
            <p class="head-user-role">Роль</p>
            <p class="head-user-actions">Действие</p>
        </div>
        <div class="account-rows">
            <!-- Строки таблицы-->
            @foreach($users as $user)
            <div class="account-card list"> <!--  list -->
                <div class="account-card-item user-id-column">
                    <p class="card-mobile-text">Номер</p>
                    <p class="account">{{$user->id}}</p>
                </div>
                <div class="account-card-item user-title-column">
                    <p class="card-mobile-text">Имя</p>
                    <p class="account">{{$user->name}}<span> </span>{{$user->last_name}}</p>
                </div>
                <div class="account-card-item user-email-column">
                    <p class="card-mobile-text">E-mail</p>
                    <p class="account">{{$user->email}}</p>
                </div>
                <div class="account-card-item user-role-column">
                    <p class="card-mobile-text">Роль</p>
                    <p class="account">
                        @if ( $user->role) 
                        <span>Админ</span> 
                        @else 
                        <span>Пользователь</span> 
                        @endif
                    </p>                    
                </div>                
                <div class="account-card-item user-actions-column">
                    <p class="card-mobile-text">Действие</p>                            
                    <!-- <p class="account">HJGHG7</p> -->
                    <div class="account">
                        <div class="wrapper-icon">
                            <a href="{{route('dashboard.user.show', $user)}}" class="admin-action-ahref"><div class="btn-view"></div></a>
                            <a href="{{route('dashboard.user.edit', $user)}}" class="admin-action-ahref"><div class="btn-edit"></div></a>
                            <a href="{{route('dashboard.user.edit', $user)}}" class="admin-action-ahref"><div class="btn-password"></div></a>
                            <!-- link that opens popup -->
                            <!-- <a class="popup-with-delete-form admin-action-ahref" href="#delete-form"><div class="btn-delete"></div></a> -->
                            <!-- <a class="popup-with-delete-form admin-action-ahref" href="#delete-form" data-action="{{route('dashboard.user.destroy', $user)}}">
                                <div class="btn-delete"></div>
                            </a>  -->                           
                        </div>                               
                    </div>
                </div>
            </div>
            @endforeach           
        </div>        
    </div>

    <!-- Popup удаления пользователя -->
    <!-- <div id="delete-form" class="mfp-hide white-popup-block">
        <form method="post" class="admin-form-delete">
            @csrf
            @method('DELETE')    
            <p>Вы действительно хотите удалить Пользователя?<p>
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
    </div> -->

    <!--Пагинация списка товаров (по 6 товаров на странице) -->
    {{ $users->withQueryString()->links('admin.pagination') }}
    <!-- <div class="activity-data">        
    </div> -->
</div>
@endsection
@section('custom_js')
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script> -->
<!-- <script src="{{ asset('admin/js/admin-popup.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('admin/js/admin-alert.js') }}" type="text/javascript"></script>
@endsection  