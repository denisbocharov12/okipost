@extends('frontend.layouts.home')
@section('content')
    <section class="section-main section-primary">
        <div class="bg-image bg-airdrop">
            <img src="{{asset('frontend')}}/assets/images/airdrop.svg" alt="">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="slider-main">
                    <div class="slider-item">
                        <div class="row">
                            <div class="col-8 col-md-6 slider-item-content">
                                <div class="content">
                                    <h1 data-animation="flipInX" data-delay="1s">Экспресс-<span class="color">доставка</span> по всей Молдове</h1>
                                    <p data-animation="fadeInUp" data-delay="1s">Okipost Moldova – надежная доставка всех видов отправлений из Китая, России, Америки, Турции, Германии, Англии, Грузии в Молдову.</p>
                                    <div class="block-advantages-slider" data-animation="fadeInUp" data-delay="1s">
                                        <ul>
                                            <li>Быстро</li>
                                            <li>Качественно</li>
                                            <li>Удобно</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-6 slider-item-image">
                                <img src="{{asset('frontend')}}/assets/images/slider-image-3.svg" alt="" data-delay="1s" data-animation="fadeInRight">
                            </div>
                        </div>
                    </div>
                    <div class="slider-item slider-item-2">
                        <div class="row">
                            <div class="col-8 col-md-6 slider-item-content">
                                <div class="content">
                                    <h1 data-animation="flipInX" data-delay="1s">Мы стремимся сделать <span class="color">шопинг</span> удобным</h1>
                                    <p data-animation="fadeInUp" data-delay="1s">Заказывайте на самых известных заграничных площадках: <strong class="color"> Asos, AliExpress, Taobao, Amazon, E-bay, Sephora, Trendyol, Золотое яблоко, Zara, Mango, Bershka, Massimo Dutti, H&M и т.д</strong></p>
                                </div>
                            </div>
                            <div class="col-4 col-md-6 slider-item-image">
                                <img src="{{asset('frontend')}}/assets/images/slider-image-2.svg" alt="" data-animation="fadeInRight" data-delay="1s">
                            </div>
                        </div>
                    </div>
                    <div class="slider-item slider-item-3">
                        <div class="row">
                            <div class="col-8 col-md-6 slider-item-content">
                                <div class="content">
                                    <h1 data-animation="flipInX" data-delay="1s"><span class="color">OkiLogistic</span> - логистика для юридических лиц</h1>
                                    <p data-animation="fadeInUp" data-delay="1s">Нужно привести <span class="color-small">"большой"</span> груз с Китая или США? Мы найдем оптимальное решение, организуем перевозку и поможем растаможить.</p>
                                </div>
                            </div>
                            <div class="col-4 col-md-6 slider-item-image">
                                <img src="{{asset('frontend')}}/assets/images/slider-image-5.svg" alt="" data-animation="fadeInRight" data-delay="1s">
                            </div>
                        </div>
                    </div>
                    <div class="slider-item slider-item-3">
                        <div class="row">
                            <div class="col-8 col-md-6 slider-item-content">
                                <div class="content">
                                    <h1 data-animation="flipInX" data-delay="1s">Получайте посылки самым <span class="color">удобным</span> способом</h1>
                                    <p data-animation="fadeInUp" data-delay="1s">Выберите удобный для вас способ доставки в личном кабинете и мы доставим груз <span class="color">"прямо в руки"</span></p>
                                </div>
                            </div>
                            <div class="col-4 col-md-6 slider-item-image">
                                <img src="{{asset('frontend')}}/assets/images/slider-image-4.svg" alt="" data-animation="fadeInRight" data-delay="1s">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-plans section-standart">
        <div class="container">
            <div class="row">
                <div class="col-12 col-heading">
                    <div class="heading">
                        <h2>Как это работает?</h2>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-how-it-works">
                    <div class="content">
                        <div class="card-stage">
                            <div class="block-count">
                                <p>1.</p>
                            </div>
                            <img src="{{asset('frontend')}}/assets/images/new-user.svg" alt="">
                            <div class="stage-content">
                                <h5>Зарегистрируйтесь в системе Okipost</h5>
                                <p>Создайте аккаунт в системe Okipost Moldova.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-how-it-works">
                    <div class="content">
                        <div class="card-stage">
                            <div class="block-count">
                                <p>2.</p>
                            </div>
                            <img src="{{asset('frontend')}}/assets/images/checkout-package.svg" alt="">
                            <div class="stage-content">
                                <h5>Оформите заказ на адрес нашего склада</h5>
                                <p>Оформите заказ, указав свой уникальный ID в системе Okipost Moldova.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-how-it-works">
                    <div class="content">
                        <div class="card-stage">
                            <div class="block-count">
                                <p>3.</p>
                            </div>
                            <img src="{{asset('frontend')}}/assets/images/delivered-on-warehouse.svg" alt="">
                            <div class="stage-content">
                                <h5>Магазин доставит заказ на указанный вами адрес склада</h5>
                                <p>После доставки на наш склад вашего заказа, мы сразу же уведомим вас о его получении и подсчитаем стоймость доставки.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-how-it-works">
                    <div class="content">
                        <div class="card-stage">
                            <div class="block-count">
                                <p>4.</p>
                            </div>
                            <img src="{{asset('frontend')}}/assets/images/delivered-package.svg" alt="">
                            <div class="stage-content">
                                <h5>Получите заказ в отделение Okipost Moldova или выберите способ доставки</h5>
                                <p>Как только товар будет в Молдове, вы сможете выбрать способ доставки вашего заказа.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-standart section-shops">
        <div class="container">
            <div class="row">
                <div class="col-12 col-heading">
                </div>
                <div class="col-xl-6 col-12 col-shops-image">
                    <div id="contentContainer" class="trans3d">
                        <section id="carouselContainer" class="trans3d">
                            <figure id="item1" class="carouselItem trans3d">
                                <div class="carouselItemInner trans3d">
                                    <img src="{{asset('frontend')}}/assets/images/shops/zara.svg" alt="Zara Online Shop">
                                </div>
                            </figure>
                            <figure id="item2" class="carouselItem trans3d">
                                <div class="carouselItemInner trans3d">
                                    <img src="{{asset('frontend')}}/assets/images/shops/aliexpress.svg" alt="AliExpress Online Shop">
                                </div>
                            </figure>
                            <figure id="item3" class="carouselItem trans3d">
                                <div class="carouselItemInner trans3d">
                                    <img src="{{asset('frontend')}}/assets/images/shops/ebay.svg" alt="Ebay Online Shop">
                                </div>
                            </figure>
                            <figure id="item4" class="carouselItem trans3d">
                                <div class="carouselItemInner trans3d">
                                    <img src="{{asset('frontend')}}/assets/images/shops/amazon.svg" alt="Amazon Online Shop">
                                </div>
                            </figure>
                            <figure id="item5" class="carouselItem trans3d">
                                <div class="carouselItemInner trans3d">
                                    <img src="{{asset('frontend')}}/assets/images/shops/alibaba.svg" alt="Alibaba Online Shop">
                                </div>
                            </figure>
                        </section>
                    </div>
                </div>
                <div class="col-xl-6 col-12 col-shops-content">
                    <div class="content">
                        <h2>Самые популярные магазины в одном месте!</h2>
                        <p>Будь первым - не ограничивайтесь этим списком, магазинов множество. Покупайте где угодно - мы доставим!</p>
                        <a href="#" class="btn btn-okipost">К списку магазинов <i class="icon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-standart section-calculator">
        <div class="container">
            <div class="row">
                <div class="col-12 col-calculator">
                    <div class="form-wrap">
                        <form>
                            <div class="col-heading">
                                <div class="heading">
                                    <h2>{{__('calculator')}}</h2>
                                </div>
                            </div>
                            <div class="form-block-select">
                                <div class="form-control form-select-custom">
                                    <label for="from_country">{{__('calculator_from')}}</label>
                                    <i class="icon-map"></i>
                                    <select name="from" class="select2" id="from_country">
                                        <option value="china">Китай</option>
{{--                                        <option value="usa">Америка</option>--}}
{{--                                        <option value="turkey">Турция</option>--}}
{{--                                        <option value="moldova">Молдова</option>--}}
{{--                                        <option value="germany">Германия</option>--}}
                                    </select>
                                </div>
                                <div class="form-control form-select-custom">
                                    <label for="to_country">Пункт назначения</label>
                                    <i class="icon-map"></i>
                                    <select name="to" class="select2" id="to_country">
                                        <option value="moldova">Молдова</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-content">
                                <div class="form-block-data">
                                    <div class="block-real-ves">
                                        <div class="form-control">
                                            <label for="real_ves">Реальный вес</label>
                                            <input type="number" id="real_ves" name="ves" placeholder="10 кг">
                                            <p>Минимальный оплачиваемый вес одного места 0.1(кг)
                                            </p>
                                        </div>
                                        <a class="instruction" data-fancybox data-src="#calculator-page" data-touch="false" href="javascript:;">Инструкция к использованию</a>
                                    </div>
                                    <div class="block-data">
                                        <div class="block">
                                            <div class="form-control">
                                                <label for="data-weight">Ширина</label>
                                                <input type="number" id="data-weight" name="weight" placeholder="10 см">
                                            </div>
                                            <div class="form-control">
                                                <label for="data-height">Высота</label>
                                                <input type="number" id="data-height" name="height" placeholder="20 см">
                                            </div>
                                            <div class="form-control">
                                                <label for="data-lenght">Длина</label>
                                                <input type="number" id="data-lenght" name="lenght" placeholder="28 см">
                                            </div>
                                        </div>
                                        <a class="instruction-mobile" data-fancybox data-src="#calculator-page" data-touch="false" href="javascript:;">Инструкция к использованию</a>
                                    </div>
                                </div>
                                <div class="form-submit">
                                    <div class="block">
                                        <img src="{{asset('frontend')}}/assets/images/boxb.jpg" alt="">
                                    </div>
                                    <button id="calculator_submit"><i class=""></i> Рассчитать</button>
                                </div>
                            </div>
                        </form>
                        <div id="form-result-wrap">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.components.partners')
