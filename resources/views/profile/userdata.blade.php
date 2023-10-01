@extends('profile.profile_master')
@section('profile_content')
    <div class="right-side-profile-title">Личные данные</div>
        <!-- отображение сообщения -->
        @isset($message)                       
            <div class="alert-container">
                <div class="alert alert-success show showAlert">
                    <div class="alert-success-icon"></div>
                    <div class="alert-msg-container">
                        <div class="msg">{{$message}}</div>
                    </div>
                    <div class="close-btn">
                        <button type="button" id="close-alert-button"></button>
                    </div>
                </div>
            </div>
        @endisset                      
        <!-- отображение сообщения, что при Логине/Регистрации возникли ошибки -->
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

    <!--  Форма Личных данных и Адреса -->
    <form class="form-order" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-order-wrapper">
            <div class="decor form-profile-personaldata-panel">
                <div class="form-inner">
                    <h3>Контактные данные</h3>
                    <div class="form-profile-personaldata-data-photo-container">
                        <div class="form-profile-personaldata-data">
                            <input type="text" name="name"
                                   value="{{old('name',Auth::user()->name)}}"
                                   placeholder="Имя *" minLength="1" maxLength="150" required
                                   autocomplete="off"
                                   @error('name') class="is-invalid" @enderror >
                            <input type="text" name="last_name"
                                   value="{{old('last_name',Auth::user()->last_name)}}"
                                   placeholder="Фамилия *" minLength="1" maxLength="150" required
                                   autocomplete="off"
                                   @error('last_name') class="is-invalid" @enderror >
                            <input type="email" name="email"
                                   value="{{old('email',Auth::user()->email)}}"
                                   placeholder="Email *" minLength="1" maxLength="150" required
                                   autocomplete="off"
                                   @error('email') class="is-invalid" @enderror >
                            <input type="number" name="phone_number"
                                   value="{{old('phone_number', Auth::user()->phone_number)}}"
                                   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                   placeholder="Номер телефона *" minLength="1" maxLength="20"
                                   required autocomplete="off"
                                   @error('phone-number') class="is-invalid" @enderror >
                        </div>
                        <!-- Upload изображения пользователя -->
                        <div class="form-profile-personaldata-photo">
                            <!-- <p class="label">Изображение</p> -->
                            <div class="file-upload-container">
                                <figure class="file-upload-preview-image-container">
                                    <img id="chosen-image" class="chosen-image"
                                         src="{{  Auth::user()?->picture ?:asset('/admin/images/Untitled.png')}}">
                                </figure>
                                <input type="file" id="upload-button" class="upload-button"
                                       accept="image/*" name="picture">
                                <label for="upload-button" class="upload-file-label">
                                    <div class="file-upload-icon"></div>
                                    <span>Загрузить фото</span>
                                </label>
                                <input type="hidden" name="removeImage">
                                <button type="button" id="clear-file-button"
                                        class="clear-file-button  @if( !(Auth::user()->picture)) hidden @endif "></button>
                            </div>
                        </div>
                    </div>
                    <h3>Адрес</h3>
                    <input type="text" placeholder="Адрес" name="address"
                           value="{{old('address', Auth::user()->address)}}"
                           class="delivery-address input-margin-top @error('address') is-invalid @enderror "
                           maxLength="250">
                    <div class="two-fields-in-row">
                        <input type="text" placeholder="Город" name="city"
                               value="{{old('city', Auth::user()->city)}}" class="delivery-address @error('city') is-invalid @enderror "
                               maxLength="150">
                        <input type="text" placeholder="Индекс"
                               value="{{old('zip_code', Auth::user()->zip_code)}}" name="zip_code"
                               class="delivery-address @error('zip_code') is-invalid @enderror "
                               maxLength="20">
                    </div>
                    <div class="feedbackform-center-button">
                        <button type="submit" class="main-cart-button-order btn-buy">Сохранить
                            изменения
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
 