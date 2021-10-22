<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Okipost Moldova - Авторизация</title>
    <meta name="description" content="Авторизация на сайте Okipost Mokdova - почтовый сервис, осуществляющий доставку товаров из Китая, России, Америки, Турции, Германии, Англии, Грузии в Молдову." />
    <meta name="keywords" content="Доставка, Почта, Посылки, Китай, Логистика" />
    <!-- Font - Montserrat-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- End Font -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('frontend')}}/assets/images/favicon.ico" type="image/x-icon">
    <!-- End Favicon -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/libs/bootstrap/bootstrap-grid.min.css">
    <!-- End Bootstrap -->
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/libs/fancybox/jquery.fancybox.min.css">
    <!-- End Fancybox -->
    <!-- FontAwesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- End  FontAwesome-->
    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- End Datepicker -->
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/style.css">
    <!-- End Styles -->
</head>
<body>
<main>
    <div class="section section-login">
        <div class="container p-0">
            <div class="row m-0">
                <div class="col-12 col-wrapper">
                    <div class="col-nav">
                        <div class="to-register">
                            <a href="{{route('user.register')}}">Регистрация <i class="fa fa-arrow-right"></i></a>
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
                    </div>
                    <div class="col-content">
                        <div class="col-body">
                            <div class="col-header">
                                <img src="{{asset('frontend')}}/assets/images/favicon.svg" alt="">
                            </div>
                            <div class="form-login">
                                <form method="POST" action="{{route('user.auth')}}" class="login-form">
                                    @csrf
                                    <div class="form-control form-control-direction">
                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-control form-password form-control-direction">
                                        <a href="{{route('reset.password')}}" class="forgot-password forgot-password-desc">Забыли пароль?</a>
                                        <a href="#" class="qu eye eye_login"><i class="fa fa-eye-slash"></i></a>
                                        <input class="password @error('password') is-invalid @enderror" type="password" name="password" id="password_login" type="password" required autocomplete="current-password" placeholder="Пароль">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <a href="{{route('reset.password')}}" class="forgot-password-mobile">Забыли пароль?</a>
                                    <div class="block-botton">
                                        <button id="form_submit" type="submit" class="btn">Войти</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-home-fixed">
            <a href="{{ url('/') }}" class="btn-home">Главная</a>
        </div>
        <div id="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="block_all_rights">
                            <p><a data-fancybox data-src="#policy-auth-page" data-touch="false" href="javascript:;" ><i class="fa fa-copyright"></i> Политика конфиденциальности</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer-fancybox">
    <div id="policy-auth-page" class="policy-reg-auth-fancybox" style="display: none">
        @include('frontend.auth.policy')
    </div>
    <script src="{{asset('frontend')}}/assets/libs/jquery/jquery-3.6.0.min.js"></script>
    <script src="{{asset('frontend')}}/assets/libs/fancybox/jquery.fancybox.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset('frontend')}}/assets/js/toastr.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/scripts.js"></script>
    @toastr_render
</footer>
</body>
</html>
