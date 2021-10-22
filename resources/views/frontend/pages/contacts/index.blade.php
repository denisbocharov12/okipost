@extends('frontend.layouts.master')
@section('content')
    <section class="section-standart section-contacts">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-3 col-12 col-heading">
                    <div class="heading">
                        <h2>Контакты</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-12 col-contact-info">
                    <div class="wrap-hot-line">
                        <p>Телефон горячей линии</p>
                        <a class="phone" href="tel:+37379790008">+(373) 797-900-08</a>
                        <a class="email" href="mailto:info@okipost.md">info@okipost.md</a>
                    </div>
                    <ul class="office-list">
                        <li class="item"><a class="section-link active" href="#" data-text="Кишинёв" data-section="chisinau">Кишинёв</a></li>
                        <li class="item"><a class="section-link" href="#" data-text="Комрат" data-section="comrat">Комрат</a></li>
                    </ul>
                </div>
                <div class="col-lg-9 col-12 col-contact-map active" id="chisinau">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2719.467695117153!2d28.8268198!3d47.0310527!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97db58465f1a7%3A0xffb0efe576b965fe!2sStrada%20Columna%20135%2C%20Chi%C8%99in%C4%83u!5e0!3m2!1sru!2s!4v1634917059699!5m2!1sru!2s" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="wrap-contacts">
                        <div class="address wrap-contacts-block">
                            <h4>Адрес Офиса</h4>
                            <div class="wrap">
                                <p>Молдова, Кишинёв, ул. Колумна 135</p>
                            </div>
                        </div>
                        <div class="phone wrap-contacts-block">
                            <h4>Телефон</h4>
                            <div class="wrap">
                                <a href="tel:+37379790008">+(373) 797-900-08</a>
                            </div>
                        </div>
                        <div class="time wrap-contacts-block">
                            <h4>График работы</h4>
                            <div class="wrap">
                                <p>8:00 - 18:00 (Будни)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12 col-contact-map" id="comrat">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2756.6161899140593!2d28.6574547!3d46.2975987!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b627544f493261%3A0xaafc08e144cd16a8!2sComrat%20City%2C%20Strada%20Victoriei%2C%20Comrat!5e0!3m2!1sru!2s!4v1634917031432!5m2!1sru!2s" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="wrap-contacts">
                        <div class="address wrap-contacts-block">
                            <h4>Адрес Офиса</h4>
                            <div class="wrap">
                                <p>Молдова, Комрат, ул. Победы 58</p>
                            </div>
                        </div>
                        <div class="phone wrap-contacts-block">
                            <h4>Телефон</h4>
                            <div class="wrap">
                                <a href="tel:+37379790008">+(373) 797-900-08</a>
                            </div>
                        </div>
                        <div class="time wrap-contacts-block">
                            <h4>График работы</h4>
                            <div class="wrap">
                                <p>8:00 - 18:00 (Будни)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            var link = $('.section-link');
            link.click(function (e) {
                e.preventDefault();
                $('.col-contact-map').hide();
                var datasection = $(this).data('section');
                $("#"+datasection).fadeIn();
                $('.section-link').removeClass('active');
                $(this).addClass('active');
                // if($(this).hasClass('active')){
                //     return;
                // }else{
                //     var datasection = $(this).data('section');
                //     $('.col-contact-map.active').slideDown('300');
                //     $('.col-contact-map.active').removeClass('active');
                //     $('#'+datasection).slideUp('400', function() {
                //         $('#'+datasection).addClass('active');
                //     });
                // }
            })
        });
    </script>
@endsection
