
<div class="nav">
    <div class="nav__content">
        <div class="container-fluid container-nav p-5">
            <div class="row row-primary">
                <div class="col-6 col-logo">
                    <a href="/">
                        <img src="{{asset('frontend')}}/assets/images/logo-okipost-color-white.svg" alt="Okipost Moldova">
                    </a>
                </div>
                <div class="col-6 col-exit">
                    <div class="menu-icon-open">
                        <button id="open-nav-exit">
                            <i class="icon-cancel"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row row-menus">
                <div class="col-3 col-menu-nav">
                    <div class="menu-block">
                        <h4>Компания</h4>
                        <ul class="menu-ul">
                            <li class="item"><a href="#" class="link link-primary">О Компании</a></li>
                            <li class="item"><a href="{{route('faq')}}" class="link">FAQ</a></li>
                            <li class="item"><a href="{{route('contacts')}}" class="link">Контакты</a></li>
                            <li class="item"><a href="#" class="link">Правила и условия</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-3 col-menu-nav">
                    <div class="menu-block">
                        <h4>Страны</h4>
                        <ul class="menu-ul">
                            <li class="item"><a href="{{route('adresses')}}" class="link">Китай</a></li>
                            <li class="item"><a href="#" class="link disabled">Америка <span class="span-disabled">скоро</span></a></li>
                            <li class="item"><a href="#" class="link disabled">Турция <span class="span-disabled">скоро</span></a></li>
                            <li class="item"><a href="#" class="link disabled">Германия <span class="span-disabled">скоро</span></a></li>
                            <li class="item"><a href="#" class="link disabled">Англия <span class="span-disabled">скоро</span></a></li>
                            <li class="item"><a href="{{route('adresses')}}" class="link">Все страны</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-3 col-menu-nav">
                    <div class="menu-block">
                        <h4>Услуги</h4>
                        <ul class="menu-ul">
                            <li class="item"><a href="#" class="link link-primary">Тарифы</a></li>
                            <li class="item"><a href="{{route('adresses')}}" class="link">Адреса</a></li>
                            <li class="item"><a href="{{route('shops')}}" class="link link-color">Список магазинов</a></li>
                            <li class="item"><a href="{{route('cargo')}}" class="link">Логистика</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-3 col-menu-nav">
                    <div class="menu-block">
                        <h4>Личный кабинет</h4>
                        @if(Auth::guard('user')->check())
                            <ul class="menu-ul">
                                <li class="item"><a href="#" class="link link-primary">Тарифы</a></li>
                                <li class="item"><a href="#" class="link link-color">Магазины</a></li>
                                <li class="item"><a href="{{route('cargo')}}" class="link">OkiLogistic</a></li>
                                <li class="item"><a href="{{route('faq')}}" class="link">FAQ</a></li>
                                <li class="item"><a href="{{route('contacts')}}" class="link">Контакты</a></li>
                            </ul>
                        @else
                            <ul class="menu-ul">
                                <li class="item"><a href="#" class="link link-pink">Регистрация</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row row-details">
                <div class="col-12 col-head">
                    <h2>Заказывайте по всему миру</h2>
                </div>
                <div class="col-3 col-product-item">
                    <a target="_blank" class="product-wrap" href="https://ru.ebay.com/">
                        <span class="product-site">Ebay</span>
                        <img src="{{asset('frontend')}}/assets/images/products/ebay-apple-watch.jpg" alt="Ebay">
                    </a>
                </div>
                <div class="col-3 col-product-item">
                    <a target="_blank" class="product-wrap" href="https://www.zara.com/ru/ru/zhenshchiny-sumki-l1024.html?v1=1883235&page=2">
                        <span class="product-site">Zara</span>
                        <img src="{{asset('frontend')}}/assets/images/products/zara.jpg" alt="Zara">
                    </a>
                </div>
                <div class="col-3 col-product-item">
                    <a target="_blank" class="product-wrap" href="https://www.trendyol.com/la-roche-posay/effaclar-duo-bakim-kremi-cilt-kusuru-gorunumu-karsiti-akneye-egilim-gosteren-ciltler-40-ml-p-2368487?boutiqueId=583149&merchantId=104937">
                        <span class="product-site">Trendyol</span>
                        <img src="{{asset('frontend')}}/assets/images/products/trendyol.jpg" alt="Trendyol">
                    </a>
                </div>
                <div class="col-3 col-product-item">
                    <a target="_blank" class="product-wrap" href="https://aliexpress.ru/item/1005003125339942.html?spm=a2g0o.productlist.0.0.13794baf9H6xbg&s=p&ad_pvid=202109281752207435997459983360027019331_5&algo_pvid=6b7ce541-8c3d-40bf-94a0-23fe5dc72d77&algo_expid=6b7ce541-8c3d-40bf-94a0-23fe5dc72d77-4&btsid=0b8b15f516328767405995043ec3b9&ws_ab_test=searchweb0_0,searchweb201602_,searchweb201603_">
                        <span class="product-site">Aliexpress</span>
                        <img src="{{asset('frontend')}}/assets/images/products/aliexpress.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
