@extends('profile.profile_master')
@section('profile_content')
    <!-- <h1 class="right-side-title">Личный кабинет</h1> -->
    <ul id="imgBlock" class="profile_layout_four_column">
        <li class="profile_img_block">
            <a href="{{route('profile.userdata.show')}}" class="profile-link-img-product">
                <div class="profile-gallery-icon-container">
                    <div class="profile-gallery-personaldata-icon"></div>
                </div>
                <h3 class="profile-gallery-box-title">Личные данные</h3>
            </a>
        </li>
        <li class="profile_img_block">
            <a href="{{route('profile.orderhistory.show')}}" class="profile-link-img-product">
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
            <a href="{{route('profile.subscription.show')}}" class="profile-link-img-product">
                <div class="profile-gallery-icon-container">
                    <div class="profile-gallery-subscription-icon"></div>
                </div>
                <h3 class="profile-gallery-box-title">Подписка</h3>
            </a>
        </li>
        <li class="profile_img_block">
            <a href="{{route('profile.update-password.view')}}" class="profile-link-img-product">
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
            <form action="{{route('logout')}}" method="post">
                @method('POST')
                @csrf
                <a href="#" onclick="$(this).parent().submit()" class="profile-link-img-product">
                    <div class="profile-gallery-icon-container">
                        <div class="profile-gallery-logout-icon"></div>
                    </div>
                    <h3 class="profile-gallery-box-title">Выход</h3>
                </a>
            </form>
        </li>
    </ul>
@endsection
