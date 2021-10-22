@extends('frontend.layouts.master')
@section('title', 'OkipostMD - Активация аккаунта')
@section('content')
    <section class="section-standart section-activate">
        <div class="container">
            <div class="row justify-content-center row-activate">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h4>Активация аккаунта</h4></div>
                        <div class="card-body">
                            <form method="POST" action="{{route('activate.account')}}">
                                @csrf
                                <input type="hidden" name="token" value="{{$token}}">
                                <input id="code" type="hidden" class="form-control @error('email') is-invalid @enderror" name="code" value="{{$user_code}}">
                                <div class="form-group row">
                                    <div class="col-input-sms">
                                        <input id="sms" type="number" name="sms" placeholder="Активационный код из смс">
                                        @error('sms')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="wrap-btn-sms">
                                        <button type="submit">
                                            Activate Account
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-activate-advantages">
                <div class="col-6 col-md-6 col-lg-3 activate-item">
                    <img src="{{asset('frontend')}}/assets/images/personal-account.svg" alt="">
                    <h4>Личный кабинет пользователя с возможностью управления доставкой</h4>
                </div>
                <div class="col-6 col-md-6 col-lg-3 activate-item">
                    <img src="{{asset('frontend')}}/assets/images/bonus.svg" alt="">
                    <h4>Онлайн-кошелек пользователя с бонусной системой Okipost</h4>
                </div>
                <div class="col-6 col-md-6 col-lg-3 activate-item">
                    <img src="{{asset('frontend')}}/assets/images/status.svg" alt="">
                    <h4>Отслеживание статуса посылки и доставки</h4>
                </div>
                <div class="col-6 col-md-6 col-lg-3 activate-item">
                    <img src="{{asset('frontend')}}/assets/images/courier.svg" alt="">
                    <h4>Курьерская доставка в любую точку Молдовы</h4>
                </div>
            </div>
        </div>
    </section>

@endsection
