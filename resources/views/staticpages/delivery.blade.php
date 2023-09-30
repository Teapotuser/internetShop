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

                    <div class="services">
                        <div class="card">
                            <div class="icon">                            
                                <img class="" src="{{ asset('images/delivery/pickup.webp') }}">
                            </div>
                            <h2>Самовывоз</h2>
                            <p>Немецкий производитель игрушек NICI (основной ассортимент нашего товара) каждый год выпускает новые коллекции игрушек. На основании анализа сайта производителя игрушек и сайтов конкурентов было принято решение выделить на сайте левую панель для каталога товаров (коллекций игрушек).</p>
                        </div>
                        <div class="card">
                            <div class="icon">
                                <img class="" src="{{ asset('images/delivery/courier.png') }}">
                            </div>
                            <h2>Курьерская доставка</h2>
                            <p>Немецкий производитель игрушек NICI (основной ассортимент нашего товара) каждый год выпускает новые коллекции игрушек.</p>
                        </div>  
                    </div>
                    <div class="services">      
                        <div class="card">
                            <div class="icon">                            
                                <img class="" src="{{ asset('images/delivery/Belposhta_logo.jpg') }}">
                            </div>
                            <h2>Белпочта</h2>
                            <p>Немецкий производитель игрушек NICI (основной ассортимент нашего товара) каждый год выпускает новые коллекции игрушек. На основании анализа сайта производителя игрушек и сайтов конкурентов было принято решение выделить на сайте левую панель для каталога товаров (коллекций игрушек).</p>
                        </div>
                        <div class="card">
                            <div class="icon">
                                <img class="" src="{{ asset('images/delivery/evropochta.png') }}">
                            </div>
                            <h2>Европочта</h2>
                            <p>Немецкий производитель игрушек NICI (основной ассортимент нашего товара) каждый год выпускает новые коллекции игрушек.</p>
                        </div>                     
                    </div>

                    <div class="services">
                        <div class="card">
                            <div class="icon">                            
                                <img class="" src="{{ asset('images/delivery/cdek.png') }}">
                            </div>
                            <h2>Сдэк</h2>
                            <p>Немецкий производитель игрушек NICI (основной ассортимент нашего товара) каждый год выпускает новые коллекции игрушек. На основании анализа сайта производителя игрушек и сайтов конкурентов было принято решение выделить на сайте левую панель для каталога товаров (коллекций игрушек).</p>
                        </div>
                        <div class="card">
                            <div class="icon">
                                <img class="" src="{{ asset('images/delivery/boxberry.jpg') }}">
                            </div>
                            <h2>Boxberry</h2>
                            <p>Немецкий производитель игрушек NICI (основной ассортимент нашего товара) каждый год выпускает новые коллекции игрушек.</p>
                        </div>    
                        <div class="card">
                            <div class="icon">                            
                                <img class="" src="{{ asset('images/delivery/Belposhta_logo.jpg') }}">
                            </div>
                            <h2>Белпочта</h2>
                            <p>Немецкий производитель игрушек NICI (основной ассортимент нашего товара) каждый год выпускает новые коллекции игрушек. На основании анализа сайта производителя игрушек и сайтов конкурентов было принято решение выделить на сайте левую панель для каталога товаров (коллекций игрушек).</p>
                        </div>                                          
                    </div>
                </section> 
            </div> 
        </div>
    </main>   
@endsection            