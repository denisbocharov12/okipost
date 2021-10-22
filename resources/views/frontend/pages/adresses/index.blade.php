@extends('frontend.layouts.master')
@section('content')
    @if(Auth::guard('user')->check())
        <section class="section-standart section-point-adresses">
            <div class="container">
                <div class="row">
                    <div class="col-heading">
                        <div class="heading">
                            <h2>Наши адреса</h2>
                        </div>
                    </div>
                    <div class="col-12 col-adresses">
                        <div class="head">
                            <img src="{{asset('/frontend/assets/images/china.png')}}" alt="Китай">
                            <h3>Китай</h3>
                        </div>
                        <div class="wrap-content">
                            <div class="content-row">
                                <div class="content-block">
                                    <span class="detail">Name Surname:</span>
                                    <p class="value">{{auth()->guard('user')->user()->first_name}} {{auth()->guard('user')->user()->last_name}}</p>
                                </div>
                                <div class="content-block">
                                    <span class="detail">City:</span>
                                    <div class="value-wrap">
                                        <p class="value">Guangzhou City</p>
                                        <p class="value value-top">广州市</p>
                                    </div>
                                </div>
                            </div>
                            <div class="content-row">
                                <div class="content-block">
                                    <span class="detail">Address line 1:</span>
                                    <div class="value-wrap">
                                        <p class="value">Gangheng W/H  OKI - {{auth()->guard('user')->user()->code}}</p>
                                        <p class="value value-top">地址行1:港恒仓库 OKI - {{auth()->guard('user')->user()->code}}</p>
                                    </div>
                                </div>
                                <div class="content-block">
                                    <span class="detail">Province:</span>
                                    <div class="value-wrap">
                                        <p class="value">Guangdong Province</p>
                                        <p class="value value-top">广东省</p>
                                    </div>
                                </div>
                            </div>
                            <div class="content-row">
                                <div class="content-block">
                                    <span class="detail">Street:</span>
                                    <div class="value-wrap">
                                        <p class="value">8 Sanfeng Village Road, Huadong Town</p>
                                        <p class="value value-top">花东镇三凤村道8号</p>
                                    </div>
                                </div>
                                <div class="content-block">
                                    <span class="detail">ZIP code:</span>
                                    <p class="value">510890</p>
                                </div>
                            </div>
                            <div class="content-row">
                                <div class="content-block">
                                    <span class="detail">District:</span>
                                    <div class="value-wrap">
                                        <p class="value">Huadu District</p>
                                        <p class="value value-top">花都区</p>
                                    </div>
                                </div>
                                <div class="content-block">
                                    <span class="detail">Phone number:</span>
                                    <p class="value">14745406171</p>
                                </div>
                            </div>
                            <div class="content-row content-row-taobao">
                                <div class="content-block">
                                    <p>При покупке товаров на <a href="www.taobao.com" target="_blank">www.taobao.com</a>, пожалуйста указывайте адрес на китайском языке в строке Address line 1.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="section-standart section-point-adresses">
            <div class="container">
                <div class="row">
                    <div class="col-heading">
                        <div class="heading">
                            <h2>Наши адреса</h2>
                        </div>
                    </div>
                    <div class="col-12 col-adresses">
                        <div class="head">
                            <img src="{{asset('/frontend/assets/images/china.png')}}" alt="Китай">
                            <h3>Китай</h3>
                        </div>
                        <div class="wrap-content">
                            <div class="content-row">
                                <div class="content-block">
                                    <span class="detail">Name Surname:</span>
                                    <p class="value">Your name and surname</p>
                                </div>
                                <div class="content-block">
                                    <span class="detail">City:</span>
                                    <div class="value-wrap">
                                        <p class="value">Guangzhou City</p>
                                        <p class="value value-top">广州市</p>
                                    </div>
                                </div>
                            </div>
                            <div class="content-row">
                                <div class="content-block">
                                    <span class="detail">Address line 1:</span>
                                    <div class="value-wrap">
                                        <p class="value">Gangheng W/H  OKI - {код аккаунта}</p>
                                        <p class="value value-top">地址行1:港恒仓库 OKI - {код аккаунта}</p>
                                    </div>
                                </div>
                                <div class="content-block">
                                    <span class="detail">Province:</span>
                                    <div class="value-wrap">
                                        <p class="value">Guangdong Province</p>
                                        <p class="value value-top">广东省</p>
                                    </div>
                                </div>
                            </div>
                            <div class="content-row">
                                <div class="content-block">
                                    <span class="detail">Street:</span>
                                    <div class="value-wrap">
                                        <p class="value">8 Sanfeng Village Road, Huadong Town</p>
                                        <p class="value value-top">花东镇三凤村道8号</p>
                                    </div>
                                </div>
                                <div class="content-block">
                                    <span class="detail">ZIP code:</span>
                                    <p class="value">510890</p>
                                </div>
                            </div>
                            <div class="content-row">
                                <div class="content-block">
                                    <span class="detail">District:</span>
                                    <div class="value-wrap">
                                        <p class="value">Huadu District</p>
                                        <p class="value value-top">花都区</p>
                                    </div>
                                </div>
                                <div class="content-block">
                                    <span class="detail">Phone number:</span>
                                    <p class="value">14745406171</p>
                                </div>
                            </div>
                            <div class="content-row content-row-taobao">
                                <div class="content-block">
                                    <p>При покупке товаров на <a href="www.taobao.com" target="_blank">www.taobao.com</a>, пожалуйста указывайте адрес на китайском языке в строке Address line 1.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
