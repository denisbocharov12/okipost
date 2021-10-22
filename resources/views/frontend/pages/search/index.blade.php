@extends('frontend.layouts.master')
@section('content')
    <section class="section-standart section-search">
        <div class="container">
            <div class="row">
                <div class="col-12 col-search">
                    @if($package['done'] == 1)
                        <div class="wrap-searched">
                            <span class="status">{{$package['track info']['status']}}</span>
                            <div class="package-header">
                                <h1>Посылка №{{$package['track info']['id']}}</h1>
                                <h2>Пользователь OKI-{{$package['track info']['user']}}</h2>
                            </div>
                            <div class="package-content">
                                <div class="date block-content">
                                    <p>Трэк отслеживания: {{$package['track info']['track']}}</p>
                                    <p>Дата создания: {{$package['track info']['dt']}}</p>
                                    <p>Дата прибытия: {{$package['track info']['data']}}</p>
                                </div>
                                <div class="block-content info">
                                    <p>Категория: {{$package['track info']['info']}}</p>
                                    <p>Url сайта: {{$package['track info']['url']}}</p>
                                </div>
                                <div class="block-content price">
                                    <p>Цена посылки: {{$package['track info']['price']}} {{$package['track info']['currency']}}</p>
                                    <p>Способ доставки:
                                        @if($package['track info']['delivery_method'] == 1)
                                            Главный офис
                                        @else
                                            Доставка курьером
                                        @endif
                                    </p>
                                </div>
                                <div class="block-content from-to">
                                    <p>Страна отправления:
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
                                    <p>Вес: {{$package['track info']['ves']}} кг</p>
                                    <p>Обьемный вес: {{$package['track info']['ob_ves']}} кг</p>
                                </div>
                                <div class="block-content comment">
                                    <p>Комментарий к посылке: {{$package['track info']['comments']}}</p>
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
