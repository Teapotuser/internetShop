<aside class="left-side">
    <div class="profile-left-side">
        <div class="profile-details-box">
            <div class="profile-left-side-photo-container">
                <img src="/images/NICI/eule-profile3-trim.png" alt="Users photo">
            </div>
            <h3>{{Auth::user()?->name}} {{Auth::user()?->last_name}}</h3>
            <p>{{Auth::user()?->email}}</p>
        </div>
        <nav class="profile-left-side-links-box">
            <ul>
                <li>
                    <a href="{{route('profile.show')}}" class="profile-left-side-title-box @if(url()->current() == route('profile.show') ) active @endif">
                        <p>Главная</p>
                        <div class="button-right"></div>
                    </a>
                </li>
                <li>
                    <a href="{{route('profile.userdata.show')}}" class="profile-left-side-title-box @if(url()->current() == route('profile.userdata.show') ) active @endif">
                        <p>Личные данные</p>
                        <div class="button-right"></div>
                    </a>
                </li>
                <li>
                    <a href="" class="profile-left-side-title-box">
                        <p>История заказов</p>
                        <div class="button-right"></div>
                    </a>
                </li>
                <li>
                    <a href="{{route('profile.subscription.show')}}" class="profile-left-side-title-box @if(url()->current() == route('profile.subscription.show') ) active @endif">
                        <p>Подписка</p>
                        <div class="button-right"></div>
                    </a>
                </li>
                <li>
                    <a href="{{route('profile.update-password.view')}}" class="profile-left-side-title-box @if(url()->current() == route('profile.update-password.view') ) active @endif">
                        <p>Сменить пароль</p>
                        <div class="button-right"></div>
                    </a>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @method('POST')
                        @csrf
                        <a href="#" onclick="$(this).parent().submit()"
                           class="profile-left-side-title-box">
                            <p>Выход</p>
                            <div class="button-right"></div>
                        </a>
                    </form>

                </li>
            </ul>
        </nav>
    </div>
</aside>
