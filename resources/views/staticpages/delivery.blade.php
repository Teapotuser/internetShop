@extends('layouts.master')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('css/order-form-new.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/delivery.css') }}" type="text/css">    
    
@endsection
@section('content')
    <main>
        <div class="wrapper">   
           
            <div class="shop-wrapper">               
                <!-- левая панель -->                
                <section class="right-side"> <!-- Правая галерея товаров -->                               
                    <h2 class="section-header">Доставка</h2>

                    <div class="services">
                        <div class="card">
                            <div class="icon">
            
                            </div>
                            <h2>Самовывоз</h2>
                            <p>Немецкий производитель игрушек NICI (основной ассортимент нашего товара) каждый год выпускает новые коллекции игрушек. На основании анализа сайта производителя игрушек и сайтов конкурентов было принято решение выделить на сайте левую панель для каталога товаров (коллекций игрушек).</p>
                        </div>
                        <div class="card">
                            <div class="icon">
            
                            </div>
                            <h2>Курьерская доставка</h2>
                            <p>Немецкий производитель игрушек NICI (основной ассортимент нашего товара) каждый год выпускает новые коллекции игрушек.</p>
                        </div>                        
                    </div>
                </section> 
            </div> 
        </div>
    </main>   
@endsection            