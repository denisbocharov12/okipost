@extends('backend.admin.layouts.master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Оплаченные посылки</h4>
                            </div>
                        </div>
                        <div class="row g-gs">
                            @foreach($payeds as $payed)
                                <div class="col-sm-6 col-lg-4" id="payed-{{$payed->id}}">
                                    <div class="card text-white bg-secondary ">
                                        <div class="card-header">
                                            <div class="row m-0 justify-content-between align-items-center">
                                                <div class="col-auto p-0">
                                                    <span class="text-light pr-2">
                                                        @if($payed->payed == 'yes')
                                                            Оплачено
                                                        @else
                                                            Не оплачено
                                                        @endif
                                                    </span>
                                                    <p class="text-white font-weight-bold">Трэк: {{$payed->track}}</p>
                                                </div>
                                                <div class="col-auto p-0 d-flex align-items-center">
                                                    <div class="dropdown">
                                                        <a class="border-0 bg-transparent dropdown-toggle btn btn-icon" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt">
                                                                <li><a class="text-secondary" href="{{route('view.pdf.payed',['view'=>'pdf','payed'=>$payed->id])}}"><em class="icon ni ni-file-pdf"></em><span>Инвойс</span></a></li>
                                                                <li><a class="text-secondary" href="{{route('download.pdf.payed',['view'=>'pdf','payed'=>$payed->id,'code'=>$payed->code])}}"><em class="icon ni ni-file-pdf"></em><span>Скачать инвойс</span></a></li>
                                                                <li><a class="text-secondary payed_delete" href="#" data-id="{{$payed->id}}"><em class="icon ni ni-delete"></em><span>Удалить</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner">
                                            <h5 class="card-title">#{{$payed->id}}</h5>
                                            <p class="card-text text-light">Сумма к оплате: <span class="text-white font-weight-bold">{{$payed->needed_sum}} {{$payed->currency}}</span></p>
                                            <p class="card-text text-light">Кем: <span class="text-white font-weight-bold">{{$payed->user->first_name}} {{$payed->user->last_name}}</span></p>
                                            <p class="card-text text-light">ID: <span class="text-white font-weight-bold">{{$payed->code}}</span></p>
                                            <p class="card-text text-light">IDNO: <span class="text-white font-weight-bold">{{$payed->user->user_id}}</span></p>
                                            <p class="card-text text-light">Email: <a class="text-white font-weight-bold" href="mailto:{{$payed->user->email}}">{{$payed->user->email}}</a></p>
                                            <p class="card-text text-light">Телефон: <a class="text-white font-weight-bold" href="tel:{{$payed->user->phone}}">{{$payed->user->phone}}</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- nk-block -->
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $('.payed_delete').click(function () {
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('company.delete')}}",
                type: "POST",
                data: {
                    _token: '{{csrf_token()}}',
                    id: id
                },
                success:function (response) {
                    if (response.status){
                        toastr["success"](response.msg)
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
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
                        $('#company-' + response.deleted + '').fadeOut(1000);
                    }
                }
            })
        });
    </script>
@endsection
