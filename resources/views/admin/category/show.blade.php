@extends('layouts.admin')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('admin/css/admin-form.css') }}" type="text/css">
@endsection    
@section('dashboard-content')
<div class="overview">
    <div class="title title-with-button">
        <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
        <div class="title-left">
            <div class="title-rectangle-icon">
                <div class="title-view-icon"></div>
            </div>
            <span class="text">Просмотр категории</span>  
        </div> 
        <a href="{{route('dashboard.category.index')}}" class="admin-back-button">
            <div class="title-back-icon"></div>
            <span>Назад</span>
        </a> 
    </div>                 
</div>
<!-- отображение сообщения, что Категория успешно добавлена -->
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br/>
@endif
<!-- Форма просмотра Категории -->
<div class="form-wrapper"> 
    <!--Форма логина--> 
    <form method="POST" action="{{ route('dashboard.category.store') }}" enctype="multipart/form-data" class="login-form-decor">
        @csrf
        <div class="form-inner">
            <label for="code">Код *</label>
            <input type="text" name="code" id="code" minLength="1" maxLength="150" required value="{{ $category->code }}" disabled>
            @error('code') {{$message}} @enderror
            <label for="name">Название *</label>
            <input type="text" name="name" id="name" minLength="1" maxLength="200" required value="{{  $category->name }}" disabled>
            @error('name') {{$message}} @enderror
            <label for="description">Описание</label>
            <br>
            <textarea name="description" id="description" cols="40" rows="3" maxLength="1000" disabled>{{  $category->description }}</textarea>
            @error('description') {{$message}} @enderror
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
                    <img id="chosen-image" class="chosen-image" src="{{ $category->picture ? Storage::url($category->picture) : asset('/admin/images/Untitled.png')}}">
                    <!-- <figcaption id="file-name">{{ $category->picture }}</figcaption> -->
                </figure>
        
               <!--  <input type="file" id="upload-button" accept="image/*" name="picture">
                <label for="upload-button" class="upload-file-label">                    
                    <div class="file-upload-icon"></div>
                    <span>Загрузить файл</span>
                </label> -->
                <!-- <br> -->
                <!-- <button type="button" id="clear-file-button" class="hidden"></button>                             -->
            </div>
            <!-- <br>
            <div class="form-inner-checkbox">
                <input type="checkbox" id="create-account" name="create-account"> 
                <label for="create-account">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                    </svg>
                    Активна
                </label>                                       
            </div>  -->             
        </div>
    </form> 
</div>
@endsection
@section('custom_js')
<!-- <script src="{{ asset('admin/js/file-upload-pairs.js') }}" type="text/javascript"></script> -->
@endsection  