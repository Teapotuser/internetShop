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
                <div class="title-add-icon"></div>
            </div>
            <span class="text">Добавление нового товара</span>  
        </div> 
        <a href="{{route('dashboard.product.index')}}" class="admin-back-button">
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
<!-- Форма добавления Категории -->
<div class="form-wrapper"> 
    <!--Форма логина--> 
    <form method="POST" action="{{ route('dashboard.product.store') }}" enctype="multipart/form-data" class="login-form-decor">
        @csrf
        <div class="form-inner">
            <label for="article">Артикул *</label>
            <input type="text" name="article" id="article" minLength="1" maxLength="150" required autocomplete="off" value="{{ old('article') }}">
            @error('article')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="title">Название *</label>
            <input type="text" name="title" id="title" minLength="1" maxLength="200" required autocomplete="off" value="{{ old('title') }}">
            @error('title')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <!--Комбобокс Категории товара--> 
            <div class="dropdown">
                <button type="button" class="dropdown__button">
                    <div class="dropdown__button-text">
                        {{
                            old('category_id')?
                            $categories->find(old('category_id'))->name :
                            'Выберите категорию...'
                        }}
                    </div>
                </button>
                <ul class="dropdown__list">
                    @foreach($categories as $category)
                        <li class="dropdown__list-item" data-value="{{$category->id}}">{{$category->name}}</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    @endforeach
                </ul>
                <input type="hidden" name="category_id" id="category_id" value="{{old('category_id')}}"
                    class="dropdown__input-hidden">
            </div>
            <!-- <label for="category_id">Категория *</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">Выберите категорию ...</div></button>
                    <ul class="dropdown__list">
                        @foreach($categories as $category)
                        <li class="dropdown__list-item" data-value="{{$category->id}}" >{{$category->name}}</li> -->
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                       <!--  @endforeach
                    </ul>
                    <input type="hidden" name="category_id" id="category_id" value="{{ old('category_id') }}" class="dropdown__input-hidden" >
                </div>
            </div> -->
            <!--End of Комбобокс Категории товара--> 
            <!--Комбобокс Коллекции товара--> 
            <div class="dropdown">
                <button type="button" class="dropdown__button">
                    <div class="dropdown__button-text">
                        {{
                            old('category_id')?
                            $categories->find(old('category_id'))->name :
                            'Выберите категорию...'
                        }}
                    </div>
                </button>
                <ul class="dropdown__list">
                    @foreach($categories as $category)
                        <li class="dropdown__list-item" data-value="{{$category->id}}">{{$category->name}}</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    @endforeach
                </ul>
                <input type="hidden" name="category_id" id="category_id" value="{{old('category_id')}}"
                    class="dropdown__input-hidden">
            </div>
            <!-- <label for="collection_id">Коллекция *</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">Выберите коллекцию ...</div></button>
                    <ul class="dropdown__list">
                        @foreach($collections as $collection)
                        <li class="dropdown__list-item" data-value="{{$collection->id}}" >{{$collection->name}}</li> -->
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                       <!--  @endforeach
                    </ul>
                    <input type="hidden" name="collection_id" id="collection_id" value="{{ old('collection_id') }}" class="dropdown__input-hidden" >
                </div>
            </div> -->
            <!--End of Комбобокс Коллекции товара--> 
            <label for="description">Описание</label>
            <br>
            <textarea name="description" id="description" cols="40" rows="3" maxLength="1000" autocomplete="off">{{ old('description') }}</textarea>
            @error('description')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror
            <label for="product_info">Информация</label>
            <br>
            <textarea name="product_info" id="product_info" cols="40" rows="3" maxLength="1000" autocomplete="off">{{ old('product_info') }}</textarea>
            @error('product_info')
                <div class="form-field-validation-error">{{ $message }}</div>
            @enderror           
            <div class="two-fields-product-container">
                <div>
                    <label for="price">Цена *</label>
                    <input type="number" name="price" id="price" min="0.01" max="100 000" required autocomplete="off" value="{{ old('price') }}">
                    @error('price')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="discount">Скидка (%)</label>
                    <input type="number" name="discount" id="discount" min="0" max="100" required autocomplete="off" value="{{ old('discount') }}">
                    @error('discount')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="two-fields-product-container">
                <div class="form-inner-checkbox">
                    <input type="checkbox" id="is_new" name="is_new" class="checkbox-customized">
                    <label for="is_new">
                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                        </svg>
                        Новинка
                    </label>                                       
                </div> 
                <div class="form-inner-checkbox">
                    <input type="checkbox" id="is_best_selling" name="is_best_selling" class="checkbox-customized">
                    <label for="is_best_selling">
                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg-checkbox">
                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                        </svg>
                        Хит продаж
                    </label>                                       
                </div>
            </div> 
            <br>

            <!--Комбобокс Коллекции товара-->           
            <!-- <label for="collection_id">Коллекция</label>
            <br>
            <select name="collection_id" id="collection_id" class="admin-combobox">
                <option @selected(Request::get('sort') =='date' || is_null(Request::get('sort'))) value="date">Новизне</option>
                <option @selected(Request::get('sort')=='jolly_maeh') value="jolly_maeh">Овечки Jolly Mäh</option>
                <option @selected(Request::get('sort')=='unicorn_theodor') value="unicorn_theodor">Единорог Theodor и его друзья</option>
                <option @selected(Request::get('sort')=='price-low') value="price-low">Уменьшению цены</option>
                <option @selected(Request::get('sort')=='price-high') value="price-high">Увеличению цены</option>                                
            </select> -->            
                        
            <!-- <br> -->
            <div class="two-fields-product-container">
                <div>
                    <label for="size">Размер (см) *</label>
                    <input type="number" name="size" id="size" min="1" max="1000" required autocomplete="off" value="{{ old('size') }}">
                    @error('size')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="height">Высота (см)</label>
                    <input type="number" name="height" id="height" min="0" max="1000" autocomplete="off" value="{{ old('height') }}">
                    @error('height')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="two-fields-product-container">
                <div>
                    <label for="width">Ширина (см)</label>
                    <input type="number" name="width" id="width" min="0" max="1000" autocomplete="off" value="{{ old('width') }}">
                    @error('width')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>    
                    <label for="depth">Глубина (см)</label>
                    <input type="number" name="depth" id="depth" min="0" max="1000" autocomplete="off" value="{{ old('depth') }}">
                    @error('depth')
                        <div class="form-field-validation-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
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

            <p class="label">Изображение *</p>
            <div class="file-upload-container">
                <figure class="file-upload-preview-image-container">
                    <img id="chosen-image" class="chosen-image" src="{{ asset('/admin/images/Untitled.png')}}">
                    <figcaption id="file-name" class="file-name"></figcaption>
                </figure>
        
                <input type="file" id="upload-button" class="upload-button" accept="image/*" name="picture">
                <label for="upload-button" class="upload-file-label">
                    <div class="file-upload-icon"></div>
                    <span>Загрузить файл</span>
                </label>
                <button type="button" id="clear-file-button" class="clear-file-button hidden"></button>                            
            </div>
            <br>

            <!--Комбобокс Материал товара--> 
            <label for="material">Материал</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">Выберите материал ...</div></button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="плюш/полиэстер" >плюш/полиэстер</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="material" id="material" value="" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Материал товара--> 
             <!--Комбобокс Материал наполнителя товара--> 
             <label for="material_filling">Материал наполнителя</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">Выберите материал наполнителя ...</div></button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="полиэфирное волокно (полиэстер)" >полиэфирное волокно (полиэстер)</li>
                        <!-- <li class="dropdown__list-item" data-value="lessons">Конспекты по учебе</li>
                        <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="material_filling" id="material_filling" value="" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Материал наполнителя товара-->
            <!--Комбобокс Рекомендуемый возраст товара--> 
            <label for="age_from">Рекомендуемый возраст</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">Выберите рекомендуемый возраст ...</div></button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="от 0 месяцев" >от 0 месяцев</li>
                        <li class="dropdown__list-item" data-value="от 12 месяцев">от 12 месяцев</li>
                        <li class="dropdown__list-item" data-value="от 3 лет">от 3 лет</li>
                        <!-- <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li>--> 
                    </ul>
                    <input type="hidden" name="age_from" id="age_from" value="" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Рекомендуемый возраст товара--> 
            <!--Комбобокс Рекомендации по уходу товара--> 
             <label for="care_recommend">Рекомендации по уходу</label>
            <br>
            <div class="form-group">
                <div class="dropdown">
                    <button type="button" class="dropdown__button"><div class="dropdown__button-text">Выберите рекомендацию ...</div></button>
                    <ul class="dropdown__list">                        
                        <li class="dropdown__list-item" data-value="рекомендуется ручная стирка" >рекомендуется ручная стирка</li>
                        <li class="dropdown__list-item" data-value="можно стирать на деликатном режиме при температуре 30 градусов">можно стирать на деликатном режиме при температуре 30 градусов</li>
                        <!-- <li class="dropdown__list-item" data-value="photo">Фотоальбом</li>
                        <li class="dropdown__list-item" data-value="sport">Дневник спортсмена</li> -->
                    </ul>
                    <input type="hidden" name="care_recommend" id="care_recommend" value="" class="dropdown__input-hidden" >
                </div>
            </div>
            <!--End of Комбобокс Рекомендации по уходу товара--> 

            <br>
            <div class="form-inner-checkbox">
                <input type="checkbox" id="is_active" name="is_active" class="checkbox-customized">
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
            <div class="file-upload-pair-wrapper">
                <div class="file-upload-control">
                    <p class="label">Иконка 1 *</p>
                    <div class="file-upload-container">
                        <figure class="file-upload-preview-image-container">
                            <img id="chosen-image" class="chosen-image" src="{{ asset('/admin/images/Untitled.png')}}">
                            <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                        </figure>
                
                        <input type="file" id="upload-button-11" class="upload-button" accept="image/*" name="preview_path[]">
                        <label for="upload-button-11" class="upload-file-label upload-file-label-in-pair">
                            <div class="file-upload-icon"></div>
                            <!-- <span>Загрузить файл</span> -->
                        </label>
                        <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button>                            
                    </div>
                </div>
                <div class="file-upload-control">
                    <p class="label">Изображение 1 *</p>
                    <div class="file-upload-container">
                        <figure class="file-upload-preview-image-container">
                            <img id="chosen-image" class="chosen-image" src="{{ asset('/admin/images/Untitled.png')}}">
                            <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                        </figure>
                
                        <input type="file" id="upload-button-12" class="upload-button" accept="image/*" name="path[]">
                        <label for="upload-button-12" class="upload-file-label upload-file-label-in-pair">
                            <div class="file-upload-icon"></div>
                            <!-- <span>Загрузить файл</span> -->
                        </label>
                        <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button>                            
                    </div>
                </div>
            </div>

            <div class="file-upload-pair-wrapper">
                <div class="file-upload-control">
                    <p class="label">Иконка 2 *</p>
                    <div class="file-upload-container">
                        <figure class="file-upload-preview-image-container">
                            <img id="chosen-image" class="chosen-image" src="{{ asset('/admin/images/Untitled.png')}}">
                            <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                        </figure>
                
                        <input type="file" id="upload-button-21" class="upload-button" accept="image/*" name="preview_path[]">
                        <label for="upload-button-21" class="upload-file-label upload-file-label-in-pair">
                            <div class="file-upload-icon"></div>
                            <!-- <span>Загрузить файл</span> -->
                        </label>
                        <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button>                            
                    </div>
                </div>
                <div class="file-upload-control">
                    <p class="label">Изображение 2 *</p>
                    <div class="file-upload-container">
                        <figure class="file-upload-preview-image-container">
                            <img id="chosen-image" class="chosen-image" src="{{ asset('/admin/images/Untitled.png')}}">
                            <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                        </figure>
                
                        <input type="file" id="upload-button-22" class="upload-button" accept="image/*" name="path[]">
                        <label for="upload-button-22" class="upload-file-label upload-file-label-in-pair">
                            <div class="file-upload-icon"></div>
                            <!-- <span>Загрузить файл</span> -->
                        </label>
                        <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button>                            
                    </div>
                </div>
            </div>

            <div class="file-upload-pair-wrapper">
                <div class="file-upload-control">
                    <p class="label">Иконка 3 *</p>
                    <div class="file-upload-container">
                        <figure class="file-upload-preview-image-container">
                            <img id="chosen-image" class="chosen-image" src="{{ asset('/admin/images/Untitled.png')}}">
                            <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                        </figure>
                
                        <input type="file" id="upload-button-31" class="upload-button" accept="image/*" name="preview_path[]">
                        <label for="upload-button-31" class="upload-file-label upload-file-label-in-pair">
                            <div class="file-upload-icon"></div>
                            <!-- <span>Загрузить файл</span> -->
                        </label>
                        <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button>                            
                    </div>
                </div>
                <div class="file-upload-control">
                    <p class="label">Изображение 3 *</p>
                    <div class="file-upload-container">
                        <figure class="file-upload-preview-image-container">
                            <img id="chosen-image" class="chosen-image" src="{{ asset('/admin/images/Untitled.png')}}">
                            <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                        </figure>
                
                        <input type="file" id="upload-button-32" class="upload-button" accept="image/*" name="path[]">
                        <label for="upload-button-32" class="upload-file-label upload-file-label-in-pair">
                            <div class="file-upload-icon"></div>
                            <!-- <span>Загрузить файл</span> -->
                        </label>
                        <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button>                            
                    </div>
                </div>
            </div>
            <!-- End of Загрузка картинок для карусели на странице товара -->
            <div class="more-file-upload-pairs-container"></div>
            <div class="center-button">
                <div class="">                                
                    <button type="button" class="more-file-upload-fields-button">
                        <div class="more-file-upload-fields-icon"></div>
                        <span>Добавить фото</span>                                    
                    </button> 
                    <div></div>                           
                </div>                            
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
<script src="{{ asset('admin/js/dropdown-control.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('admin/js/file-upload.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('admin/js/file-upload-pairs.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/admin-alert-form.js') }}" type="text/javascript"></script>
@endsection  