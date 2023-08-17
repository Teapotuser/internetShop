@extends('layouts.admin')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-index.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard-table.css') }}" type="text/css">
    @endsection  
@section('dashboard-content')
<div class="overview">
                <div class="title">
                    <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
                    <div class="title-rectangle-icon">
                        <div class="dasboard-icon"></div>
                    </div>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <a href="#" class="box box1">
                        <div class="box-text">
                            <!-- <i class="uil uil-thumbs-up"></i> -->
                            <span class="text">Всего заказов</span>
                            <span class="number">50,120</span>
                        </div>
                        <!-- <div class="box-icon-container"> -->
                            <div class="box-icon"></div>
                        <!-- </div> -->
                    </a>
                    <a href="#" class="box box2">
                        <div class="box-text">
                            <!-- <i class="uil uil-comments"></i> -->
                            <span class="text">Всего товаров</span>
                            <span class="number">20,120</span>
                        </div>
                        <div class="box-icon"></div>
                    </a>
                    <a href="#" class="box box3">
                        <div class="box-text">
                            <!-- <i class="uil uil-share"></i> -->
                            <span class="text">Всего коллекций</span>
                            <span class="number">10,120</span>
                        </div>
                        <div class="box-icon"></div>
                    </a>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <!-- <i class="uil uil-clock-three"></i> -->
                    <div class="title-rectangle-icon">
                        <div class="recent-icon"></div>
                    </div>
                    <span class="text">Последние заказы</span>
                </div>

                <!-- Таблица с данными Вадим-->
                <!-- Строка заголовков таблицы-->
                <div class="accounts-list">
                    <div class="accounts-head">
                        <p class="head-accounts">Номер</p>
                        <p class="head-currency">Currency</p>
                        <p class="head-reserved">Reserved</p>
                        <p class="head-available">Available balance</p>
                        <p class="head-actions">Действие</p>
                    </div>
                    <div class="account-rows">
                    <!-- Строки таблицы-->
                    <div class="account-card list"> <!--  list -->
                        <div class="account-card-item">
                            <p class="card-mobile-text">Номер</p>
                            <p class="account">HJGHG7676767</p>
                        </div>
                        <div class="account-card-item">
                            <p class="card-mobile-text">Currency</p>
                            <p class="account">EUR</p>
                        </div>
                        <div class="account-card-item">
                            <p class="card-mobile-text">Reserved</p>
                            <p class="account">Yes</p>
                        </div>
                        <div class="account-card-item">
                            <p class="card-mobile-text">Available balance</p>
                            <p class="account">7675.89</p>
                        </div>
                        <div class="account-card-item">
                            <p class="card-mobile-text">Действие</p>                            
                            <!-- <p class="account">HJGHG7</p> -->
                            <div class="account">
                                <div class="wrapper-icon">
                                    <a href="#" class="admin-action-ahref"><div class="btn-view"></div></a>
                                    <a href="#" class="admin-action-ahref"><div class="btn-edit"></div></a>
                                    <div class="main-cart-remove admin-action-ahref">
                                        <!--Remove cart-->
                                        <form action="" method="post" class="admin-form-delete">
                                            <button class="btn-delete" data-id="${id}"></button>
                                        </form>                                
                                    </div>     
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="account-card list"> <!--  list -->
                        <div class="account-card-item">
                            <p class="card-mobile-text">IBAN</p>
                            <p class="account">HJGHG7676767</p>
                        </div>
                        <div class="account-card-item">
                            <p class="card-mobile-text">Currency</p>
                            <p class="account">EUR</p>
                        </div>
                        <div class="account-card-item">
                            <p class="card-mobile-text">Reserved</p>
                            <p class="account">Yes</p>
                        </div>
                        <div class="account-card-item">
                            <p class="card-mobile-text">Available balance</p>
                            <p class="account">7675.89</p>
                        </div>
                        <div class="account-card-item">
                            <p class="card-mobile-text">Действие</p>                            
                            <!-- <p class="account">HJGHG7</p> -->
                            <div class="account">
                                <div class="wrapper-icon">
                                    <a href="#" class="admin-action-ahref"><div class="btn-view"></div></a>
                                    <a href="#" class="admin-action-ahref"><div class="btn-edit"></div></a>
                                    <div class="main-cart-remove admin-action-ahref">
                                        <!--Remove cart-->
                                        <form action="" method="post" class="admin-form-delete">
                                            <button class="btn-delete" data-id="${id}"></button>
                                        </form>                                
                                    </div>     
                                </div>                               
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <span class="data-list">Prem Shahi</span>
                        <span class="data-list">Deepa Chand</span>                                                
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <span class="data-list">premshahi@gmail.com</span>
                        <span class="data-list">deepachand@gmail.com</span>                                                
                    </div>
                    <div class="data joined">
                        <span class="data-title">Joined</span>
                        <span class="data-list">2022-02-12</span>
                        <span class="data-list">2022-02-12</span>                                                
                    </div>
                    <div class="data type">
                        <span class="data-title">Type</span>
                        <span class="data-list">New</span>
                        <span class="data-list">Member</span>                                        
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>                                              
                    </div>
                </div> -->
            </div>
@endsection