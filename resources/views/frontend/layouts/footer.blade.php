<footer id="footer-site">
    <div id="policy-page" class="fancybox-modal-content" style="display: none">
        @include('frontend.auth.policy')
    </div>
    @yield('footer-content')
    <section class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-12 col-footer-logo">
                    <a class="logo" href="#">
                        <img src="{{asset('frontend')}}/assets/images/logo-okipost-white.svg" alt="">
                    </a>
                    <p>OkiPost Moldova - почтовый сервис, осуществляющий доставку товаров из Китая, России, Америки, Турции, Германии, Англии, Грузии в Молдову.</p>
                </div>
                <div class="col-md-3 col-12 col-footer-menu">
                    <ul class="footer-menu footer-menu-one">
                        <li class="item"><a href="#">Тарифы</a></li>
                        <li class="item"><a href="{{route('main')}}">Калькулятор</a></li>
                        <li class="item"><a href="{{route('adresses')}}">Адреса</a></li>
                        <li class="item"><a href="#">О нас</a></li>
                        <li class="item"><a href="{{route('contacts')}}">Контакты</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-12 col-footer-menu">
                    <ul class="footer-menu">
                        <li class="item"><a href="{{route('user.auth')}}">Мой аккаунт</a></li>
                        <li class="item"><a href="{{route('faq')}}">FAQ</a></li>
                        <li class="item"><a href="{{route('shops')}}">Список магазинов</a></li>
                        <li class="item"><a href="#">Инструкции</a></li>
                        <li class="item"><a data-fancybox data-src="#policy-page" data-touch="false" href="javascript:;">Политика конфиденциальности</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-12 col-footer-newsletter">
                    <div class="block-social">
                        <a class="social-item" href="https://www.instagram.com/okipost_moldova/" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a class="social-item" href="https://www.facebook.com/okipostmd" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="social-item" href="#">
                            <i class="fa fa-telegram"></i>
                        </a>
                        <a class="social-item" href="#">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </div>
                    <div class="form-newsletter">
                        <p>Будь в курсе самых свежих новостей!</p>
                        <form action="#">
                            <input type="email" placeholder="Email" class="form-control" id="email" name="newsletter_email">
                            <button class="btn-okipost">Подписаться</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.layouts.script')
</footer>
