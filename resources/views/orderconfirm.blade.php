@extends('layouts.master')
@section('custom_css')
    <link rel="stylesheet" href="{{asset('css/order-confirm.css')}}">
    <link rel="stylesheet" href="{{asset('css/order-form-new.css')}}">
@endsection
@section('content')
    <main>
        <div class="wrapper">
            <div class="shop-wrapper">
                <!-- левая панель -->
                <section class="right-side">
                    <!-- Правая галерея товаров -->
                    <h2 class="section-header">Подтверждение оформления заказа</h2>
                    <!--  Форма адреса -->
                    <div class="order-placed-container">
                        <div class="order-placed-card">
                            <div class="icon-container">
                                <div class="circle"></div>
                                <div class="icon-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         version="1.1" x="0px" y="0px" viewBox="0 0 100 100"
                                         style="enable-background:new 0 0 100 100;" xml:space="preserve" class="icon"><path
                                            d="M95.5509872,17.8440819c-2.5986938-2.5986881-6.8119583-2.5986881-9.4107132-0.0000648L35.9452019,68.0378723  l-22.085495-22.0844002c-2.5986881-2.5986252-6.8119555-2.5985603-9.4106426,0.0001259  c-2.5987515,2.5987549-2.5987515,6.8120842,0,9.4107742L31.2398472,82.15522  c1.2985706,1.2998581,3.0026379,1.9497223,4.7053547,1.9497223c1.7027779,0,3.4068451-0.6498642,4.7053528-1.9497223  l54.9004326-54.9004288C98.1496735,24.6561012,98.1496735,20.4427681,95.5509872,17.8440819z"
                                            fill="#ffffff"></path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="title">Ваш заказ №<span>{{$order->id}}</span> принят!</h3>
                            <p class="message">Благодарим за заказ!</p>
                            @if($create_account)
                                <p class="message">Вы успешно зарегистрированы. Доступ к личному кабинету, пароль, а
                                    также информацию о
                                    заказе мы отправили на вашу почту <span>{{$order->email}}</span>.</p>
                            @else
                                <p class="message">Данные заказа мы отправили на вашу почту <br>
                                    <span>{{$order->email}}</span>.
                                </p>
                            @endif
                            <p class="message bottom-margin">В ближайшие 24 часа с вами свяжется менеджер магазина для
                                уточнения деталей. Статус выполнения заказа вы можете отслеживать в личном кабинете.</p>
                            <div class="order-placed-table-title">Детали заказа</div>
                            <div class="details-container">
                                <div class="order-detail">
                                    <p class="label">Номер заказа:</p>
                                    <p class="data">{{$order->id}}</p>
                                </div>
                                <div class="order-detail">
                                    <p class="label">Итого:</p>
                                    <p class="data">
                                        <span>{{$order->orderPrice()}}</span><span> р.</span></p>
                                </div>
                                <div class="order-detail">
                                    <p class="label">Доставка:</p>
                                    <p class="data">{{match ( $order->delivery_method ){
                                                                "post"=>"Адресная доставка",
                                                                "pickup"=>"Самовывоз",
                                                                default=> $order->delivery_method
                                                                }
                                                       }}
                                    </p>
                                </div>
                                <div class="order-detail">
                                    <p class="label">Способ оплаты:</p>
                                    <p class="data">{{match ( $order->payment_method ){
                                                           "cash"=>"Наличными",
                                                           "card"=>"Кредитной картой",
                                                           default=> $order->payment_method
                                                       }
                                                     }}
                                    </p>
                                </div>
                            </div>
                            <div class="order-confirm-img-container">
                                <img class="" src="{{asset('images/NICI/shopping_cart_with_bags_lion_einhorn.png')}}">
                            </div>
                            <a href="/" class="btn-buy">Продолжить покупки</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection