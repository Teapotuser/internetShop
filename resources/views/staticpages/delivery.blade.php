@extends('layouts.master')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/delivery.css') }}" type="text/css">    
    
@endsection
@section('content')
    <main>
        <div class="wrapper">   
           <!-- Хлебные крошки -->
           <nav class="breadcrumbs-panel">
                <ul class="breadcrumbs-list">
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link">
                            <!-- <span class="breadcrumb-title">Главная</span> -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" x="0px" y="0px"><g data-name="Layer 1"><path d="M17.6,6.2l-8-6A1,1,0,0,0,8.4.2l-8,6A1,1,0,0,0,1.6,7.8L2,7.5V15a1,1,0,0,0,1,1H15a1,1,0,0,0,1-1V7.5l.4.3a1,1,0,0,0,1.2-1.6ZM8,14V10h2v4Zm6-8v8H12V9a1,1,0,0,0-1-1H7A1,1,0,0,0,6,9v5H4V6H4L9,2.25,14,6Z" fill="#484848"/></g></svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link">
                            <span class="breadcrumb-title">Доставка и оплата</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <!-- <a href="#" class="breadcrumb-link breadcrumb-link--active"> -->
                            <span class="breadcrumb-title breadcrumb-title--active">Доставка</span>
                        <!-- </a> -->
                    </li>
                </ul>
           </nav>
            <div class="shop-wrapper">               
                <!-- левая панель -->                
                <section class="right-side"> <!-- Правая галерея товаров -->                               
                    <h2 class="section-header">Доставка</h2>

                    <h3> Доставка по Беларуси</h3>
                    <div class="services">
                        <div class="card">
                            <div class="icon">                            
                                <img class="" src="{{ asset('images/delivery/pickup.png') }}">
                            </div>
                            <h2>Самовывоз</h2>
                            <p>	Вы можете самостоятельно забрать свой заказ в нашем пункте получения заказов.
                            <!-- <p>Получить заказ в этих пунктах вы можете только после оповещения о готовности к получению в виде СМС, электронного письма или нашего звонка.</p> -->
                            <!-- <p>Срок хранения заказа в пункте выдачи 10 календарных дней. </p> -->
                            <p>Адрес: г. Минск, ул. Уманская, д. 54, <br> ТЦ "ГЛОБО", пав. 137</p>
                            <p>Время работы: по будням с 11:00 до 19:00, <br>выходные: Сб: 11.00 - 18.00 Вс: 11.00 - 17.00</p>
                        </div>
                        <div class="card">
                            <div class="icon">
                                <img class="" src="{{ asset('images/delivery/courier.png') }}">
                            </div>
                            <h2>Курьерская доставка</h2>
                            <p>Действует курьерская доставка по г. Минску.</p>
                            <p>Доставляем заказы с 14:00 до 21:00 в будние дни.</p>
                            <p>Бесплатно для заказов от 30 рублей, для заказов меньшей стоимостью — 5 рублей.</p>
                        </div>  
                    </div>
                    <div class="services">      
                        <div class="card">
                            <div class="icon">                            
                                <img class="" src="{{ asset('images/delivery/Belposhta_logo-1.png') }}">
                            </div>
                            <h2>Белпочта</h2>
                            <p>Стоимость доставки почтой рассчитывается по тарифам  РУП «Белпочта». Стоимость доставки рассчитывается на сайте www.belpost.by. </p>
                            <p>Стоимость доставки при предоплате (ЕРИП, карта)</p>
                            <p>до 50 рублей - 3,60 руб
                            <br>
                            от 50 и выше - бесплатно.</p>
                        </div>
                        <div class="card">
                            <div class="icon">
                                <img class="" src="{{ asset('images/delivery/evropochta.png') }}">
                            </div>
                            <h2>Европочта</h2>
                            <p>Доставка в регионы Беларуси с помощью сервиса «Европочта».<p>
                            <p>Срок доставки от 1 до 3 рабочих дней. Максимальный вес посылки — 30 кг.</p>
                            <p>Список городов насчитывает более 100, их перечень опубликован на сайте «Европочты» и постоянно расширяется.</p>
                        </div>                     
                    </div>

                    <h3>Международная доставка</h3>
                    <div class="services international">
                        <div class="card">
                            <div class="icon">                            
                                <img class="" src="{{ asset('images/delivery/sdek.png') }}">
                            </div>
                            <h2>Сдэк</h2>
                            <p>Отправка заказа курьерской службой "СДЭК" в любую точку мира на указанный после оформления заказа и полной оплаты адрес или пункт самовывоза СДЭК.</p>
                            <p>Стоимость международной пересылки рассчитывается индивидуально по тарифам компании СДЭК.</p>
                        </div>
                        <div class="card">
                            <div class="icon">
                                <img class="" src="{{ asset('images/delivery/boxberry-1.png') }}">
                            </div>
                            <h2>Boxberry</h2>
                            <p>Через сервис "Boxberry" доступна доставка заказов покупателям из России, Казахстана, Киргизии и Армении.</p>
                            <p>Доставка заказов из Беларуси в Москву стоит 338 ₽ рублей за первый килограмм, а за каждый последующий кг нужно доплатить 49 ₽ рублей.</p>
                            <!-- <p>Доставка из Минска в страны СНГ начинается от 477 ₽ рублей за первый килограмм.</p> -->
                        </div>    
                        <div class="card">
                            <div class="icon">                            
                                <img class="" src="{{ asset('images/delivery/Belposhta_logo-1.png') }}">
                            </div>
                            <h2>Белпочта</h2>
                            <p>Доставка за пределы Республики Беларусь осуществляется РУП «Белпочта» до ближайшего удобного вам почтового отделения.</p>
                            <p>В зависимости от места назначения Товар доставляется в течение 15 рабочих дней.</p>
                            <p>Цена отправления будет рассчитана индивидуально.</p>
                            <!-- <p>При подтверждении заказа наш менеджер сообщит Вам итоговую стоимость. </p> -->
                        </div>                                          
                    </div>
                </section> 
            </div> 
        </div>
    </main>   
@endsection            