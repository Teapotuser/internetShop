@extends('profile.profile_master')
@section('profile_content')
    <div class="right-side-profile-title">Личные данные</div>
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
                                   autocomplete="off">
                            <input type="text" name="last_name"
                                   value="{{old('last_name',Auth::user()->last_name)}}"
                                   placeholder="Фамилия *" minLength="1" maxLength="150" required
                                   autocomplete="off">
                            <input type="email" name="email"
                                   value="{{old('email',Auth::user()->email)}}"
                                   placeholder="Email *" minLength="1" maxLength="150" required
                                   autocomplete="off">
                            <input type="number" name="phone_number"
                                   value="{{old('phone_number',Auth::user()->phone_number)}}"
                                   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                   placeholder="Номер телефона *" minLength="1" maxLength="20"
                                   required autocomplete="off">
                        </div>
                        <!-- Upload изображения пользователя -->
                        <div class="form-profile-personaldata-photo">
                            <!-- <p class="label">Изображение</p> -->
                            <div class="file-upload-container">
                                <figure class="file-upload-preview-image-container">
                                    <img id="chosen-image" class="chosen-image"
                                         src="{{ Auth::user()->picture? :asset('/admin/images/Untitled.png')}}">
                                </figure>
                                <input type="file" id="upload-button" class="upload-button"
                                       accept="image/*" name="picture">
                                <label for="upload-button" class="upload-file-label">
                                    <div class="file-upload-icon"></div>
                                    <span>Загрузить фото</span>
                                </label>
                                <input type="hidden" name="removeImage">
                                <button type="button" id="clear-file-button"
                                        class="clear-file-button hidden"></button>
                            </div>
                        </div>
                    </div>
                    <h3>Адрес</h3>
                    <input type="text" placeholder="Адрес" name="address"
                           value="{{old('address',Auth::user()->address)}}"
                           class="delivery-address input-margin-top"
                           maxLength="250">
                    <div class="two-fields-in-row">
                        <input type="text" placeholder="Город" name="city"
                               value="{{old('city',Auth::user()->city)}}" class="delivery-address"
                               maxLength="150">
                        <input type="text" placeholder="Индекс"
                               value="{{old('zip_code',Auth::user()->zip_code)}}" name="zip_code"
                               class="delivery-address"
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
