<div id="tb{{$table}}" class="tabcontent">
    @foreach($getTable['parceldata'] as $item)
        @if($getTable['name'] == 'Unpaid parcels')
            <div class="tab-wrapper">
                <div class="toggle toggle-unpaid">
                    <div class="toggle-section-wrapper toggle-section-wrapper-unpaid">
                        <div class="direction-block">
                            <div class="track-wrap toggle-wrap-div">
                                <string>Трэк</string>
                                <h3>{{$item['track']}}</h3>
                            </div>
                            <div class="price-wrap toggle-wrap-div">
                                <string>Цена</string>
                                <h3>{{$item['price']}} {{$item['currency']}}</h3>
                            </div>
                        </div>
                        <div class="direction-block">
                            <div class="ves-wrap toggle-wrap-div ves-unpaid">
                                <string>Вес</string>
                                <h3>
                                    {{$item['ves']}} кг.
                                </h3>
                            </div>
                            <div class="shipping-wrap toggle-wrap-div shipping-unpaid">
                                <string>Стоймость транспортировки</string>
                                <h3>
                                    {{$item['shipping_price']}} {{$item['currency']}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="toggle-section-wrapper">
                        <div class="toggle-wrap-div toggle-select-action">
                            <button class="data-status" id="data-status">
                                <i class="icon-edit"></i>
                                <div class="dropdown-select-action">
                                    <ul>
                                        <li class="item"><a href="#" data-track="{{$item['track']}}" class="btn-pay select-link">Оплатить посылку</a></li>
                                        <li class="item"><a href="#" class="select-link">Доставка курьером</a></li>
                                    </ul>
                                </div>
                            </button>
                        </div>
                        <div class="toggle-wrap-div toggle-arrow">
                            <i class="icon-arrow-down"></i>
                        </div>
                    </div>
                </div>
                <div class="wrap content">
                    <div class="content-block">
                        <div class="content-row">
                            <div class="wrap-content-block content-url">
                                <strong>Заказано с:</strong>
                                <a href="{{$item['url']}}">{{$item['url']}}</a>
                            </div>
                            <div class="wrap-content-block content-info">
                                <strong>Категория:</strong>
                                <p>{{$item['info']}}</p>
                            </div>
                            <div class="wrap-content-block content-payed">
                                <strong>Оплачено:</strong>
                                <p>{{$item['payed']}} {{$item['currency']}}</p>
                            </div>
                        </div>
                        <div class="content-row content-row-shipping">
                            <div class="wrap-content-block content-shipping-info">
                                <strong>Информация о доставке:</strong>
                                @if($item['shipping_info'] == "Waiting for a package")
                                    <p>Ждем прибытия на склад посылки</p>
                                @else
                                    <p>{{$item['shipping_info']}}</p>
                                @endif
                            </div>
                            <div class="wrap-content-block content-shipping-price">
                                <strong>Стоймость доставки:</strong>
                                @if($item['shipping_price'] == "Waiting for a package")
                                    <p>Ждем прибытия на склад посылки</p>
                                @else
                                    <p>{{$item['shipping_price']}} {{$item['currency']}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($getTable['name'] == 'Undeclared parcels')
            <div class="tab-wrapper">
                <div class="toggle">
                    <div class="toggle-section-wrapper">
                        <div class="track-wrap toggle-wrap-div">
                            <string>Трэк</string>
                            <h3>{{$item['track']}}</h3>
                        </div>
                        <div class="price-wrap toggle-wrap-div">
                            <string>Цена</string>
                            <h3>{{$item['price']}} {{$item['currency']}}</h3>
                        </div>
                        <div class="ves-wrap toggle-wrap-div">
                            <string>Вес</string>
                            <h3>
                                {{$item['ves']}} кг.
                            </h3>
                        </div>
                    </div>
                    <div class="toggle-section-wrapper">
                        <div class="package-status">
                            <span class="status"></span>
                        </div>
                        <div class="toggle-wrap-div toggle-select-action">
                            <button class="data-status" id="data-status">
                                <i class="icon-edit"></i>
                                <div class="dropdown-select-action">
                                    <ul>
                                        <li class="item"><a href="#" data-track="{{$item['track']}}" class="btn-pay select-link">Оплатить посылку</a></li>
                                        <li class="item"><a href="#" class="select-link">Доставка курьером</a></li>
                                    </ul>
                                </div>
                            </button>
                        </div>
                        <div class="toggle-wrap-div toggle-arrow">
                            <i class="icon-arrow-down"></i>
                        </div>
                    </div>
                </div>
                <div class="wrap content">
                    <div class="content-block">
                        <div class="content-row">
                            <div class="wrap-content-block content-url">
                                <strong>Заказано с:</strong>
                                <a href="{{$item['url']}}">{{$item['url']}}</a>
                            </div>
                            <div class="wrap-content-block content-info">
                                <strong>Категория:</strong>
                                <p>{{$item['info']}}</p>
                            </div>
                            <div class="wrap-content-block content-payed">
                                <strong>Оплачено:</strong>
                                <p>{{$item['payed']}} {{$item['currency']}}</p>
                            </div>
                        </div>
                        <div class="content-row content-row-shipping">
                            <div class="wrap-content-block content-shipping-info">
                                <strong>Информация о доставке:</strong>
                                @if($item['shipping_info'] == "Waiting for a package")
                                    <p>Ждем прибытия на склад посылки</p>
                                @else
                                    <p>{{$item['shipping_info']}}</p>
                                @endif
                            </div>
                            <div class="wrap-content-block content-shipping-price">
                                <strong>Стоймость доставки:</strong>
                                @if($item['shipping_price'] == "Waiting for a package")
                                    <p>Ждем прибытия на склад посылки</p>
                                @else
                                    <p>{{$item['shipping_price']}} {{$item['currency']}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="tab-wrapper">
                <div class="toggle">
                    <div class="toggle-section-wrapper">
                        <div class="track-wrap toggle-wrap-div">
                            <string>Трэк</string>
                            <h3>{{$item['track']}}</h3>
                        </div>
                        <div class="price-wrap toggle-wrap-div">
                            <string>Цена</string>
                            <h3>{{$item['price']}} {{$item['currency']}}</h3>
                        </div>
                        <div class="ves-wrap toggle-wrap-div">
                            <string>Вес</string>
                            <h3>
                                {{$item['ves']}} кг.
                            </h3>
                        </div>
                    </div>
                    <div class="toggle-section-wrapper">
                        <div class="package-status">
                            <span class="status"></span>
                        </div>
{{--                        <div class="toggle-wrap-div toggle-select-action">--}}
{{--                            <button class="data-status" id="data-status">--}}
{{--                                <i class="icon-edit"></i>--}}
{{--                                <div class="dropdown-select-action">--}}
{{--                                    <ul>--}}
{{--                                        <li class="item"><a href="#" class="btn-pay select-link">Изменить</a></li>--}}
{{--                                        <li class="item"><a href="#" class="select-link">Удалить</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </button>--}}
{{--                        </div>--}}
                        <div class="toggle-wrap-div toggle-arrow">
                            <i class="icon-arrow-down"></i>
                        </div>
                    </div>
                </div>
                <div class="wrap content">
                    <div class="content-block">
                        <div class="content-row">
                            <div class="wrap-content-block content-url">
                                <strong>Заказано с:</strong>
                                <a href="{{$item['url']}}">{{$item['url']}}</a>
                            </div>
                            <div class="wrap-content-block content-info">
                                <strong>Категория:</strong>
                                <p>{{$item['info']}}</p>
                            </div>
                            <div class="wrap-content-block content-payed">
                                <strong>Оплачено:</strong>
                                <p>{{$item['payed']}} {{$item['currency']}}</p>
                            </div>
                        </div>
                        <div class="content-row content-row-shipping">
                            <div class="wrap-content-block content-shipping-info">
                                <strong>Информация о доставке:</strong>
                                @if($item['shipping_info'] == "Waiting for a package")
                                    <p>Ждем прибытия на склад посылки</p>
                                @else
                                    <p>{{$item['shipping_info']}}</p>
                                @endif
                            </div>
                            <div class="wrap-content-block content-shipping-price">
                                <strong>Стоймость доставки:</strong>
                                @if($item['shipping_price'] == "Waiting for a package")
                                    <p>Ждем прибытия на склад посылки</p>
                                @else
                                    <p>{{$item['shipping_price']}} {{$item['currency']}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
        <script>
            $(function(){
                $('.toggle-arrow').click(function(e){
                    e.preventDefault();
                    $(this).parent().parent().next('.content').slideToggle();
                    $(this).find('i').toggleClass('active');
                });
            });
        </script>
</div>

