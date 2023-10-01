@extends('profile.profile_master')
@section('profile_content')
    <div class="right-side-profile-title">Подписка</div>

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

    <!--  Форма Подписка -->
    <form class="form-order" action="{{route('profile.subscription.update')}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-order-wrapper">
            <div class="decor form-profile-subscribtions-panel">
                <!--  <div class="form-left-decoration"></div>
                <div class="form-right-decoration"></div>
                <div class="circle"></div> -->
                <div class="form-inner">
                    <!-- <h3>Адрес</h3> -->
                    <label for="is_subscribe" class="checkbox">
                        <input type="checkbox" class="checkbox__inp" id="is_subscribe"
                               name="is_subscribe"
                               @checked(\App\Models\Subscription::query()->where('email', Auth::user()->email)->firstOrCreate()->is_active))
                        >
                        <span class="checkbox__inner">Подписаться на рассылку новостей</span>
                    </label>
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
