@extends('backend.admin.layouts.master')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Компании</h4>
                            </div>
                        </div>
                        <div class="row g-gs">
                            @foreach($companyes as $company)
                                <div class="col-sm-6 col-lg-4" id="company-{{$company->id}}">
                                    <div class="card text-white bg-secondary ">
                                        <div class="card-header">
                                            <div class="row m-0 justify-content-between align-items-center">
                                                <div class="col-auto p-0">
                                                    <span class="text-light pr-2">{{$company->type}}</span>
                                                    <p class="text-white font-weight-bold">Услуга: {{$company->service->service_name}}</p>
                                                </div>
                                                <div class="col-auto p-0 d-flex align-items-center">
                                                    <div class="dropdown">
                                                        <a class="border-0 bg-transparent dropdown-toggle btn btn-icon" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt">
                                                                <li><a class="text-secondary" href="{{route('view.pdf',['view'=>'pdf','company'=>$company->id])}}"><em class="icon ni ni-file-pdf"></em><span>Контракт</span></a></li>
                                                                <li><a class="text-secondary" href="{{route('company.edit', $company->id)}}"><em class="icon ni ni-pen2"></em><span>Редактировать</span></a></li>
                                                                <li><a class="text-secondary company_delete" href="#" data-id="{{$company->id}}"><em class="icon ni ni-delete"></em><span>Удалить</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <label style="margin-bottom: 0" class="switch">
                                                        <input id="toggle-btn" type="checkbox" name="toggle" value="{{$company->id}}" {{$company->status === 'active' ? 'checked' : ''}} >
                                                        <div>
                                                            <span></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner">
                                            <h5 class="card-title">{{$company->name}}</h5>
                                            <p class="card-text text-light">Директор: <span class="text-white font-weight-bold">{{$company->company_person}}</span></p>
                                            <p class="card-text text-light">Адрес: <span class="text-white font-weight-bold">{{$company->address}}</span></p>
                                            <p class="card-text text-light">IDNO: <span class="text-white font-weight-bold">{{$company->IDNO}}</span></p>
                                            <p class="card-text text-light">Email: <a class="text-white font-weight-bold" href="mailto:{{$company->email}}">{{$company->email}}</a></p>
                                            <p class="card-text text-light">Телефон: <a class="text-white font-weight-bold" href="tel:{{$company->phone}}">{{$company->phone}}</a></p>
                                            <div class="row m-0">
                                                <div id="accordion-{{$company->id}}" class="accordion w-100 bg-transparent text-white">
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed p-0 w-100" data-toggle="collapse" data-target="#accordion-item-{{$company->id}}">
                                                            <h6 class="title text-white">Реквизиты</h6>
                                                            <span class="accordion-icon text-white" style="right: 0;"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-{{$company->id}}" data-parent="#accordion-{{$company->id}}">
                                                            <div class="accordion-inner border-0 pr-0 pl-0 pb-0 pt-2">
                                                                <div class="inner-wrap-accordion bg-white p-2">
                                                                    <p class="card-text text-secondary">Адрес: <span class="text-secondary font-weight-bold">{{$company->requisit_address}}</span></p>
                                                                    <p class="card-text text-secondary">IDNO: <span class="text-secondary font-weight-bold">{{$company->requisit_IDNO}}</span></p>
                                                                    <p class="card-text text-secondary">NDS: <span class="text-secondary font-weight-bold">{{$company->requisit_nds}}</span></p>
                                                                    <p class="card-text text-secondary">IBAN: <span class="text-secondary font-weight-bold">{{$company->requisit_IBAN}}</span></p>
                                                                    <p class="card-text text-secondary">Банк: <span class="text-secondary font-weight-bold">{{$company->requisit_BANK}}</span></p>
                                                                    <p class="card-text text-secondary">Банковский код: <span class="text-secondary font-weight-bold">{{$company->requisit_CODE}}</span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        $('.company_delete').click(function () {
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
        $('input[name=toggle]').change(function () {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            $.ajax({
                url: "{{route('company.status')}}",
                type: "POST",
                data: {
                    _token: '{{csrf_token()}}',
                    mode: mode,
                    id: id
                },
                success:function (response) {
                    console.log(response.status);
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
                    }
                }
            })
        });
    </script>
@endsection
