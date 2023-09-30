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
            <span class="text">Редактирование товара</span>  
        </div> 
        <a href="{{route('dashboard.product.index')}}" class="admin-back-button">
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
    <form method="POST" action="{{ route('dashboard.product.update', $product) }}" enctype="multipart/form-data" id="saveProducts" class="login-form-decor">
        @csrf
        @method('put')
        <div class="form-inner">
            <label for="article">Артикул *</label>
            <input type="text" name="article" id="article" minLength="1" maxLength="150" required autocomplete="off" value="{{old('article', $product->article)}}">
            @error('article')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="title">Название *</label>
            <input type="text" name="title" id="title" minLength="1" maxLength="200" required autocomplete="off" value="{{old('title', $product->title)}}">
            @error('title')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <!--Комбобокс Категории товара--> 
            <label for="category_id">Категория *</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button enabled">
                        <div class="dropdown__button-text enabled">                            
                            {{$categories->find( old('category_id', $product->category_id))->name}}
                        </div>
                    </button>
                    <ul class="dropdown__list">
                        @foreach($categories as $category)
                        <li class="dropdown__list-item" data-value="{{$category->id}}" >{{$category->name}}</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                        @endforeach
                    </ul>
                    <input type="hidden" name="category_id" id="category_id" value="{{ old('category_id', $product->category_id) }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Категории товара--> 
            <!--Комбобокс Коллекции товара--> 
            <label for="collection_id">Коллекция *</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button enabled">
                        <div class="dropdown__button-text enabled">                            
                            {{$collections->find( old('collection_id', $product->collection_id))->name}}                          
                        </div>
                    </button>
                    <ul class="dropdown__list">
                        @foreach($collections as $collection)
                        <li class="dropdown__list-item" data-value="{{$collection->id}}" >{{$collection->name}}</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                        @endforeach
                    </ul>
                    <input type="hidden" name="collection_id" id="collection_id" value="{{ old('collection_id', $product->collection_id) }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Коллекции товара--> 
            <label for="description">Описание</label>
            <br>
            <textarea name="description" id="description" cols="40" rows="3" maxLength="1000" autocomplete="off">{{old('description', $product->description)}}</textarea>
            @error('description')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="product_info">Информация</label>
            <br>
            <textarea name="product_info" id="product_info" cols="40" rows="3" maxLength="1000" autocomplete="off">{{old('product_info', $product->product_info)}}</textarea>
            @error('product_info')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror 
            <div class="two-fields-product-container">
                <div>
                    <label for="price">Цена *</label>
                    <input type="number" name="price" id="price" min="0.01" max="100 000" step="0.01" required autocomplete="off" value="{{old('price', $product->price)}}">
                    @error('price')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="discount">Скидка (%)</label>
                    <input type="number" name="discount" id="discount" min="0" max="100" autocomplete="off" value="{{old('discount', $product->discount)}}">
                    @error('discount')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="two-fields-product-container">
                <div class="form-inner-checkbox">
                    <input type="checkbox" id="is_new" name="is_new" class="checkbox-customized" @checked(old('is_new', $product->is_new))>
                    <label for="is_new">
                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                        </svg>
                        Новинка
                    </label>                                       
                </div> 
                <div class="form-inner-checkbox">
                    <input type="checkbox" id="is_best_selling" name="is_best_selling" class="checkbox-customized" @checked(old('is_best_selling', $product->is_best_selling))>
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
                    <input type="number" name="size" id="size" min="1" max="1000" required autocomplete="off" value="{{old('size', $product->size)}}">
                    @error('size')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="height">Высота (см)</label>
                    <input type="number" name="height" id="height" min="0" max="1000" autocomplete="off" value="{{old('height', $product->height)}}">
                    @error('height')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="two-fields-product-container">
                <div>
                    <label for="width">Ширина (см)</label>
                    <input type="number" name="width" id="width" min="0" max="1000" autocomplete="off" value="{{old('width', $product->width)}}">
                    @error('width')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>    
                    <label for="depth">Глубина (см)</label>
                    <input type="number" name="depth" id="depth" min="0" max="1000" autocomplete="off" value="{{old('depth', $product->depth)}}">
                    @error('depth')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <p class="label">Изображение *</p>
            <div class="file-upload-container">
                <figure class="file-upload-preview-image-container">
                    <img id="chosen-image" class="chosen-image" src="{{ $product->picture ? Storage::url($product->picture) : asset('/admin/images/Untitled.png')}}">
                    <figcaption id="file-name" class="file-name"></figcaption>
                </figure>
        
                <input type="file" id="upload-button" class="upload-button" accept="image/*" name="picture">
                <label for="upload-button" class="upload-file-label">                    
                    <div class="file-upload-icon"></div>
                    <span>Загрузить файл</span>
                </label>
                <input type="hidden" name="removeImage">
                <button type="button" id="clear-file-button" class="clear-file-button @if(!$product->picture) hidden @endif "></button>
            </div>
            <br>

            <!--Комбобокс Материал товара--> 
            <label for="material">Материал</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button enabled">
                        <div class="dropdown__button-text enabled">                           
                            {{
                                old('material', $product->material ) ?:'Выберите материал ...'
                            }}
                        </div>
                    </button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="плюш/полиэстер" >плюш/полиэстер</li>
                        <li class="dropdown__list-item" data-value="плюш/полиэстер из переработанного материала" >плюш/полиэстер из переработанного материала</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="material" id="material" value="{{ old('material', $product->material) }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Материал товара--> 
            <!--Комбобокс Материал наполнителя товара--> 
            <label for="material_filling">Материал наполнителя</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button enabled">
                        <div class="dropdown__button-text enabled">
                            {{
                                old('material_filling', $product->material_filling ) ?: 'Выберите материал наполнителя ...'
                            }}                            
                        </div>
                    </button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="полиэфирное волокно (полиэстер)" >полиэфирное волокно (полиэстер)</li>
                        <li class="dropdown__list-item" data-value="полиэфирное волокно (полиэстер) из переработанного материала" >полиэфирное волокно (полиэстер) из переработанного материала</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="material_filling" id="material_filling" value="{{ old('material_filling', $product->material_filling) }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Материал наполнителя товара-->
            <!--Комбобокс Рекомендуемый возраст товара--> 
            <label for="age_from">Рекомендуемый возраст</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button enabled">
                        <div class="dropdown__button-text enabled">                            
                            {{
                                old('age_from', $product->age_from ) ?: 'Выберите рекомендуемый возраст ...'                               
                            }}   
                        </div>
                    </button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="от 0 месяцев" >от 0 месяцев</li>
                        <li class="dropdown__list-item" data-value="от 12 месяцев">от 12 месяцев</li>
                        <li class="dropdown__list-item" data-value="от 3 лет">от 3 лет</li>
                        <!-- <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li>--> 
                    </ul>
                    <input type="hidden" name="age_from" id="age_from" value="{{ old('age_from', $product->age_from) }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Рекомендуемый возраст товара--> 
            <!--Комбобокс Рекомендации по уходу товара--> 
            <label for="care_recommend">Рекомендации по уходу</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button enabled">
                        <div class="dropdown__button-text enabled">                            
                            {{
                                old('care_recommend', $product->care_recommend) ?:'Выберите рекомендацию ...'                               
                            }}   
                        </div>
                    </button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="рекомендуется ручная стирка" >рекомендуется ручная стирка</li>
                        <li class="dropdown__list-item" data-value="можно стирать на деликатном режиме при температуре 30 градусов">можно стирать на деликатном режиме при температуре 30 градусов</li>
                        <!-- <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="care_recommend" id="care_recommend" value="{{ old('care_recommend', $product->care_recommend) }}" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Рекомендации по уходу товара--> 

            <br>
            <div class="form-inner-checkbox">
                <input type="checkbox" id="is_active" name="is_active" class="checkbox-customized" @checked(old('is_active', $product->is_active))>
                <label for="is_active">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                    </svg>
                    В наличии
                </label>                                       
            </div>  
            <br>

            <h3 class="file-upload-pairs-title">Загрузка фото для карточки товара</h3>
            <!-- Загрузка картинок для карусели на странице товара -->
            @foreach($product->images as $key=>$image)
                @php($key++)
                <div class="file-upload-pair-wrapper">
                    <div class="file-upload-control">
                        <p class="label">Иконка {{$key}} {{ $key <= 3 ? '*' : ''  }}</p>
                        <div class="file-upload-container">
                            <figure class="file-upload-preview-image-container">
                                <!-- <img id="chosen-image" class="chosen-image" src="{{ $product->picture ? Storage::url($product->picture) : asset('/admin/images/Untitled.png')}}"> -->
                                <img id="chosen-image" class="chosen-image" src="{{  Storage::url($image->preview_path) }}" data-image="img{{$image->id}}">
                                <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                            </figure>
                    
                            <input type="file" id="upload-button-{{$key}}1" class="upload-button" accept="image/*" name="preview_path[img{{$image->id}}]">
                            <label for="upload-button-{{$key}}1" class="upload-file-label upload-file-label-in-pair">
                                <div class="file-upload-icon"></div>
                                <!-- <span>Загрузить файл</span> -->
                            </label>
                            <!-- <input type="hidden" name="removeImage" id="removeImage-11"> -->
                            <input type="hidden" name="removePreviewImages[{{$key}}]" class="removePreviewImage">
                            <button type="button" id="clear-file-button" data-key="{{$key}}" data-type="preview" class="clear-file-button clear-file-button-in-pair"></button>                            
                        </div>
                    </div>
                    <div class="file-upload-control">
                        <p class="label">Изображение {{$key}} {{ $key <= 3 ? '*' : ''  }}</p>
                        <div class="file-upload-container">
                            <figure class="file-upload-preview-image-container">
                                <!-- <img id="chosen-image" class="chosen-image" src="{{ $product->picture ? Storage::url($product->picture) : asset('/admin/images/Untitled.png')}}"> -->
                                <img id="chosen-image" class="chosen-image" src="{{  Storage::url($image->path) }}" data-image="img{{$image->id}}">
                                <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                            </figure>
                    
                            <input type="file" id="upload-button-{{$key}}2" class="upload-button" accept="image/*" name="path[img{{$image->id}}]">
                            <label for="upload-button-{{$key}}2" class="upload-file-label upload-file-label-in-pair">
                                <div class="file-upload-icon"></div>
                                <!-- <span>Загрузить файл</span> -->
                            </label>
                            <!-- <input type="hidden" name="removeImage" id="removeImage-12"> -->
                            <input type="hidden" name="removeImages[{{$key}}]" class="removeImage">
                            <button type="button" id="clear-file-button" data-key="{{$key}}" data-type="image" class="clear-file-button clear-file-button-in-pair"></button>                            
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="more-file-upload-pairs-insert-before-div"></div>
            <div class="center-button">
                <div class="">                                
                    <button type="button" class="more-file-upload-fields-button">
                        <div class="more-file-upload-fields-icon"></div>
                        <span>Добавить фото</span>                                    
                    </button> 
                    <div></div>                           
                </div>                            
            </div>           
            
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
<script src="{{ asset('js/jquery-3.6.1.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/dropdown-control.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/file-upload-pairs.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/admin-alert-form.js') }}" type="text/javascript"></script>
@endsection  