@extends('layouts.admin')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('admin/css/admin-form.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-alert1.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-table.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-subscription.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
@endsection    
@section('dashboard-content')
<div class="overview">
    <div class="title title-with-button">
        <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
        <div class="title-left">
            <div class="title-rectangle-icon">
                <div class="title-subscription-icon"></div>
            </div>
            <span class="text">Управление рассылками</span>  
        </div> 
       <!--  <a href="{{route('dashboard.category.index')}}" class="admin-back-button">
            <div class="title-back-icon"></div>
            <span>Назад</span>
        </a>  -->
    </div>                
</div>
<!-- отображение сообщения, что при сохранении Категории возникли ошибки -->
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
@if(session()->has('success'))
    <div class="alert-container">
        <div class="alert alert-success show showAlert">
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
@if($subscriptions->count())
<!-- Форма добавления Категории -->
<div class="form-wrapper"> 
    <!--Форма логина--> 
    <form method="POST" action="{{ route('dashboard.subscription.send') }}" enctype="multipart/form-data" id="sendSubscription" class="login-form-decor subscription">
        @method('POST')    
        @csrf        
        <div class="form-inner subscription">  
            <h3 class="file-upload-pairs-title">Создание рассылки</h3>
            @if(\App\Models\Subscription::query()->where('is_active','=',1)->count())        
                <label for="name">Тема письма *</label>
                <input type="text" name="name" id="name" minLength="1" maxLength="200" required autocomplete="off" value="{{ old('name') }}">
                @error('name')
                    <div class="form-field-validation-error">{{ $message }}</div>
                @enderror
                <label for="description">Текст письма *</label>
                <br>
                <textarea name="description" id="description" cols="40" rows="3" maxLength="1000" required autocomplete="off">{{ old('description') }}</textarea>
                @error('description')
                    <div class="form-field-validation-error">{{ $message }}</div>
                @enderror            
                <p class="label">Изображение</p>
                <div class="file-upload-container">
                    <figure class="file-upload-preview-image-container">
                        <img id="chosen-image" class="chosen-image" src="{{ asset('/admin/images/Untitled.png')}}">
                        <figcaption id="file-name" class="file-name"></figcaption>
                    </figure>
            
                    <input type="file" id="upload-button" class="upload-button" accept="image/*" name="picture">
                    <label for="upload-button" class="upload-file-label">
                        <!-- <i class="fas fa-upload"></i> &nbsp; Choose A Photo -->
                        <div class="file-upload-icon"></div>
                        <span>Загрузить файл</span>
                    </label>
                    <button type="button" id="clear-file-button" class="clear-file-button hidden"></button>                            
                </div>           
           
                <div class="center-button">
                    <div class="">                                
                        <button type="submit" class="admin-save-button">
                            <div class="admin-send-mail-icon"></div>
                            <span>Отправить</span>                                    
                        </button> 
                        <div></div>                           
                    </div>                            
                </div>
            @else
                <p style="color: red">Активные подписки отсутствуют, создать рассылку невозможно</p>
            @endif
        </div>
    </form> 
</div>

<!-- Форма добавления Категории -->
<div class="form-wrapper"> 
    <!--Форма логина--> 
    {{--    <form method="POST" action="{{ route('dashboard.category.store') }}" enctype="multipart/form-data" class="login-form-decor subscription" id="subscriptions-list"> --}}
    {{--       @csrf       --}} 
        <div class="form-inner subscription">  
            <h3 class="file-upload-pairs-title">Редактирование списка рассылки</h3>
        </div>
    {{--       </form> --}}
</div>

 <!-- Таблица с данными Вадим-->
    <!-- Строка заголовков таблицы-->
    <div class="accounts-list">
        <div class="accounts-head orderitem">
            <p class="head-subscription-id">Номер</p>            
            <p class="head-subscription-email">E-mail</p>            
            <p class="head-subscription-status">Статус</p>                    
            <p class="head-subscription-actions">Действие</p>
        </div>
        <div class="account-rows">
            <form
                id="subscriptions-list"
                method="POST"
                action="{{route('dashboard.subscription.bulk-update')}}">
                @method('POST')
                @csrf
                <!-- Строки таблицы-->
                @foreach($subscriptions as $subscription)
            
                <div class="account-card list">
                        <div class="account-card-item subscription-id-column orderitem">
                            <p class="card-mobile-text">Номер</p>                    
                            <p class="account">{{$subscription->id}}</p>
                            <!-- <input type="hidden" form="subscriptions-list" value="email-id"> -->
                        </div>
                        <div class="account-card-item subscription-email-column orderitem">
                            <p class="card-mobile-text">E-mail</p>
                            <p class="account">{{$subscription->email}}</p>                                        
                        </div>               
                        <div class="account-card-item subscription-status-column orderitem">
                            <p class="card-mobile-text">Статус</p>
                            <p class="account">
                                <div class="toggle-checkbox-control">
                                    <label for="is_subscribe[{{$subscription->id}}]" class="checkbox">
                                        <input type="hidden" class="realValue" name="is_subscribe[{{$subscription->id}}]">
                                        <input type="checkbox" class="checkbox__inp" id="is_subscribe[{{$subscription->id}}]"
                                            name="is_subscribe[{{$subscription->id}}]" form="subscriptions-list" onchange="this.previousSibling.value=1-this.previousSibling.value"
                                                @checked($subscription->is_active)>
                                        <span class="checkbox__inner"></span>
                                    </label>                      
                                </div>
                            </p>
                        </div>                            
                        <div class="account-card-item subscription-actions-column orderitem">
                            <p class="card-mobile-text">Действие</p>                        
                            <div class="account">
                                <div class="wrapper-icon">                           
                                <!--  <button class="admin-action-ahref orderitem" >
                                        <div class="btn-delete"></div>
                                    </button>  -->
                                    <a class="popup-with-delete-form admin-action-ahref" href="#delete-form" data-action="{{route('dashboard.subscription.destroy', $subscription->id)}}">
                                        <div class="btn-delete"></div>
                                    </a>                                                     
                                </div>                               
                            </div>
                        </div>
                    </div>
                @endforeach
            </form>

           <!--  <div class="account-card list">
                <div class="account-card-item subscription-id-column orderitem">
                    <p class="card-mobile-text">Номер</p>                    
                    <p class="account">1</p>
                    <input type="hidden" form="subscriptions-list" value="email-id">
                </div>
                <div class="account-card-item subscription-email-column orderitem">
                    <p class="card-mobile-text">E-mail</p>
                    <p class="account">e-mail-email@gmail.com</p>                                         
                </div>               
                <div class="account-card-item subscription-status-column orderitem">
                    <p class="card-mobile-text">Статус</p>
                    <p class="account">
                        <div class="toggle-checkbox-control">
                            <label for="is_subscribe2" class="checkbox">
                                <input type="checkbox" class="checkbox__inp" id="is_subscribe2"
                                    name="is_subscribe" form="subscriptions-list">
                                <span class="checkbox__inner"></span>
                            </label>                      
                        </div>
                    </p>
                </div>                            
                <div class="account-card-item subscription-actions-column orderitem">
                    <p class="card-mobile-text">Действие</p>                        
                    <div class="account">
                        <div class="wrapper-icon">                          
                            <a class="popup-with-delete-form admin-action-ahref" href="#delete-form" data-action="{{route('dashboard.product.destroy', 1)}}">
                                <div class="btn-delete"></div>
                            </a>                                                    
                        </div>                               
                    </div>
                </div>
            </div> -->
        </div>        
    </div>

    <!-- Popup удаления категории -->
    <div id="delete-form" class="mfp-hide white-popup-block">
        <form method="post" class="admin-form-delete">
            @csrf
            @method('DELETE') 
            <br>   
            <p>Вы действительно хотите удалить e-mail из списка рассылки?<p>
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
     <!-- <div class="form-wrapper"> -->
    <!--Форма логина--> 
    <!-- <form method="POST" action="{{ route('dashboard.order.store') }}" enctype="multipart/form-data" class="login-form-decor" id="order-form">        -->
    <!-- <div class="login-form-decor"> -->
        <!-- <div class="form-inner"> -->
        <div class="admin-save-button-wrapper">
            <div class="center-button">
                <div class="">                                
                    <button type="submit" class="admin-save-button" form="subscriptions-list">
                        <div class="admin-save-icon"></div>
                        <span>Сохранить</span>                                    
                    </button> 
                    <div></div>                           
                </div>                            
            </div> 
        </div>  
    
    @else
        <p style="color:red">Подписки отсутствуют</p>
    @endif

@endsection
@section('custom_js')
<script src="{{ asset('admin/js/file-upload-pairs.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/admin-alert-form.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/admin-popup.js') }}" type="text/javascript"></script>
@endsection  