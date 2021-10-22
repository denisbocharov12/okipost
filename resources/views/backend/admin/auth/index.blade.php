<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('/backend/assets')}}/images/favicon.png">
    <!-- Page Title  -->
    <title>Dasboard</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('/backend')}}/assets/css/dashlite.css?ver=2.4.0">
    <link rel="stylesheet" href="{{asset('/backend')}}/assets/css/theme.css?ver=2.4.0">
</head>

<body class="nk-body bg-white npc-default pg-auth no-touch nk-nio-theme">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-split nk-split-page nk-split-md">
                    <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                        <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                            <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                        </div>
                        <div class="nk-block nk-block-middle nk-auth-body">
                            <div class="brand-logo pb-3">
                                <a href="/" class="logo-link" style="display: block">
                                    <img style="width: 60%;" class="" src="{{asset('frontend')}}/assets/images/logo-color.svg" alt="logo-dark">
                                </a>
                            </div>
                            <div class="nk-block-head p-0">
                                <div class="nk-block-head-content">
                                    @if (Session::has('error_login'))
                                        <div class="nk-block-des text-danger">
                                            <p>{{ Session::get('error_login') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- .nk-block-head -->
                            <form action="{{route('admin.auth')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Email</label>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" class="form-control">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div><!-- .foem-group -->
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Пароль</label>
                                        <a class="link link-primary link-sm" tabindex="-1" href="#">Забыли пароль?</a>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input id="password" type="password" placeholder="Пароль" name="password" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror" >
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div><!-- .foem-group -->
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Войти</button>
                                </div>
                            </form><!-- form -->
                        </div><!-- .nk-block -->
                        <div class="nk-block nk-auth-footer">
                            <div class="nk-block-between">
                                <ul class="nav nav-sm">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Terms &amp; Condition</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Help</a>
                                    </li>
                                    <li class="nav-item dropup active current-page">
                                        <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><small>{{LaravelLocalization::getCurrentLocaleName()}}</small></a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="language-list">
                                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                    @if($url = LaravelLocalization::getLocalizedURL($localeCode))
                                                        <li>
                                                            <a class="language-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><img style="width: 20px;margin-right: 20px;" src="{{asset('frontend')}}/assets/images/{{$localeCode}}.svg" alt="">{{$properties['native']}}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                </ul><!-- .nav -->
                            </div>
                            <div class="mt-3">
                                <p>© 2021 Okipost Moldova. All Rights Reserved.</p>
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .nk-split-content -->
                    <div class="nk-split-content nk-split-stretch bg-abstract"></div><!-- .nk-split-content -->
                </div><!-- .nk-split -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{asset('/backend')}}/assets/js/bundle.js?ver=2.4.0"></script>
<script src="{{asset('/backend')}}/assets/js/scripts.js?ver=2.4.0"></script>
@toastr_render
</body></html>