@endsection
@section('footer-content')
    <div id="calculator-page" class="fancybox-modal-content" style="display: none">
        @include('frontend.pages.calculator.instruction')
    </div>
@endsection
@section('before_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
@endsection
@section('scripts')
    <script>
        $(document).on('click','#calculator_submit',function (e) {
            e.preventDefault();
            var from_country = $('#from_country').val();
            var to_country = $('#to_country').val();
            var ves = $('#real_ves').val();
            var weight = $('#data-weight').val();
            var height = $('#data-height').val();
            var lenght = $('#data-lenght').val();
            var text_from = $("#from_country option:selected").html();
            var text_to = $("#to_country option:selected").html();;
            var token = "{{csrf_token()}}";
            var path = "{{route('main')}}";
            $.ajax({
                url: path,
                type: "GET",
                dataType:"JSON",
                data:{
                    ves: ves,
                    lenght: lenght,
                    weight: weight,
                    height: height,
                    from_country: from_country,
                    to_country: to_country,
                    text_from: text_from,
                    text_to: text_to,
                    _token: token
                },
                beforeSend:function () {
                    $('#calculator_submit').html('Расчитываем ...<i class="fa fa-spin fa-spinner"></i>');
                },
                complete:function () {
                    $('#calculator_submit').html('Расчитали <i style="margin-left: 4px" class="fa fa-check"></i>');
                },
                success:function (response) {
                    if (response['status'] == true){
                        $('#form-result-wrap').html(response['calculator']);
                        toastr["success"](response['msg'])
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }else{
                        toastr["error"](response['msg'])
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                }
            });
        });
        // Shops
        // set and cache variables
        var w, container, carousel, item, radius, itemLength, rY, ticker, fps;
        var mouseX = 0;
        var mouseY = 0;
        var mouseZ = 0;
        var addX = 0;


        // fps counter created by: https://gist.github.com/sharkbrainguy/1156092,
        // no need to create my own :)

        function init()
        {
            w = $(window);
            container = $( '#contentContainer' );
            carousel = $( '#carouselContainer' );
            item = $( '.carouselItem' );
            itemLength = $( '.carouselItem' ).length;
            rY = 360 / itemLength;
            if(window.matchMedia('(min-width: 768.98px)').matches){
                radius = Math.round( (200) / Math.tan( Math.PI / itemLength ) );
                TweenMax.set(container, {perspective:3000})
            }
            if(window.matchMedia('(max-width: 768px)').matches){
                radius = Math.round( (135) / Math.tan( Math.PI / itemLength ) );
                TweenMax.set(container, {perspective:2000})
            }
            // set container 3d props

            TweenMax.set(carousel, {z:-(radius)})

            // create carousel item props

            for ( var i = 0; i < itemLength; i++ )
            {
                var $item = item.eq(i);
                var $block = $item.find('.carouselItemInner');

                //thanks @chrisgannon!
                TweenMax.set($item, {rotationY:rY * i, z:radius, transformOrigin:"50% 50% " + -radius + "px"});

                animateIn( $item, $block )
            }

            // set mouse x and y props and looper ticker
            window.addEventListener( "mousemove", onMouseMove, false );
            ticker = setInterval( looper, 1000/60 );
        }

        function animateIn( $item, $block )
        {
            var $nrX = 360 * getRandomInt(2);
            var $nrY = 360 * getRandomInt(2);

            var $nx = -(2000) + getRandomInt( 4000 )
            var $ny = -(2000) + getRandomInt( 4000 )
            var $nz = -4000 +  getRandomInt( 4000 )

            var $s = 1.5 + (getRandomInt( 10 ) * .1)
            var $d = 1 - (getRandomInt( 8 ) * .1)

            TweenMax.set( $item, { autoAlpha:1, delay:$d } )
            TweenMax.set( $block, { z:$nz, rotationY:$nrY, rotationX:$nrX, x:$nx, y:$ny, autoAlpha:0} )
            TweenMax.to( $block, $s, { delay:$d, rotationY:0, rotationX:0, z:0,  ease:Expo.easeInOut} )
            TweenMax.to( $block, $s-.5, { delay:$d, x:0, y:0, autoAlpha:1, ease:Expo.easeInOut} )
        }

        function onMouseMove(event)
        {
            mouseX = -(-(window.innerWidth * .5) + event.pageX) * .0005;
            mouseY = -(-(window.innerHeight * .5) + event.pageY ) * .001;
        }

        // loops and sets the carousel 3d properties
        function looper()
        {
            addX += mouseX
            TweenMax.to( carousel, 1, { rotationY:addX, rotationX:mouseY, ease:Quint.easeOut } )
            TweenMax.set( carousel, {z:mouseZ } )
        }

        function getRandomInt( $n )
        {
            return Math.floor((Math.random()*$n)+1);
        }

        $(document).ready(init());
    </script>
@endsection
