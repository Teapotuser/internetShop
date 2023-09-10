@extends('layouts.admin')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('admin/css/admin-form.css') }}" type="text/css">
    <!-- <link rel="stylesheet" href="{{ asset('admin/css/dropdown-control.css') }}" type="text/css"> -->
    <link rel="stylesheet" href="{{ asset('admin/css/admin-alert1.css') }}" type="text/css">
@endsection    
@section('dashboard-content')
<div class="overview">
    <div class="title title-with-button">
        <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
        <div class="title-left">
            <div class="title-rectangle-icon">
                <div class="title-password-icon"></div>
            </div>
            <span class="text">Изменение пароля пользователя</span>  
        </div> 
        <a href="{{route('dashboard.user.index')}}" class="admin-back-button">
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
    <form method="POST" action="{{ route('dashboard.user.store') }}" enctype="multipart/form-data" class="login-form-decor">
        @csrf
        <div class="form-inner">           
            <div class="form-inner-checkbox">
                <input type="checkbox" id="is_generate_password" name="is_generate_password" class="checkbox-customized">
                <label for="is_generate_password">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                    </svg>
                    Изменить пароль пользователя
                </label>                                       
            </div>              
            <br>           

            <label for="password">Текущий пароль *</label>
            <input type="password" id="password" name="current_password" class="form-control @error('password') is-invalid @enderror" minLength="1" maxLength="150" required autocomplete="off" value="{{ old('current_password') }}">
            @error('current_password')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <!-- @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror -->  
            <label for="password">Новый пароль *</label>
            <input type="password" id="password" name="password" class="form-control @error('password'||'password_confirmation') is-invalid @enderror" minLength="1" maxLength="150" required autocomplete="off" value="{{ old('password') }}">
            @error('password'||'password_confirmation')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <!-- @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --> 
            <label for="password-confirm">Повторите пароль *</label>
            <input type="password" id="password-confirm" name="password_confirmation" class="form-control @error('password_confirmation'||'password') is-invalid @enderror" minLength="1" maxLength="150" required autocomplete="off" value="{{ old('password-confirmation') }}">
            @error('password_confirmation'||'password')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <!-- @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror -->             

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
<!-- <script src="{{ asset('admin/js/dropdown-control.js') }}" type="text/javascript"></script> -->
<!-- <script src="{{ asset('admin/js/file-upload.js') }}" type="text/javascript"></script> -->
<!-- <script src="{{ asset('admin/js/file-upload-pairs.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('admin/js/admin-alert-form.js') }}" type="text/javascript"></script>
@endsection  