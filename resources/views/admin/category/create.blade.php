@extends('layouts.admin')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('admin/css/admin-form.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-alert1.css') }}" type="text/css">
@endsection    
@section('dashboard-content')
<div class="overview">
    <div class="title title-with-button">
        <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
        <div class="title-left">
            <div class="title-rectangle-icon">
                <div class="title-add-icon"></div>
            </div>
            <span class="text">Добавление новой категории</span>  
        </div> 
        <a href="{{route('dashboard.category.index')}}" class="admin-back-button">
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
<!-- Форма добавления Категории -->
<div class="form-wrapper"> 
    <!--Форма логина--> 
    <form method="POST" action="{{ route('dashboard.category.store') }}" enctype="multipart/form-data" class="login-form-decor">
        @csrf
        <div class="form-inner">
            <label for="code">Код *</label>
            <input type="text" name="code" id="code" minLength="1" maxLength="150" required autocomplete="off" value="{{ old('code') }}">
            @error('code')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="name">Название *</label>
            <input type="text" name="name" id="name" minLength="1" maxLength="200" required autocomplete="off" value="{{ old('name') }}">
            @error('name')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="description">Описание</label>
            <br>
            <textarea name="description" id="description" cols="40" rows="3" maxLength="1000" autocomplete="off">{{ old('description') }}</textarea>
            @error('description')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <!-- <label for="pcture">Изображение:</label>
            <br><br>
            <input type="file" accept="image/*" name="picture">
            <br> -->
            <!-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus placeholder="Имя *"> value="{{ old('name') }}" -->
            <!-- <br> -->

            <!-- <img src="http://placehold.it/180" id="blah" alt="Img"><br><br>
            <input type="file" id="inputFile" onchange="readUrl(this)">
            <button type="button" onclick="removeImg()">Close</button> -->
            <!-- <br> -->
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
            <br>
            <div class="form-inner-checkbox">
                <input type="checkbox" id="create-account" name="create-account">
                <label for="create-account">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                    </svg>
                    Активна
                </label>                                       
            </div>  

           <!--  <div class="center-button">
                <div class="">
                    <button type="submit" class="img_block__button">
                        Сохранить
                    </button> -->
                    <!-- Кнопка Close для View формы категории -->
                    <!-- <a href="{{route('dashboard.category.index')}}"></a>                
                </div>
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
<script src="{{ asset('admin/js/file-upload-pairs.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/admin-alert-form.js') }}" type="text/javascript"></script>
@endsection  