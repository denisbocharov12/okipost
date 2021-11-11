@extends('frontend.layouts.master')
@section('content')
    <section class="section-standart section-search">
        <div class="container">
            <div class="row">
                <div class="col-12 col-search">
                    @if($package['done'] == 1)
                        <div class="wrap-searched">
{{--                            <span class="status">{{$package['track info']['status']}}</span>--}}
                            <div class="package-header">
                                <h1 style="margin-top: 5px">Посылка №{{$package['track info']['id']}}</h1>
                                <h2 style="margin-top: 5px">Пользователь: {{\App\Models\User::where('code','111572')->first()->first_name}} {{\App\Models\User::where('code','111572')->first()->last_name}} OKI-{{$package['track info']['user']}}</h2>

                            </div>
                            <div class="package-content">
                                <div class="date block-content">
                                    <p style="margin-top: 5px">Трэк отслеживания: {{$package['track info']['track']}}</p>
                                    <p style="margin-top: 5px">Дата декларирование: {{$package['track info']['dt']}}</p>
                                    <p style="margin-top: 5px">Дата прибытия: {{$package['track info']['data']}}</p>
                                </div>
                                <div class="block-content info">
                                    <p style="margin-top: 5px">Категория: {{$package['track info']['info']}}</p>
                                    <p style="margin-top: 5px">Url сайта: {{$package['track info']['url']}}</p>
                                </div>
                                <div class="block-content price">
                                    <p style="margin-top: 5px">Цена посылки: {{$package['track info']['price']}} {{$package['track info']['currency']}}</p>
                                    <p style="margin-top: 5px">Стоймость транспортировки: {{$package['track info']['usd_shipping_price']}} {{$package['track info']['currency']}}</p>
                                    <p style="margin-top: 5px">Способ доставки:
                                        @if($package['track info']['delivery_method'] == 1)
                                            Главный офис
                                        @else
                                            Доставка курьером
                                        @endif
                                    </p>
                                </div>
                                <div class="block-content from-to">
                                    <p style="margin-top: 5px">Страна отправления:
                                        @if($package['track info']['f_from'] == 'china')
                                            Китай
                                        @elseif($package['track info']['f_from'] == 'usa')
                                            Америка
                                        @elseif($package['track info']['f_from'] == 'germany')
                                            Германия
                                        @elseif($package['track info']['f_from'] == 'turkey')
                                            Турция
                                        @endif
                                    </p>
                                    <p style="margin-top: 5px">Вес: {{$package['track info']['ves']}} кг</p>
                                </div>
                                <div class="block-content comment">
                                    <p style="margin-top: 5px">Комментарий к посылке: {{$package['track info']['comments']}}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="wrap-no-to-search">
                            <img src="{{asset('/frontend/assets/images/not-to-search.svg')}}" alt="Ничего не найдено">
                            <h1>Ничего не найдено</h1>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
