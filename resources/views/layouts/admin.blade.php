<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('admin/css/admin-style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style-right-dashboard.css') }}">
    @yield('custom_css')
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard Sidebar Menu</title> 
</head>
<!-- php инструкция cookie -->
<body class="{{ isset($_COOKIE['display_Mode'])? $_COOKIE['display_Mode'] : '' }}">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <!-- <span class="image">
                    <img src="images/logo.png" alt="">
                </span> -->
                <div class="image">
                    <a href="{{route('dashboard.index')}}"><img src="{{ asset('admin/images/logo_admin.png') }}" alt="NICI logo"></a>
                </div>
                <div class="text logo-text">
                    <span class="name">Admin</span>
                    <span class="profession">Dashboard</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <!-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li> -->

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{route('dashboard.index')}}">
                            <!-- <i class='bx bx-home-alt icon' ></i> -->
							<span class='icon'><div class='icon-dashboard'></div></span>
                            <span class="text nav-text">Главная</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('dashboard.order.index')}}">
                            <!-- <i class='bx bx-bar-chart-alt-2 icon' ></i> -->
							<span class='icon'><div class='icon-order'></div></span>
                            <span class="text nav-text">Заказы</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('dashboard.product.index')}}">
                            <!-- <i class='bx bx-bell icon'></i> -->
							<span class='icon'><div class='icon-product'></div></span>
                            <span class="text nav-text">Товары</span>
                        </a>
                    </li>
					
					<li class="nav-link">
                        <a href="{{route('dashboard.collection.index')}}">
                            <!-- <i class='bx bx-bell icon'></i> -->
							<span class='icon'><div class='icon-collection'></div></span>
                            <span class="text nav-text">Коллекции</span>
                        </a>
                    </li>
					
					<li class="nav-link">
                        <a href="{{route('dashboard.category.index')}}">
                            <!-- <i class='bx bx-bell icon'></i> -->
							<span class='icon'><div class='icon-category'></div></span>
                            <span class="text nav-text">Категории</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('dashboard.user.index')}}">
                            <!-- <i class='bx bx-pie-chart-alt icon' ></i> -->
							<span class='icon'><div class='icon-user'></div></span>
                            <span class="text nav-text">Пользователи</span>
                        </a>
                    </li>

                   <!--  <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li> 

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li> -->
					
					<li class="nav-link">
                        <a href="{{route('dashboard.subscription.index')}}">
                            <!-- <i class='bx bx-pie-chart-alt icon' ></i> -->
							<span class='icon'><div class='icon-subscribe'></div></span>
                            <span class="text nav-text">Рассылки</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <form action="{{route('logout')}}" id="adminLogoutForm" method="post">
                        @method('POST')
                        @csrf
                        <a href="#" onclick="document.getElementById('adminLogoutForm').submit()">
                            <!-- <i class='bx bx-log-out icon' ></i> -->
                            <span class='icon'><div class='icon-logout'></div></span>
                            <span class="text nav-text">Выйти</span>
                        </a>
                    </form>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <!-- <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i> -->
						<span class='icon'><div class='icon-moon'></div></span>
						<span class='icon'><div class='icon-sun'></div></span>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="dashboard">
        <!-- <div class="text">Dashboard Sidebar</div> -->

        <div class="top">
            <!-- <i class="uil uil-bars sidebar-toggle"></i> -->
            <div></div>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <!-- <input type="text" placeholder="Search here..."> -->
            </div>
            
            <img src="{{  Auth::user()?->picture? : asset('admin/images/profile.jpg') }}" alt="face">
        </div>

        <div class="dash-content">
            
        <!-- Здесь были overview и dash-content -->
        @yield('dashboard-content')

        </div>
    </section>

    <script src="{{ asset('admin/js/admin-script.js') }}" type="text/javascript"></script>
    @yield('custom_js')

</body>
</html>