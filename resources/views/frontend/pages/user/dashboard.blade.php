@extends('frontend.layouts.master')
@section('content')
    <section class="section-standart section-dashboard">
        <div class="container">
            <div class="row">
                <div class="col-12 col-heading align-left">
                    <div class="heading">
                        <h2 style="text-align: left">Панель управления</h2>
                    </div>
                </div>
                <div class="col-12 col-user-info">
                    <div class="wrap">
                        <div class="username">
                            <p>{{$user->first_name}} {{$user->last_name}}</p>
                        </div>
                        <div class="code-of-user">
                            <p>Номер комнаты</p>
                            <strong>OKI-{{$user->code}}</strong>
                        </div>
                        <div class="balance col">
                            <p>Баланс:</p>
                            <strong>{{$user->money}} MDL <a href="https://runpay.md/ru" data-toggle="tooltip" data-placement="top" title="Пополнение баланса через RunPay Online" target="_blank" class="add_balance_btn"><i class="icon-metco-plus"></i></a></strong>
                        </div>
                        <div class="add-balance">
                            <a href="{{route('add.package')}}"><i class="icon-metco-plus"></i> Добавить посылку</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-user-dashboard">
                    <div class="wrap">
                        <div class="tab">
                            @foreach($userTables as $table => $value)
                                @if($userTables['tb1'] === $value)
                                    <button class="tablinks active" data-id="{{preg_replace('/[^0-9]/', '', $table)}}" onclick="openTable(event, '{{$table}}')" id="defaultOpen">
                                        @if($value['name'] == 'Awaiting parcels')
                                            <span class="counter">{{$value['number']}}</span> Ожидаемые посылки
                                        @endif
                                    </button>
                                @else
                                    <button class="tablinks" data-id="{{preg_replace('/[^0-9]/', '', $table)}}" onclick="openTable(event, '{{$table}}')">
                                        @if($value['name'] == 'Awaiting parcels')
                                            <span class="counter">{{$value['number']}}</span> Ожидаемые посылки
                                        @elseif($value['name'] == 'Undeclared parcels')
                                            <span class="counter">{{$value['number']}}</span> Незадекларированные посылки
                                        @elseif($value['name'] == 'Unpaid parcels')
                                            <span class="counter">{{$value['number']}}</span> Неоплаченные посылки
                                        @elseif($value['name'] == 'Send')
                                            <span class="counter">{{$value['number']}}</span> Отправленные
                                        @elseif($value['name'] == 'In Stock')
                                            <span class="counter">{{$value['number']}}</span> На складе
                                        @elseif($value['name'] == 'Recieved')
                                            <span class="counter">{{$value['number']}}</span> Полученные
                                        @endif
                                    </button>
                                @endif
                            @endforeach
                        </div>
                        <div class="wrap-tabcontent" id="wrapContent" style="float: left;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            var token = "{{csrf_token()}}";
            var path = "{{route('user.get-table')}}";
            $.ajax({
                url: path,
                type: "POST",
                dataType:"JSON",
                data:{
                    table: 1,
                    _token: token
                },
                success:function (response) {
                    if (response['status'] == true){
                        $('#wrapContent').html(response['render']);
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
        function openTable(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the link that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        $(document).on('click','.tablinks',function (e) {
            e.preventDefault();
            var table = $(this).data('id');
            var token = "{{csrf_token()}}";
            var path = "{{route('user.get-table')}}";
            $.ajax({
                url: path,
                type: "POST",
                dataType:"JSON",
                data:{
                    table: table,
                    _token: token
                },
                // beforeSend:function () {
                //     $('#calculator_submit').html('Расчитываем ...<i class="fa fa-spin fa-spinner"></i>');
                // },
                // complete:function () {
                //     $('#calculator_submit').html('Расчитали <i style="margin-left: 4px" class="fa fa-check"></i>');
                // },
                success:function (response) {
                    if (response['status'] == true){
                        $('#wrapContent').html(response['render']);
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
        $(document).on('click','.btn-pay',function (e) {
            e.preventDefault();
            var token = "{{csrf_token()}}";
            var path = "{{route('user.shipping-pay')}}";
            var track = $(this).data('track');
            $.ajax({
                url: path,
                type: "POST",
                dataType:"JSON",
                data:{
                    track: track,
                    _token: token
                },
                success:function (response) {
                    if (response['status'] == true){
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
        })
    </script>
@endsection
