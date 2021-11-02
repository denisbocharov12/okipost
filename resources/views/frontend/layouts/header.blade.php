<header id="header">
    <section class="section section-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-5 col-sm-4 col-md-3 col-lg-2 col-logo">
                    <div class="logo-block">
                        <a href="/">
                            <img src="{{asset('frontend')}}/assets/images/logo-color.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-7 col-sm-8 col-md-9 col-lg-10 col-account col-search col-mobile-menu">
                    <div class="search-block">
                        <form class="search-form-nav" action="{{route('search')}}" method="GET">
                            <input type="text" name="search" class="search search-relative" id="search" placeholder="Найти посылку">
                            <button type="submit" class="btn-relative">
                                <i class="icon-loupe"></i>
                            </button>
                        </form>
                    </div>
                    <div class="account-block">
                        @if(Auth::guard('user')->check())
                            <a href="{{route('user.dashboard')}}" class="login"><i class="icon-user"></i>{{Auth::guard('user')->user()->first_name}} {{Auth::guard('user')->user()->last_name}}</a>
                            <ul class="dropdown">
                                <li>
                                    <a href="{{route('add.package')}}">
                                        Добавить посылку
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('user.dashboard')}}">
                                        Мои посылки
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Оплаты
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('adresses')}}">
                                        Адреса
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Пополнение баланса
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('user.logout')}}">
                                        Выйти
                                    </a>
                                </li>
                            </ul>
                        @else
                            <a href="{{route('user.login')}}" class="login"><i class="icon-user"></i>Войти</a>
                        @endif
                    </div>
                    <div class="main-menu">
                        <div class="menu-icon">
                            <i class="icon-menu"></i>
                        </div>
                    </div>
                    <div class="select-language">
                            <span id="current-language" class="language-picker-btn">
                                <img src="{{asset('frontend')}}/assets/images/{{LaravelLocalization::getCurrentLocale()}}.svg" alt=""> {{LaravelLocalization::getCurrentLocaleName()}} <i class="fa fa-chevron-down" id="language-arrow"></i>
                            </span>
                        <ul class="dropdown" id="ul-languages">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if($localeCode == LaravelLocalization::getCurrentLocale())

                                @elseif($url = LaravelLocalization::getLocalizedURL($localeCode))
                                    <li>
                                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><img src="{{asset('frontend')}}/assets/images/{{$localeCode}}.svg" alt="">{{$properties['native']}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <span class="hamburger" id="hamburger-open"><i class="icon-menu"></i></span>
                    <nav class="nav-drill" id="nav-drill">
                        <div class="main-wrap-menu-mobile">
                            <div class="menu-close menu-mobile-account">
                                @if(Auth::guard('user')->check())
                                    <div class="mobile-user">
                                        <a href="#">
                                            <i class="icon-user"></i>
                                            <div class="block-mobile-user">
                                                <div class="name">
                                                    {{auth()->guard('user')->user()->first_name}} {{auth()->guard('user')->user()->last_name}}
                                                </div>
                                                <div class="balance">
                                                    {{auth()->guard('user')->user()->money}} MDL
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                <span class="hamburger hamburger-close" id="hamburger-close"><i class="icon-cancel"></i></span>
                            </div>
                            <div class="search-mobile">
                                <div class="search-block">
                                    <form action="{{route('search')}}" method="GET">
                                        <input type="text" name="search" class="search" id="search_mobile" placeholder="Найти посылку">
                                        <button type="submit">
                                            <i class="icon-loupe"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <ul class="nav-items nav-level-1">
                                @if(Auth::guard('user')->check())
                                    <li class="nav-item nav-expand">
                                        <a class="nav-link nav-expand-link" href="#">
                                            Мой аккаунт
                                        </a>
                                        <ul class="nav-items nav-expand-content">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('add.package')}}">
                                                    Добавить посылку
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('user.dashboard')}}">
                                                    Мои посылки
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    Оплаты
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('adresses')}}">
                                                    Адреса
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    Пополнение баланса
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('user.logout')}}">
                                                    Выйти
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Тарифы
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('shops')}}">
                                        Магазины
                                    </a>
                                </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('adresses')}}">
                                            Адреса
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('cargo')}}">
                                            OkiLogistic
                                        </a>
                                    </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('faq')}}">
                                        FAQ
                                    </a>
                                </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('aboutus')}}">
                                            О компании
                                        </a>
                                    </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('contacts')}}">
                                        Контакты
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="select-language-mobile">
                            <ul class="dropdown" id="ul-languages-mobile">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    @if($localeCode == LaravelLocalization::getCurrentLocale())

                                    @elseif($url = LaravelLocalization::getLocalizedURL($localeCode))
                                        <li>
                                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><img src="{{asset('frontend')}}/assets/images/{{$localeCode}}.svg" alt="">{{$properties['native']}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            @include('frontend.layouts.nav')
        </div>
    </section>
</header>
