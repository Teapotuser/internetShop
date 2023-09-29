@extends('layouts.admin')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('admin/css/admin-form.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/dropdown-control.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-alert1.css') }}" type="text/css">
@endsection    
@section('dashboard-content')
<div class="overview">
<div class="title title-with-button">
        <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
        <div class="title-left">
            <div class="title-rectangle-icon">
                <div class="title-edit-icon"></div>
            </div>
            <span class="text">Редактирование пользователя</span>  
        </div> 
        <a href="{{route('dashboard.user.index')}}" class="admin-back-button">
            <div class="title-back-icon"></div>
            <span>Назад</span>
        </a> 
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
<!-- Форма редактирования Категории -->
<div class="form-wrapper"> 
    <!--Форма логина--> 
    <form method="POST" action="{{ route('dashboard.user.update', $user) }}" enctype="multipart/form-data" class="login-form-decor">
        @csrf
        @method('put')
        <div class="form-inner">
            <label for="name">Имя *</label>
            <input type="text" name="name" id="name" minLength="1" maxLength="150" required autocomplete="off" value="{{old('name', $user->name)}}">
            @error('name')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="last_name">Фамилия *</label>
            <input type="text" name="last_name" id="last_name" minLength="1" maxLength="200" required autocomplete="off" value="{{old('last_name', $user->last_name)}}">
            @error('last_name')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="email">E-mail *</label>
            <input type="email" name="email" id="email" minLength="1" maxLength="150" required autocomplete="off" value="{{old('email', $user->email)}}">
            @error('email')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="phone_number">Телефон *</label>
            <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone_number" id="phone_number" minLength="1" maxLength="20" required autocomplete="off" value="{{old('phone_number', $user->phone_number)}}">
            @error('phone_number')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror 

            <p class="label">Изображение</p>
            <div class="file-upload-container">
                <figure class="file-upload-preview-image-container">
                    <img id="chosen-image" class="chosen-image" src="{{ $user->picture ? : asset('/admin/images/Untitled.png')}}">
                    <figcaption id="file-name" class="file-name"></figcaption>
                </figure>
        
                <input type="file" id="upload-button" class="upload-button" accept="image/*" name="picture">
                <label for="upload-button" class="upload-file-label">                    
                    <div class="file-upload-icon"></div>
                    <span>Загрузить файл</span>
                </label>
                <input type="hidden" name="removeImage">
                <button type="button" id="clear-file-button" class="clear-file-button @if(!$user->picture) hidden @endif "></button>
            </div>
            <br>

            <label for="address">Адрес</label>
            <input type="text" name="address" id="address" minLength="1" maxLength="500" autocomplete="off" value="{{old('address', $user->address)}}">
            @error('address')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <div class="two-fields-product-container">
                <div>
                    <label for="city">Город</label>
                    <input type="text" name="city" id="city" minLength="1" maxLength="200" autocomplete="off" value="{{old('city', $user->city)}}">
                    @error('city')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="zip_code">Индекс</label>
                    <input type="text" name="zip_code" id="zip_code" minLength="1" maxLength="20" autocomplete="off" value="{{old('zip_code', $user->zip_code)}}">
                    @error('zip_code')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Комбобокс Роль --> 
            <label for="role">Роль *</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button enabled">
                        <div class="dropdown__button-text enabled"> 
                            @if ( $user->role == 'admin') 
                                Админ 
                            @elseif($user->role == 'user') 
                                Пользователь 
                            @endif
                        </div>
                    </button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="user" >Пользователь</li>
                        <li class="dropdown__list-item" data-value="admin" >Админ</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->                        
                    </ul>
                    <input type="hidden" name="role" id="role" value="{{ old('role', $user->role ) }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Роль-->                       
            
            <!-- <div class="form-inner-checkbox">
                <input type="checkbox" id="create-account" name="create-account">
                <label for="create-account">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                    </svg>
                    Активный
                </label>                                       
            </div> -->
            <div class="center-button">
                <div class="">                                
                    <button type="submit" class="admin-save-button">
                        <div class="admin-save-icon"></div>
                        <span>Сохранить</span>                                    
                    </button> 
                    <div></div>                           
                </div>                            
            </div>
            
        </div>
    </form> 
</div>
@endsection
@section('custom_js')
<script src="{{ asset('admin/js/dropdown-control.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/file-upload-pairs.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/admin-alert-form.js') }}" type="text/javascript"></script>
@endsection  