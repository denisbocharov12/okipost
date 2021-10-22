@extends('frontend.layouts.master')
@section('head_styles')
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/libs/aos/aos.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/libs/fancybox/jquery.fancybox.min.css">
@endsection
@section('content')
    <section class="section-cargo section-standart">
            <span class="line line-1 content-hidden"></span>
            <span class="line line-2 content-hidden"></span>
            <span class="line line-3 content-hidden"></span>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-cargo-heading">
                    <h1 class="content-hidden">OkiLogistic</h1>
                    <h2 class="content-hidden">Ваш надежный <span class="color">партнер</span> в Китае</h2>
                    <p class="content-hidden">Мы несем полную ответственность за сохранность вашего груза, обеспечиваем стабильную доставку товара при любых внешних обстоятельствах.</p>
                    <button data-fancybox="" data-touch="false" data-src="#registrationService" class="btn-cargo content-hidden">Заказать услугу</button>
                </div>
                <div class="col-12 col-md-6 col-cargo-image">
                    <img class="content-hidden" src="{{asset('frontend')}}/assets/images/cargo/cargo-plane.svg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="section-standart section-cargo-services">
        <span class="line line-1 content-hidden"></span>
        <span class="line line-2 content-hidden"></span>
        <span class="line line-3 content-hidden"></span>
        <div class="container">
            <div class="row">
                <div class="col-12 col-heading">
                    <div class="heading">
                        <h2>Услуги импорта и поиск оптимальных предложений</h2>
                    </div>
                </div>
                <div class="col-cargo-services col-lg-4 col-md-6 col-12">
                    <div class="services-block content-hidden">
                        <img src="{{asset('frontend')}}/assets/images/cargo/consolidation.svg" alt="">
                        <h3>Консолидация и поиск товара</h3>
                        <p>Мы подстраиваемся под индивидуальные потребности каждого клиента и особенности его груза</p>
                        <button class="btn-services">Заказать</button>
                    </div>
                </div>
                <div class="col-cargo-services col-lg-4 col-md-6 col-12">
                    <div class="services-block content-hidden">
                        <img src="{{asset('frontend')}}/assets/images/cargo/cargo-ship.svg" alt="">
                        <h3>Формирование сборного груза</h3>
                        <p>Компания сформирует груз и подберет транспорт, лучший маршрут, при этом существенно сокращая время перевозки</p>
                        <button class="btn-services">Заказать</button>
                    </div>
                </div>
                <div class="col-cargo-services col-lg-4 col-md-6 col-12">
                    <div   class="services-block content-hidden">
                        <img src="{{asset('frontend')}}/assets/images/cargo/folder.svg" alt="">
                        <h3>Оформление документов</h3>
                        <p>Доверьте подготовку важных документов на груз, услугу или перевозку специалистам «CTLC»</p>
                        <button class="btn-services">Заказать</button>
                    </div>
                </div>
                <div class="col-cargo-services col-lg-4 col-md-6 col-12">
                    <div   class="services-block content-hidden">
                        <img src="{{asset('frontend')}}/assets/images/cargo/control.svg" alt="">
                        <h3>Контроль погрузочных работ</h3>
                        <p>Обеспечьте безопасность и правильность транспортировки ваших товаров за границей или на территории Молдовы</p>
                        <button class="btn-services">Заказать</button>
                    </div>
                </div>
                <div class="col-cargo-services col-lg-4 col-md-6 col-12">
                    <div   class="services-block content-hidden">
                        <img src="{{asset('frontend')}}/assets/images/cargo/delivery-to-door.svg" alt="">
                        <h3>Доставка до двери</h3>
                        <p>Курьер забирает у клиента груз «у двери» и доставляет его получателю по указанному адресу тоже «до двери»</p>
                        <button class="btn-services">Заказать</button>
                    </div>
                </div>
                <div class="col-cargo-services col-lg-4 col-md-6 col-12">
                    <div   class="services-block content-hidden">
                        <img src="{{asset('frontend')}}/assets/images/cargo/insurance.svg" alt="">
                        <h3>Страхование и контроль груза</h3>
                        <p>Страхование как почтовых отправлений, так и разнообразных грузов осуществляется на надежных и доступных для клиента условиях</p>
                        <button class="btn-services">Заказать</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('before_scripts')
@endsection
@section('scripts')
    <div id="registrationService" style="display: none;" class="">
        <div class="wrap">
            <form action="#" id="registrationServiceForm">
                <span id="error_span" style="text-align: center;font-size: 12px;color: red;display: block;"></span>
                <fieldset>
                    <legend for="fio">ФИО</legend>
                    <div class="form-group">
                        <input id="fio" type="text" name="fio" required="" placeholder="ФИО">
                    </div>
                </fieldset>
                <fieldset>
                    <legend for="emailAddress">Email</legend>
                    <div class="form-group">
                        <input id="emailAddress" type="email" name="email" required="" placeholder="example@mail.ru">
                    </div>
                </fieldset>
                <fieldset>
                    <legend for="phone">Телефон</legend>
                    <div class="form-group">
                        <input id="phone" type="text" name="phone" required="" placeholder="+373ХХХХХХХХ">
                    </div>
                </fieldset>
                <fieldset id="service_radio">
                    <legend for="service">Выберите предполагаемую услугу:</legend>
                    <select name="service" id="serviceValue">
                        <option value="">Выберите предполагаемую услугу</option>
                        <option value="Консолидация и поиск товара">Консолидация и поиск товара</option>
                        <option value="Формирование сборного груза">Формирование сборного груза</option>
                        <option value="Оформление документов">Оформление документов</option>
                        <option value="Контроль погрузочных работ">Контроль погрузочных работ</option>
                        <option value="Доставка до двери">Доставка до двери</option>
                        <option value="Страхование и контроль груза">Страхование и контроль груза</option>
                    </select>
                </fieldset>
                <fieldset>
                    <legend for="comment">Комментарий</legend>
                    <div class="form-group">
                        <textarea name="comment" id="comment" cols="30" rows="6"></textarea>
                    </div>
                </fieldset>
                <div class="btn-wrap">
                    <button class="btn-form" id="serviceSubmit">Отправить</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('frontend')}}/assets/libs/fancybox/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#serviceValue').select2({
                placeholder: 'Выберите сферу деятельности'
            });
        });
        $(document).on('click','#serviceSubmit',function (e) {
            e.preventDefault();
            var url = "{{route('cargo.post')}}";
            var fio = $('#fio').val();
            var email = $('#emailAddress').val();
            var service = $('select[name="service"]').val();
            var comment = $('#comment').val();
            var phone = $('#phone').val();
            var token = "{{csrf_token()}}";
            $.ajax({
                url: url,
                type: "POST",
                dataType:"JSON",
                data:{
                    fio: fio,
                    email: email,
                    service: service,
                    comment: comment,
                    phone: phone,
                    _token: token
                },
                beforeSend:function () {
                    $('#serviceSubmit').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                // complete:function (response) {
                //     if(!response['status']){
                //     } else{
                //         $('#registerSubmit').html('<i class="fa fa-check" style="color: white"></i>');
                //     }

                // },
                success:function (response) {
                    if (response['status']){
                        $('#registrationService').html('<h3 style="text-align: center;">'+response['msg']+'</h3>');
                        $('#serviceSubmit').css('display','none');
                    } else {
                        $('#serviceSubmit').html('Отправить');
                        $('#error_span').html(response['msg']);
                    }
                }
            });
        });
    </script>
@endsection
