@extends('layouts.admin')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('admin/css/admin-form.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/dropdown-control.css') }}" type="text/css">
@endsection    
@section('dashboard-content')
<div class="overview">
    <div class="title title-with-button">
        <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
        <div class="title-left">
            <div class="title-rectangle-icon">
                <div class="title-view-icon"></div>
            </div>
            <span class="text">Просмотр товара</span>  
        </div> 
        <a href="{{route('dashboard.product.index')}}" class="admin-back-button">
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
    <form method="POST" action="{{ route('dashboard.product.store') }}" enctype="multipart/form-data" class="login-form-decor">
        @csrf
        <div class="form-inner">
            <label for="article">Артикул *</label>
            <input type="text" name="article" id="article" minLength="1" maxLength="150" required autocomplete="off" value="{{ $product->article }}" disabled>
            @error('article')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="title">Название *</label>
            <input type="text" name="title" id="title" minLength="1" maxLength="200" required autocomplete="off" value="{{ $product->title }}" disabled>
            @error('title')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <!--Комбобокс Категории товара--> 
            <label for="category_id">Категория *</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">{{ $product->category->name }}</div></button>
                    <ul class="dropdown__list">                        
                        <!-- <li class="dropdown__list-item" data-value="" ></li> -->
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="category_id" id="category_id" value="{{ $product->category_id }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Категории товара--> 
            <!--Комбобокс Коллекции товара--> 
            <label for="collection_id">Коллекция *</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">{{ $product->collection->name }}</div></button>
                    <ul class="dropdown__list">
                        <!-- <li class="dropdown__list-item" data-value="" ></li> -->
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="collection_id" id="collection_id" value="{{ $product->collection_id }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Коллекции товара--> 
            <label for="description">Описание</label>
            <br>
            <textarea name="description" id="description" cols="40" rows="3" maxLength="1000" autocomplete="off" disabled>{{ $product->description }}</textarea>
            @error('description')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="product_info">Информация</label>
            <br>
            <textarea name="product_info" id="product_info" cols="40" rows="3" maxLength="1000" autocomplete="off" disabled>{{ $product->product_info }}</textarea>
            @error('product_info')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror 
            <div class="two-fields-product-container">
                <div>
                    <label for="price">Цена *</label>
                    <input type="number" name="price" id="price" min="0.01" max="100 000" step="0.01" required autocomplete="off" value="{{ $product->price }}" disabled>
                    @error('price')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="discount">Скидка (%)</label>
                    <input type="number" name="discount" id="discount" min="0" max="100" autocomplete="off" value="{{ $product->discount }}" disabled>
                    @error('discount')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="two-fields-product-container">
                <div class="form-inner-checkbox">
                    <input type="checkbox" id="is_new" name="is_new" class="checkbox-customized" @checked($product->is_new) disabled>
                    <label for="is_new">
                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                        </svg>
                        Новинка
                    </label>                                       
                </div> 
                <div class="form-inner-checkbox">
                    <input type="checkbox" id="is_best_selling" name="is_best_selling" class="checkbox-customized" @checked($product->is_best_selling) disabled>
                    <label for="is_best_selling">
                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                        </svg>
                        Хит продаж
                    </label>                                       
                </div>
            </div> 
            <br>
            <div class="two-fields-product-container">
                <div>
                    <label for="size">Размер (см) *</label>
                    <input type="number" name="size" id="size" min="1" max="1000" required autocomplete="off" value="{{ $product->size }}" disabled>
                    @error('size')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="height">Высота (см)</label>
                    <input type="number" name="height" id="height" min="0" max="1000" autocomplete="off" value="{{ $product->height }}" disabled>
                    @error('height')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="two-fields-product-container">
                <div>
                    <label for="width">Ширина (см)</label>
                    <input type="number" name="width" id="width" min="0" max="1000" autocomplete="off" value="{{ $product->width }}" disabled>
                    @error('width')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>    
                    <label for="depth">Глубина (см)</label>
                    <input type="number" name="depth" id="depth" min="0" max="1000" autocomplete="off" value="{{ $product->depth }}" disabled>
                    @error('depth')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <p class="label">Изображение *</p>
            <div class="file-upload-container">
                <figure class="file-upload-preview-image-container">
                    <img id="chosen-image" class="chosen-image" src="{{ $product->picture ? Storage::url($product->picture) : asset('/admin/images/Untitled.png')}}">
                </figure>
        
               <!--  <input type="file" id="upload-button" accept="image/*" name="picture">
                <label for="upload-button" class="upload-file-label">                    
                    <div class="file-upload-icon"></div>
                    <span>Загрузить файл</span>
                </label> -->
                <!-- <br> -->
                <!-- <button type="button" id="clear-file-button" class="hidden"></button>     -->
            </div>
            <br>

            <!--Комбобокс Материал товара--> 
            <label for="material">Материал</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">{{ $product->material }}</div></button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="плюш/полиэстер" >плюш/полиэстер</li>
                        <li class="dropdown__list-item" data-value="плюш/полиэстер из переработанного материала" >плюш/полиэстер из переработанного материала</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="material" id="material" value="{{ $product->material }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Материал товара--> 
            <!--Комбобокс Материал наполнителя товара--> 
            <label for="material_filling">Материал наполнителя</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">{{ $product->material_filling }}</div></button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="полиэфирное волокно (полиэстер)" >полиэфирное волокно (полиэстер)</li>
                        <li class="dropdown__list-item" data-value="полиэфирное волокно (полиэстер) из переработанного материала" >полиэфирное волокно (полиэстер) из переработанного материала</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="material_filling" id="material_filling" value="{{ $product->material_filling }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Материал наполнителя товара-->
            <!--Комбобокс Рекомендуемый возраст товара--> 
            <label for="age_from">Рекомендуемый возраст</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">{{ $product->age_from }}</div></button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="от 0 месяцев" >от 0 месяцев</li>
                        <li class="dropdown__list-item" data-value="от 12 месяцев">от 12 месяцев</li>
                        <li class="dropdown__list-item" data-value="от 3 лет">от 3 лет</li>
                        <!-- <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li>--> 
                    </ul>
                    <input type="hidden" name="age_from" id="age_from" value="{{ $product->age_from }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Рекомендуемый возраст товара--> 
            <!--Комбобокс Рекомендации по уходу товара--> 
            <label for="care_recommend">Рекомендации по уходу</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">{{ $product->care_recommend }}</div></button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="рекомендуется ручная стирка" >рекомендуется ручная стирка</li>
                        <li class="dropdown__list-item" data-value="можно стирать на деликатном режиме при температуре 30 градусов">можно стирать на деликатном режиме при температуре 30 градусов</li>
                        <!-- <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="care_recommend" id="care_recommend" value="{{ $product->care_recommend }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Рекомендации по уходу товара--> 

            <br>
            <div class="form-inner-checkbox">
                <input type="checkbox" id="is_active" name="is_active" class="checkbox-customized" @checked( $product->is_active ) disabled>
                <label for="is_active">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                    </svg>
                    В наличии
                </label>                                       
            </div>  
            <br>

            <h3 class="file-upload-pairs-title">Фото для карточки товара</h3>
            <!-- Загрузка картинок для карусели на странице товара -->
            @foreach($product->images as $key=>$image)
                @php($key++)
                <div class="file-upload-pair-wrapper">
                    <div class="file-upload-control">
                        <p class="label">Иконка {{$key}} {{ $key <= 3 ? '*' : ''  }}</p>
                        <div class="file-upload-container">
                            <figure class="file-upload-preview-image-container">
                                <!-- <img id="chosen-image" class="chosen-image" src="{{ $product->picture ? Storage::url($product->picture) : asset('/admin/images/Untitled.png')}}"> -->
                                <img id="chosen-image" class="chosen-image" src="{{  Storage::url($image->preview_path) }}">
                                <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                            </figure>
                    
                            <!-- <input type="file" id="upload-button-11" class="upload-button" accept="image/*" name="preview_path[]">
                            <label for="upload-button-11" class="upload-file-label upload-file-label-in-pair">
                                <div class="file-upload-icon"></div> -->
                                <!-- <span>Загрузить файл</span> -->
                        <!--  </label>                        
                            <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button> -->                            
                        </div>
                    </div>
                    <div class="file-upload-control">
                        <p class="label">Изображение {{$key}} {{ $key <= 3 ? '*' : ''  }}</p>
                        <div class="file-upload-container">
                            <figure class="file-upload-preview-image-container">
                                <!-- <img id="chosen-image" class="chosen-image" src="{{ $product->picture ? Storage::url($product->picture) : asset('/admin/images/Untitled.png')}}"> -->
                                <img id="chosen-image" class="chosen-image" src="{{  Storage::url($image->path) }}">
                                <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                            </figure>
                    
                            <!-- <input type="file" id="upload-button-12" class="upload-button" accept="image/*" name="path[]">
                            <label for="upload-button-12" class="upload-file-label upload-file-label-in-pair">
                                <div class="file-upload-icon"></div> -->
                                <!-- <span>Загрузить файл</span> -->
                            <!-- </label>                        
                            <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button> -->                            
                        </div>
                    </div>
                </div> 
            @endforeach                     
        </div>
    </form> 
</div>
@endsection
@section('custom_js')
<!-- <script src="{{ asset('admin/js/file-upload-pairs.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('admin/js/dropdown-control.js') }}" type="text/javascript"></script>
@endsection  