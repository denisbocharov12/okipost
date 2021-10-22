<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Okipost Moldova - Регистрация</title>
    <meta name="description" content="Регистрация на сайте Okipost Moldova - почтовый сервис, осуществляющий доставку товаров из Китая, России, Америки, Турции, Германии, Англии, Грузии в Молдову." />
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">
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
    <div class="section section-auth">
        <div class="container p-0">
            <div class="row m-0">
                <div class="col-12 col-wrapper">
                    <div class="col-nav">
                        <div class="to-login">
                            <a href="{{route('user.login')}}"><i class="fa fa-arrow-left"></i> Войти в систему</a>
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
                        <div class="col-header">
                            <img src="{{asset('frontend')}}/assets/images/favicon.svg" alt="">
                        </div>
                        <div class="col-body">
                            <div id="tabs">
                                <div class="tab-block">
                                    <div class="tab active">Физическое лицо</div>
                                    <div class="tab">Юридическое лицо</div>
                                </div>
                                <div class="tabContent">
                                    <form id="form-fiz-submit" method="post" action="{{route('user.create-fiz')}}">
                                        @csrf
                                        <div class="form-content">
                                            <div class="left">
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('name_fiz') is-invalid @enderror" type="text" name="name_fiz" id="first_name_fiz" placeholder="Имя">
                                                    @error('name_fiz')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('surname_fiz') is-invalid @enderror" type="text" name="surname_fiz" id="last_name_fiz" placeholder="Фамилия">
                                                    @error('surname_fiz')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('user_id') is-invalid @enderror" type="text" name="user_id" id="user_id" placeholder="Ваш ID в паспорте">
                                                    @error('user_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form_toggle">
                                                    <div class="form_toggle-item item-1">
                                                        <input class="@error('gender_fiz') is-invalid @enderror" id="muj" value="1" type="radio" name="gender" checked>
                                                        <label for="muj">Мужчина</label>
                                                    </div>
                                                    <div class="form_toggle-item item-2">
                                                        <input class="@error('gender_fiz') is-invalid @enderror" id="jen" value="2" type="radio" name="gender">
                                                        <label for="jen">Женщина</label>
                                                    </div>
                                                </div>
                                                <div class="form-control form-control-direction">
                                                    <div class="ui-widget">
                                                        <label for="datep_fiz form-control-direction">Дата рождения: </label>
                                                        <input class="@error('date_fiz') is-invalid @enderror" id="date_fiz" name="date_fiz"/>
                                                    </div>
                                                    @error('date_fiz')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('country_fiz') is-invalid @enderror" type="text" value="Молдова" name="country_fiz" id="country_fiz" placeholder="Молдова">
                                                    @error('country_fiz')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('city_fiz') is-invalid @enderror" type="text" name="city_fiz" id="city_fiz" placeholder="Город">
                                                    @error('city_fiz')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('phone_fiz') is-invalid @enderror" type="text" name="phone_fiz" id="phone_fiz" placeholder="Мобильный телефон начиная с 373">
                                                    @error('phone_fiz')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-control form-control-direction">
                                                    <input type="email" class="@error('email_fiz') is-invalid @enderror" name="email_fiz" id="email_fiz" placeholder="Email">
                                                    @error('email_fiz')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-control form-password form-control-direction">
                                                    <a href="#" class="qu eye eye_fiz"><i class="fa fa-eye-slash"></i></a>
                                                    <input class="@error('password_fiz') is-invalid @enderror" class="password" type="password" name="password_fiz" id="password_fiz" placeholder="Пароль">
                                                    @error('password_fiz')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="center">
                                            <div class="form-control form-control-direction" style="text-align: center;">
                                                <div class="wrap">
                                                    <input type="checkbox" class="custom-checkbox" id="polic_fizy" name="rule_fiz" value="1">
                                                    <label for="policy_fiz">Я согласен с <a data-fancybox data-src="#rules-register-page" data-touch="false" href="javascript:;"> условиями использования </a></label>
                                                </div>
                                                @error('rule_fiz')
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="block-botton">
                                            <button id="form_submit_fiz" type="button" class="btn">Зарегистрироваться</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tabContent">
                                    <form id="form-iur-submit" method="post" action="{{route('user.create-iur')}}">
                                        @csrf
                                        <div class="form-content">
                                            <div class="left">
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('orgname') is-invalid @enderror" type="text" name="orgname" id="orgname" placeholder="Название организации">
                                                    @error('orgname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('orgid') is-invalid @enderror" type="text" name="orgid" id="orgid" placeholder="Идентификационный номер">
                                                    @error('orgid')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('orgmobile') is-invalid @enderror" type="text" name="orgmobile" id="orgmobile" placeholder="Мобильный телефон начиная с 373">
                                                    @error('orgmobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('country_iur') is-invalid @enderror" type="text" value="Молдова" name="country_iur" id="country_iur" placeholder="country">
                                                    @error('country_iur')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-control form-control-direction">
                                                    <input class="@error('city_iur') is-invalid @enderror" type="text" name="city_iur" id="city_iur" placeholder="Город">
                                                    @error('city_iur')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-control form-control-direction">
                                                    <input class="@error('email_iur') is-invalid @enderror" type="email" name="email_iur" id="email_iur" placeholder="Email">
                                                    @error('email_iur')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-control form-password form-control-direction">
                                                    <a href="#" class="qu eye eye_iur"><i class="fa fa-eye-slash"></i></a>
                                                    <input class="@error('password_iur') is-invalid @enderror" class="password" type="password" name="password_iur" id="password_iur" placeholder="Пароль">
                                                    @error('password_iur')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="center">
                                            <div class="form-control form-control-direction" style="text-align: center;">
                                                <div class="wrap">
                                                    <input type="checkbox" class="custom-checkbox" id="policy_iur" name="rule_iur" value="1">
                                                    <label for="policy_iur">Я согласен с <a data-fancybox data-src="#rules-register-page" data-touch="false" href="javascript:;"> условиями использования </a></label>
                                                </div>
                                                @error('rule_iur')
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="block-botton">
                                            <button id="form_submit_iur" type="button" class="btn">Зарегистрироваться</button>
                                        </div>
                                    </form>
                                </div>
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
                            <p><a data-fancybox data-src="#policy-register-page" data-touch="false" href="javascript:;"><i class="fa fa-copyright"></i> Политика конфиденциальности</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<footer>
    <div id="policy-register-page" class="policy-reg-auth-fancybox" style="display: none">
        @include('frontend.auth.policy')
    </div>
    <div id="rules-register-page" class="policy-reg-auth-fancybox" style="display: none">
        @include('frontend.rules')
    </div>
    <script src="{{asset('frontend')}}/assets/libs/jquery/jquery-3.6.0.min.js"></script>
    <script src="{{asset('frontend')}}/assets/libs/fancybox/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset('frontend')}}/assets/js/toastr.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/scripts.js"></script>
    <script>
        $(document).ready(function () {
            $('#form_submit_fiz').click(function () {
                Swal.fire({
                    title: 'Внимание',
                    text: "На указанный Email и Номер Телефона будет отправлена информация для активации аккаунта. Проверьте правильность введенной информации.",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Зарегистрироваться',
                    cancelButtonText: 'Отмена'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-fiz-submit').submit();
                    }
                })
            });
            $('#form_submit_iur').click(function () {
                Swal.fire({
                    title: 'Внимание',
                    text: "На указанный Email и Номер Телефона будет отправлена информация для активации аккаунта. Проверьте правильность введенной информации.",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Зарегистрироваться',
                    cancelButtonText: 'Отмена'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-iur-submit').submit();
                    }
                })
            });
        });
    </script>
    @toastr_render
</footer>
</body>
</html>
