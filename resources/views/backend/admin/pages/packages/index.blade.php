@extends('backend.admin.layouts.master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Посылки</h4>
                                </div>
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="more-options">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-search"></em>
                                                        </div>
                                                        <input type="text" class="form-control" id="search_packages" placeholder="Введите трэк посылки">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div>
                        </div>
                        <div class="row g-gs" id="row-packages">
                            @include('backend.admin.pages.packages.components.package')
                        </div>
                    </div> <!-- nk-block -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('change','#search_packages',function (e) {
            e.preventDefault();
            var value = $(this).val();
            var token = "{{csrf_token()}}";
            var path = "{{route('packages.index')}}";
            $.ajax({
                url: path,
                type: "GET",
                dataType:"JSON",
                data:{
                    value: value,
                    _token: token
                },
                beforeSend:function () {
                    $('#row-packages').html('<div class="spinner-border m-5" role="status">\n' +
                        '  <span class="sr-only">Loading...</span>\n' +
                        '</div>');
                },
                // complete:function () {
                //     $('#add-to-cart-'+product_id).html('Add to Cart <i class="fa fa-shopping-cart"></i>');
                // },
                success:function (response) {
                    if (response['status'] == true){
                        $('#row-packages').html(response['html']);
                    }
                    if (response['status'] == false){
                        toastr["info"](response['msg'])
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
            });
        })
    </script>
@endsection
