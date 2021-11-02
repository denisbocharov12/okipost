@extends('frontend.layouts.master')
@section('content')
    <section class="section-standart section-add-package">
        <div class="container">
            <div class="row">
                <div class="col-12 col-heading">
                    <div class="heading">
                        <h2>Добавить посылку</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 wrap-country">
                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'China')" id="defaultOpen">Китай</button>
                    </div>
                </div>
                <form enctype="multipart/form-data" method="POST" action="{{route('register.package')}}" id="China" class="row m-0 tabcontent col-12 col-tabcontent">
                    @csrf
                    <input type="hidden" value="china" name="c">
                    <div class="col-lg-8 col-12 col-register-wrap">
                        <h2>Информация о посылке</h2>
                        <div class="form-add-package">
                            <div class="form-group">
                                <input type="text" class="trackinfo @error('track') is-invalid @enderror" name="track" placeholder="Трекинг" value="">
                                @error('track')
                                <span class="error-span" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group form-group-radio">
                                <div class="select-type">
                                    <input id="select-web" class="select-type-i" type="radio" value="web" required name="type" checked>
                                    <label for="select-web">Веб-сайт</label>
                                </div>
                                <div class="select-type">
                                    <input id="select-personal" class="select-type-i" type="radio" value="personal" required name="type">
                                    <label for="select-personal">Личная посылка</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="websiteurl" id="websiteurl" type="text" name="url" placeholder="Веб сайт" value="">
                            </div>
                            <div class="form-group">
                                <div class="price-block">
                                    <label for="input_price" class="label-top">* Беспошлинный порок импорта в Молдову составляет 200 EUR.</label>
                                    <input type="number" name="price" id="input_price" class="priceselector_val @error('price') is-invalid @enderror" placeholder="Цена" value="">
                                    @error('price')
                                    <span class="error-span" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <select name="currency" id="curr" class="curr">
                                        <option>USD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group-select">
                                <select name="info" id="info" class="@error('info') is-invalid @enderror select-info">
                                    <option selected disabled value="">Описание товара</option>
                                    <option>Разные готовые изделия</option>
                                    <option>Автозапчасти</option>
                                    <option>Бижутерия</option>
                                    <option>Освещение, Люстры, Лампы, Фары</option>
                                    <option>Инструменты и ручные инструменты</option>
                                    <option>Компьютеры, Ноутбуки и их Части</option>
                                    <option>Лекарственные Препараты</option>
                                    <option>Изделия из Стекла</option>
                                    <option>Музыкальные Инструменты и их Части</option>
                                    <option>Растения</option>
                                    <option>Печатная Продукция, Книги, Брошюры</option>
                                    <option>Оптическое и Фото Оборудование</option>
                                    <option>Парфюмерия и Косметика</option>
                                    <option>Часы</option>
                                    <option>Игрушки и Спортивный Инвентарь</option>
                                    <option>Пищевые добавки</option>
                                    <option>Одежда, Все Виды Одежды</option>
                                    <option>Телефон и Сетевые Устройства</option>
                                    <option>Обувь</option>
                                    <option>Сумки и Чемоданы</option>
                                    <option>Различные электронные Устройства</option>
                                </select>
                                @error('info')
                                <span class="error-span" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-group-address">
                                @if(empty($addresses['addresses']))
                                    <h5>Регистрация основного адреса</h5>
                                    <input type="hidden" id="nulled_addresses" value="true">
                                    <div class="form_toggle">
                                        <div class="form_toggle-item item-2 w-100">
                                            <input id="delivery_method_courier" value="2" type="radio" name="delivery_method_select" checked>
                                            <label for="delivery_method_courier" style="border-radius: 15px">Доставка курьером</label>
                                        </div>
                                    </div>
                                @else
                                    <h5>Выберите адрес доставки</h5>
                                    <input type="hidden" id="nulled_addresses" value="false">
                                    <div class="form_toggle">
                                        <div class="form_toggle-item item-1">
                                            <input id="delivery_method_office" value="1" type="radio" name="delivery_method_select" checked>
                                            <label for="delivery_method_office">Главный офис</label>
                                        </div>
                                        <div class="form_toggle-item item-2">
                                            <input id="delivery_method_courier" value="2" type="radio" name="delivery_method_select">
                                            <label for="delivery_method_courier">Доставка курьером</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group form-group-display-block" id="address_delivery_office">
                                <ul>
                                    <li>
                                        <a href="https://goo.gl/maps/i4YG7aL9mCNHPCta8" target="_blank">
                                            г. Комрат, ул. Победы 58
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://goo.gl/maps/tH1Bvxnq9v9P4HT37" target="_blank">
                                            г. Кишинев , ул. Колумна 135
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group form-group-display-block" id="address_delivery_block" style="display: none">
                                <label for="user_to">Куда доставим?</label>
                                <select disabled name="user_to" id="user_to">
                                    <option @if(empty($addresses['addresses'])) @else selected @endif disabled value="">Выберите адрес доставки</option>
                                    <option @if(empty($addresses['addresses'])) selected @else  @endif value="otheraddress">Другой адрес</option>
                                    @foreach($addresses['addresses'] as $item=>$value)
                                        <option value="{{$value['id']}}">{{$value['address']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form-group-other-address" style="display: none">
                                <input type="text" placeholder="Город" disabled name="city" class="input-group-other-address">
                                <input type="text" placeholder="Адрес" disabled name="address1" class="input-group-other-address">
                                <input type="text" placeholder="Имя" disabled name="name" class="input-group-other-address">
                                <input type="text" placeholder="Фамилия" disabled name="surname" class="input-group-other-address">
                                <input type="text" placeholder="Номер телефона" disabled name="phone" class="input-group-other-address">
                                <input type="text" placeholder="Номер паспорта" disabled name="passport" class="input-group-other-address">
                            </div>
                            <div class="form-group">
                                <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Комментарий к заказу"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 col-additional-services">
                        <div class="additional-service-wrap position-sticky">
                            <div class="repackaging block-additional-service">
                                <div class="checkbox-wrap">
                                    <input type="checkbox" class="service-checkbox" id="repackaging" data-id="repackaging" name="add[repackaging]" value="repackaging">
                                    <label for="repackaging">Переупаковка
                                        <div class="i-wrap">
                                            <i class="icon-question-mark" data-toggle="tooltip" data-placement="top" title="Чтобы уменьшить объемный вес, мы предлагаем уменьшить размер посылки или поместить ее в небольшую упаковку."></i>
                                        </div>
                                    </label>
                                    <div class="service-details" id="cost-repackaging">
                                        <div class="cost-service">
                                            <p><strong>Цена:</strong> 0.00 USD</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="insurance block-additional-service">
                                <div class="checkbox-wrap">
                                    <input type="checkbox" class="service-checkbox" id="insurance" data-id="insurance" name="add[insurance]" value="insurance">
                                    <label for="insurance">Страховка
                                        <div class="i-wrap">
                                            <i class="icon-question-mark" data-toggle="tooltip" data-placement="top" title="Если посылка была повреждена или утеряна, компания возместит вам ущерб. В случае повреждения страховка распространяется только на новые предметы"></i>
                                        </div>
                                    </label>
                                    <div class="service-details" id="cost-insurance">
                                        <div class="cost-service">
                                            <p><strong>Цена:</strong> 0.00 USD</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="invoice_revise block-additional-service">
                                <div class="checkbox-wrap">
                                    <input type="checkbox" class="service-checkbox" id="invoice_revise" data-id="invoice_revise" value="invoice_revise">
                                    <label for="invoice_revise">Сверка по инвойсу
                                        <div class="i-wrap">
                                            <i class="icon-question-mark" data-toggle="tooltip" data-placement="top" title="Сравните количество содержимого посылки со счетом-фактурой и убедитесь, что последние действительно совпадают друг с другом."></i>
                                        </div>
                                    </label>
                                    <div class="service-details" id="cost-invoice_revise">
                                        <div class="cost-service">
                                            <p><strong>Цена:</strong> 0.00 USD</p>
                                        </div>
                                        <div class="add-file-service">
                                            <div class="upload-file__wrapper">
                                                <input
                                                    onchange="getFileName('invoice_revise');"
                                                    type="file"
                                                    name="invoice_revise"
                                                    id="upload-file__input_invoice_revise"
                                                    class="upload-file__input"
                                                    accept="image/x-png,image/gif,image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/pdf"
                                                >
                                                <label class="upload-file__label" for="upload-file__input_invoice_revise">
                                                    <svg class="upload-file__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path d="M286 384h-80c-14.2 1-23-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c11.6 11.6 3.7 33.1-13.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-23-23V366c0-13.3 10.7-24 24-24h136v8c0 31 24.3 56 56 56h80c30.9 0 55-26.1 57-55v-8h135c13.3 0 24 10.6 24 24zm-124 88c0-11-9-20-19-20s-19 9-20 20 9 19 20 20 21-9 20-20zm64 0c0-12-9-20-20-20s-20 9-19 20 9 20 20 20 21-9 20-20z">
                                                        </path>
                                                    </svg>
                                                    <span class="upload-file__text" id="input-file-invoice_revise">Прикрепить файл</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="pre_custom block-additional-service">
                                <div class="checkbox-wrap">
                                    <input type="checkbox" class="service-checkbox" id="pre_custom" data-id="pre_custom" value="pre_custom">
                                    <label for="pre_custom">Предварительное Растаможивание
                                        <div class="i-wrap">
                                            <i class="icon-question-mark" data-toggle="tooltip" data-placement="top" title="По прибытии посылки мы подготовим таможенную декларацию, чтобы не тратить время впустую, и непосредственно заберем посылку из нашего офиса."></i>
                                        </div>
                                    </label>
                                    <div class="service-details" id="cost-pre_custom">
                                        <div class="cost-service">
                                            <p><strong>Цена:</strong> 0.00 USD</p>
                                        </div>
                                        <div class="add-file-service">
                                            <div class="upload-file__wrapper">
                                                <input
                                                    onchange="getFileName('pre_custom');"
                                                    type="file"
                                                    name="pre_custom"
                                                    id="upload-file__input_pre_custom"
                                                    class="upload-file__input"
                                                    accept="image/x-png,image/gif,image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/pdf"
                                                >
                                                <label class="upload-file__label" for="upload-file__input_pre_custom">
                                                    <svg class="upload-file__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path d="M286 384h-80c-14.2 1-23-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c11.6 11.6 3.7 33.1-13.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-23-23V366c0-13.3 10.7-24 24-24h136v8c0 31 24.3 56 56 56h80c30.9 0 55-26.1 57-55v-8h135c13.3 0 24 10.6 24 24zm-124 88c0-11-9-20-19-20s-19 9-20 20 9 19 20 20 21-9 20-20zm64 0c0-12-9-20-20-20s-20 9-19 20 9 20 20 20 21-9 20-20z">
                                                        </path>
                                                    </svg>
                                                    <span class="upload-file__text" id="input-file-pre_custom">Прикрепить файл</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="foto block-additional-service">
                                <div class="checkbox-wrap">
                                    <input type="checkbox" class="service-checkbox" id="foto" data-id="foto" name="add[foto]" value="foto">
                                    <label for="foto">Фото посылки
                                        <div class="i-wrap">
                                            <i class="icon-question-mark" data-toggle="tooltip" data-placement="top" title="После доставки посылки на наш склад мы предоставим фотосессию содержимого посылки, которая появится в вашем профиле"></i>
                                        </div>
                                    </label>
                                    <div class="service-details" id="cost-foto">
                                        <div class="cost-service">
                                            <p><strong>Цена:</strong> 0.60 USD</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="video block-additional-service">
                                <div class="checkbox-wrap">
                                    <input type="checkbox" class="service-checkbox" id="video" data-id="video" name="add[video]" value="video">
                                    <label for="video">Видео посылки
                                        <div class="i-wrap">
                                            <i class="icon-question-mark" data-toggle="tooltip" data-placement="top" title="После доставки посылки на наш склад мы предоставим видеозапись содержимого посылки, которая появится в вашем профиле."></i>
                                        </div>
                                    </label>
                                    <div class="service-details" id="cost-video">
                                        <div class="cost-service">
                                            <p><strong>Цена:</strong> 0.60 USD</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-block-submit">
                        <div class="form-group">
                            <a href="{{route('faq')}}">Ознакомтесь с перечнем запрещенных для доставки грузов</a>
                        </div>
                        <div class="form-group form-group-submit">
                            <button type="submit">Создать посылку</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#info').select2({
                placeholder: 'Описание товара'
            });
            $('#user_to').select2();
            $('[data-toggle="tooltip"]').tooltip();
            $('.checkbox-wrap input[type=checkbox]').click(function () {
                let data_id = $(this).data('id');
                if ($(this).is(':checked')){
                    $('#cost-'+data_id).show( 300 );
                } else {
                    $('#cost-'+data_id).hide( 300 );
                }
            });
            $('.tabcontent.active input:radio[name=type]').change(function() {
                if (this.value == 'web') {
                    $('.tabcontent.active #websiteurl').css('opacity','1');
                    $('.tabcontent.active #websiteurl').removeAttr('disabled');
                }
                else if (this.value == 'personal') {
                    $('.tabcontent.active #websiteurl').css('opacity','.3');
                    $('.tabcontent.active #websiteurl').prop("disabled", true);
                }
            });
            if($('#nulled_addresses').val() == 'true'){
                $('.tabcontent.active #address_delivery_office').css('display','none');
                $('.tabcontent.active #address_delivery_block').css('display','flex');
                $('.tabcontent.active #address_delivery_block #user_to').prop("disabled", false);
                $(".tabcontent.active .form-group-other-address input").prop("disabled", false);
                $(".tabcontent.active .form-group-other-address").css('display','flex');
                $(".tabcontent.active .col-register-wrap .form-add-package .form-group-display-block .select2-container .select2-selection").css('border','1px solid #DD3D83');
            } else{
                $('.tabcontent.active input:radio[name=delivery_method_select]').change(function() {
                    if (this.value == '1') {
                        $('.tabcontent.active #address_delivery_office').css('display','flex');
                        $('.tabcontent.active #address_delivery_block').css('display','none');
                        $('.tabcontent.active #address_delivery_block #user_to').prop("disabled", true);
                        $(".tabcontent.active .form-group-other-address input").prop("disabled", true);
                        $(".tabcontent.active .form-group-other-address").css('display','none');
                    }
                    else if (this.value == '2') {
                        $('.tabcontent.active #address_delivery_office').css('display','none');
                        $('.tabcontent.active #address_delivery_block').css('display','flex');
                        $('.tabcontent.active #address_delivery_block #user_to').prop("disabled", false);
                        if($(".tabcontent.active #user_to").val() == 'otheraddress'){
                            $(".tabcontent.active .form-group-other-address input").prop("disabled", false);
                            $(".tabcontent.active .form-group-other-address").css('display','flex');
                        }
                    }
                });
            }

            $(".tabcontent.active #user_to").change(function () {
                if($(this).val() == 'otheraddress'){
                    $(".tabcontent.active .form-group-other-address").css('display','flex');
                    $(".tabcontent.active .col-register-wrap .form-add-package .form-group-display-block .select2-container .select2-selection").css('border','1px solid #DD3D83');
                    $(".tabcontent.active .form-group-other-address input").prop("disabled", false);
                } else{
                    $(".tabcontent.active .form-group-other-address").css('display','none');
                    $(".tabcontent.active .col-register-wrap .form-add-package .form-group-display-block .select2-container .select2-selection").css('border','1px solid #e0e0e0');
                    $(".tabcontent.active .form-group-other-address input").prop("disabled", true);
                }
            });
        });
        function getFileName(id) {
            var filename = $('#upload-file__input_'+id).val().replace(/.*(\/|\\)/, '');
            $('#input-file-'+id).html(filename);
        }
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                tabcontent[i].className += "";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].className = tabcontent[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "flex";
            evt.currentTarget.className += " active";
            document.getElementById(tabName).className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
@endsection
