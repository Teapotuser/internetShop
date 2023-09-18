@extends('layouts.admin')
@section('custom_css')         
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-table.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-category.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-alert1.css') }}" type="text/css">
@endsection
@section('dashboard-content')
<div class="activity">
    <div class="title title-with-button">
        <!-- <i class="uil uil-clock-three"></i> -->
        <div class="title-left">
            <div class="title-rectangle-icon">
                <div class="title-category-icon"></div>
            </div>
            <span class="text">Категории</span>
        </div>    
        <a href="{{route('dashboard.category.create')}}" class="admin-add-button">
            <div class="title-add-icon"></div>
            <span>Добавить</span>
        </a>    
    </div>
<!-- Отображение сообщения что Категория новая или отредактированная добавлена -->
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
            <p class="head-category-id">Номер</p>
            <p class="head-category-title">Название</p>
            <p class="head-category-code">Код</p>
            <p class="head-category-image">Изображение</p>
            <p class="head-category-actions">Действие</p>
        </div>
        <div class="account-rows">
            <!-- Строки таблицы-->
            @foreach($categories as $category)
            <div class="account-card list"> <!--  list -->
                <div class="account-card-item category-id-column">
                    <p class="card-mobile-text">Номер</p>
                    <p class="account">{{$category->id}}</p>
                </div>
                <div class="account-card-item">
                    <p class="card-mobile-text">Название</p>
                    <p class="account">{{$category->name}}</p>
                </div>
                <div class="account-card-item">
                    <p class="card-mobile-text">Код</p>
                    <p class="account">{{$category->code}}</p>
                </div>
                <div class="account-card-item">
                    <p class="card-mobile-text">Изображение</p>
                    <!-- <p class="account">7675.89</p> -->
                    <div class="account admin-table-img-container">
                        @if($category->picture == null)
                            <div></div>
                        @else                            
                            <img class="admin-table-img" src="{{Storage::url($category->picture)}}" alt=""> 
                        @endif                           
                    </div>
                </div>
                <div class="account-card-item">
                    <p class="card-mobile-text">Действие</p>                            
                    <!-- <p class="account">HJGHG7</p> -->
                    <div class="account">
                        <div class="wrapper-icon">
                            <a href="{{route('dashboard.category.show', $category)}}" class="admin-action-ahref"><div class="btn-view"></div></a>
                            <a href="{{route('dashboard.category.edit', $category)}}" class="admin-action-ahref"><div class="btn-edit"></div></a>
                            <!-- link that opens popup -->
                            <!-- <a class="popup-with-delete-form admin-action-ahref" href="#delete-form"><div class="btn-delete"></div></a> -->
                            <a class="popup-with-delete-form admin-action-ahref" href="#delete-form" data-action="{{route('dashboard.category.destroy', $category)}}" data-products="{{$category->products()->count()}}">
                                <div class="btn-delete"></div>
                            </a>
                            <!-- <div class="main-cart-remove admin-action-ahref">
                                <form action="{{route('dashboard.category.destroy', $category)}}" method="post" class="admin-form-delete">
                                @csrf
                                @method('DELETE') -->
                                <!-- Чтобы отобразился comfirm message -->
                            <!--  <button class="btn-delete" onclick="
                                    if(!confirm('Действительно удалить')){ event.preventDefault()}">
                                </button>
                                </form>                                
                            </div>    -->  
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
            <p>Вы действительно хотите удалить Категорию?<p>
            <!-- <p class="delete-form-products-message" style="display: none">Удалить категорию нельзя! К категории
                    привязано товаров: <span class="delete-form-products-count"></span>
            </p>-->
			<div class="delete-form-products-message" style="display: none">
				<p>Удалить Категорию нельзя!</p>
				<p>К Категории привязано товаров: <span class="delete-form-products-count"></span></p>            
			</div>
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