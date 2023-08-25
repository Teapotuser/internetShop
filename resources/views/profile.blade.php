@extends('layouts.master')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/password.css')}}">
     <!--  <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" type="text/css"> -->
@endsection
@section('content')
<main>
        <div class="wrapper">              
            <div class="shop-wrapper">               
                <!-- левая панель -->
                <aside class="left-side">
                    <div class="profile-left-side">
                        <div class="profile-details-box">
                            <div class="profile-left-side-photo-container">
                                <img src="/images/NICI/eule-profile3-trim.png" alt="Users photo">
                            </div>
                            <h3>Имя Фамилия</h3>
                            <p>email-registration@gmail.com</p>
                        </div>
                        <nav class="profile-left-side-links-box">
                            <ul>
                                <li>
                                    <a href="#" class="profile-left-side-title-box active">
                                        <p>Главная</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>  
                                <li>
                                    <a href="#" class="profile-left-side-title-box">
                                        <p>Личные данные</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>                                
                                <li>
                                    <a href="#" class="profile-left-side-title-box">
                                        <p>История заказов</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>
                                <li>
                                    <a href="#" class="profile-left-side-title-box">
                                        <p>Подписка</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>
                                <li>
                                    <a href="#" class="profile-left-side-title-box">
                                        <p>Сменить пароль</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>
                                <li>
                                    <a href="#" class="profile-left-side-title-box">
                                        <p>Выход</p>
                                        <div class="button-right"></div>      
                                    </a>                                    
                                </li>
                            </ul>
                        </nav>
                    </div>                       
                </aside>
                <section class="right-side"> <!-- Правая галерея товаров -->
                    <div class="right-side-wrapper">
                        <h1 class="right-side-title">Личный кабинет</h1>

                         <!-- Главная страница Личного кабинета (Dashboard) -->
                        <!--  <ul class="shop_gallery"> Галерея товаров-->
                        <ul id="imgBlock" class="profile_layout_four_column">
                            <li class="profile_img_block">
                                <a href="#" class="profile-link-img-product">
                                    <!-- <div class="img-product">
                                        <img class="img" src="" alt="" />
                                    </div>  -->
                                    <div class="profile-gallery-icon-container">
                                        <div class="profile-gallery-personaldata-icon"></div>
                                    </div>
                                    <h3 class="profile-gallery-box-title">Личные данные</h3>                                       
                                </a>                             
                            </li>
                            <li class="profile_img_block">
                                <a href="#" class="profile-link-img-product">
                                    <!-- <div class="img-product">
                                        <img class="img" src="" alt="" />
                                    </div>  -->
                                    <div class="profile-gallery-icon-container">
                                        <div class="profile-gallery-orders-icon"></div>
                                    </div>
                                    <h3 class="profile-gallery-box-title">История заказов</h3>                                        
                                </a>                             
                            </li>                           
                            <li class="profile_img_block">
                                <a href="#" class="profile-link-img-product">
                                    <!-- <div class="img-product">
                                        <img class="img" src="" alt="" />                                             
                                    </div> --> 
                                    <div class="profile-gallery-icon-container">
                                        <div class="profile-gallery-subscription-icon"></div>
                                    </div>
                                    <h3 class="profile-gallery-box-title">Подписка</h3>                                       
                                </a>                             
                            </li>
                            <li class="profile_img_block">
                                <a href="#" class="profile-link-img-product">
                                    <!-- <div class="img-product">
                                        <img class="img" src="" alt="" />                                        
                                    </div> --> 
                                    <div class="profile-gallery-icon-container">
                                        <div class="profile-gallery-changepassword-icon"></div>
                                    </div>
                                    <h3 class="profile-gallery-box-title">Сменить пароль</h3>                                        
                                </a>                             
                            </li>                            
                            <li class="profile_img_block">
                                <a href="#" class="profile-link-img-product">
                                    <!-- <div class="img-product">
                                        <img class="img" src="" alt="" />                                        
                                    </div>  -->
                                    <div class="profile-gallery-icon-container">
                                        <div class="profile-gallery-logout-icon"></div>
                                    </div>
                                    <h3 class="profile-gallery-box-title">Выход</h3>                                        
                                </a>                             
                            </li>
                        </ul>
                       
                        <div class="right-side-profile-title">Личные данные</div>                         
                         <!--  Форма Личных данных и Адреса -->
                        <form class="form-order">
                            <div class="form-order-wrapper">
                                <div class="decor form-profile-personaldata-panel">
                                    <!--  <div class="form-left-decoration"></div>
                                    <div class="form-right-decoration"></div> 
                                    <div class="circle"></div> -->
                                    <div class="form-inner">
                                        <h3>Контактные данные</h3>
                                        <div class="form-profile-personaldata-data-photo-container">
                                            <div class="form-profile-personaldata-data">
                                                <input type="text" placeholder="Имя *" minLength="1" maxLength="150" required autocomplete="off">
                                                <input type="text" placeholder="Фамилия *" minLength="1" maxLength="150" required autocomplete="off">
                                                <input type="email" placeholder="Email *" minLength="1" maxLength="150" required autocomplete="off">
                                                <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Номер телефона *" minLength="1" maxLength="20" name="phone_number" required autocomplete="off">
                                                <!-- <textarea placeholder="Сообщение..." rows="4" autocomplete="off"></textarea>      -->
                                                <!-- <input type="text" placeholder="Адрес" class="delivery-address input-margin-top" maxLength="250" >                             -->
                                                <!-- <p class="info-text">Вы можете создать аккаунт после оформления заказа</p> -->
                                            </div>
                                            <!-- Upload изображения пользователя -->
                                            <div class="form-profile-personaldata-photo">
                                                <!-- <p class="label">Изображение</p> -->
                                                <div class="file-upload-container">
                                                    <figure class="file-upload-preview-image-container">
                                                        <img id="chosen-image" class="chosen-image" src="{{ asset('/admin/images/Untitled.png')}}">
                                                        <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
                                                    </figure>
                                            
                                                    <input type="file" id="upload-button" class="upload-button" accept="image/*" name="picture">
                                                    <label for="upload-button" class="upload-file-label">
                                                        <div class="file-upload-icon"></div>
                                                        <span>Загрузить фото</span>
                                                    </label>
                                                    <button type="button" id="clear-file-button" class="clear-file-button hidden"></button>                            
                                                </div>
                                            </div>
                                        </div>    
                                        <h3>Адрес</h3>
                                        <input type="text" placeholder="Адрес" class="delivery-address input-margin-top" maxLength="250" >
										<div class="two-fields-in-row">
                                            <input type="text" placeholder="Город" class="delivery-address" maxLength="150" >
										    <input type="text" placeholder="Индекс" class="delivery-address" maxLength="10" >
                                        </div>
                                        <div class="feedbackform-center-button">
                                            <button type="submit" class="main-cart-button-order btn-buy">Сохранить изменения</button>
                                            <!-- <a href="#" type="button" class="main-cart-button-order">Оформить заказ</a> -->
                                        </div>                                                                       
                                    </div>                                                   
                                </div>
                            </div>        
                        </form>

                        <div class="right-side-profile-title">Подписка</div>                         
                         <!--  Форма Подписка -->
                        <form class="form-order">
                            <div class="form-order-wrapper">
                                <div class="decor form-profile-subscribtions-panel">
                                    <!--  <div class="form-left-decoration"></div>
                                    <div class="form-right-decoration"></div> 
                                    <div class="circle"></div> -->
                                    <div class="form-inner">                                          
                                        <!-- <h3>Адрес</h3> -->   
                                        
                                        <label for="is_subscribe" class="checkbox">
                                            <input type="checkbox" class="checkbox__inp" id="is_subscribe" name="is_subscribe">
                                            <span class="checkbox__inner">Подписаться на рассылку новостей</span>
                                        </label>

                                        <div class="feedbackform-center-button">
                                            <button type="submit" class="main-cart-button-order btn-buy">Сохранить изменения</button>
                                            <!-- <a href="#" type="button" class="main-cart-button-order">Оформить заказ</a> -->
                                        </div>                                                                       
                                    </div>                                                   
                                </div>
                            </div>        
                        </form>

                        <div class="right-side-profile-title">Сменить пароль</div>                         
                         <!--  Форма Сменить пароль -->
                        <form class="form-order">
                            <div class="form-order-wrapper">
                                <div class="decor form-profile-changepassword-panel">
                                    <!--  <div class="form-left-decoration"></div>
                                    <div class="form-right-decoration"></div> 
                                    <div class="circle"></div> -->
                                    <div class="form-inner"> 
                                        <div class="form-profile-changepassword-panel-container">
                                            <div class="">                                         
                                            <!-- <h3>Адрес</h3> --> 
                                                <div class="password-input-wrapper">                                       
                                                    <input id="password" type="password" class="form-control password-field @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Старый пароль *">
                                                    <button type="button" name="" value="" class="view-password-button">
                                                        <img class="view-password-icon" src="{{ asset('images/noun-hide-5783163-grey.svg') }}" alt="hide-pass">
                                                    </button>  
                                                </div> 
                                                <!-- @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror -->                                    
                                            </div>                                        
                                            <div class="">
                                                <div class="password-input-wrapper">
                                                    <input id="password" type="password" class="form-control password-field @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Новый пароль *">
                                                    <button type="button" name="" value="" class="view-password-button">
                                                        <img class="view-password-icon" src="{{ asset('images/noun-hide-5783163-grey.svg') }}" alt="hide-pass">
                                                    </button>  
                                                </div> 
                                                <!-- @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror -->                                    
                                            </div>                                
                                            <div class="">
                                                <div class="password-input-wrapper">
                                                    <input id="password-confirm" type="password" class="form-control password-field @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="off" placeholder="Подтвердите пароль *">
                                                    <button type="button" name="" value="" class="view-password-button">
                                                        <img class="view-password-icon" src="{{ asset('images/noun-hide-5783163-grey.svg') }}" alt="hide-pass">
                                                    </button>  
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="feedbackform-center-button">
                                            <button type="submit" class="main-cart-button-order btn-buy">Сохранить изменения</button>
                                            <!-- <a href="#" type="button" class="main-cart-button-order">Оформить заказ</a> -->
                                        </div>                                                                       
                                    </div>                                                   
                                </div>
                            </div>        
                        </form>

                    <!--Здесь была Сортировка галереи товаров-->   
                   <!--  <ul class="shop_gallery"> здесь была Галерея товаров-->
                   
                    </div> 
                </section> 
            </div> 
        </div>
    </main>
@endsection     
@section('custom_js')
<script src="{{ asset('js/file-upload-pairs.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/view-hide-password.js') }}" type="text/javascript"></script>
@endsection    