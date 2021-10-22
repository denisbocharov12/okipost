@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    Hi, {{Auth()->guard('user')->user()->first_name}} - {{Auth()->guard('user')->user()->type}}!
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                            <br>
                            <div class="collapse navbar-collapse show" id="main_nav">
                                <ul class="navbar-nav">
                                    @if(Auth::guard('user')->check())
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> Привет, {{Auth::guard('user')->user()->full_name}}</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Category 1</a>
                                                <a class="dropdown-item" href="#">Category 2</a>
                                                <a class="dropdown-item" href="#">Category 3</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('user.profile')}}">Аккаунт</a>
                                                <a class="dropdown-item" href="{{route('user.logout')}}">Выйти</a>
                                            </div>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="{{route('user.auth')}}">Войти</a>
                                        </li>
                                    @endif
                                </ul>
                            </div> <!-- collapse .// -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
