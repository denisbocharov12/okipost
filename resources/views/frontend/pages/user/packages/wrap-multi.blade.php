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
                <form id="form-get-country" action="{{route('add.package')}}" method="GET" class="col-12 wrap-country">
                    <div class="tab">
                        <button type="button" class="tablinks @if($country == 'china') active @else @endif" data-country="china">Китай</button>
                        <button type="button" class="tablinks @if($country == 'usa') active @else @endif" data-country="usa">Америка</button>
                        <button type="button" class="tablinks @if($country == 'germany') active @else @endif" data-country="germany" >Германия</button>
                    </div>
                    <input type="hidden" name="country" value="" id="form_country">
                </form>
                @if($country !== null)
                @include('frontend.pages.user.packages._country.country')
                @endif
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#form-get-country .tablinks').click(function () {
                var country = $(this).data('country');
                $('#form_country').val(country);
                $('#form-get-country').submit();
            });
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
            $('.tabcontent input:radio[name=type]').change(function() {
                if (this.value == 'web') {
                    $('.tabcontent #websiteurl').css('opacity','1');
                    $('.tabcontent #websiteurl').removeAttr('disabled');
                }
                else if (this.value == 'personal') {
                    $('.tabcontent #websiteurl').css('opacity','.3');
                    $('.tabcontent #websiteurl').prop("disabled", true);
                }
            });
            $('.tabcontent input:radio[name=delivery_method_select]').change(function() {
                if (this.value == '1') {
                    $('.tabcontent #address_delivery_office').css('display','flex');
                    $('.tabcontent #address_delivery_block').css('display','none');
                    $('.tabcontent #address_delivery_block #user_to').prop("disabled", true);
                    $(".tabcontent .form-group-other-address input").prop("disabled", true);
                    $(".tabcontent .form-group-other-address").css('display','none');
                }
                else if (this.value == '2') {
                    $('.tabcontent #address_delivery_office').css('display','none');
                    $('.tabcontent #address_delivery_block').css('display','flex');
                    $('.tabcontent #address_delivery_block #user_to').prop("disabled", false);
                    if($(".tabcontent #user_to").val() == 'otheraddress'){
                        $(".tabcontent .form-group-other-address input").prop("disabled", false);
                        $(".tabcontent .form-group-other-address").css('display','flex');
                    }
                }
            });
            $(".tabcontent #user_to").change(function () {
                if($(this).val() == 'otheraddress'){
                    $(".tabcontent .form-group-other-address").css('display','flex');
                    $(".tabcontent .col-register-wrap .form-add-package .form-group-display-block .select2-container .select2-selection").css('border','1px solid #DD3D83');
                    $(".tabcontent .form-group-other-address input").prop("disabled", false);
                } else{
                    $(".tabcontent .form-group-other-address").css('display','none');
                    $(".tabcontent .col-register-wrap .form-add-package .form-group-display-block .select2-container .select2-selection").css('border','1px solid #e0e0e0');
                    $(".tabcontent .form-group-other-address input").prop("disabled", true);
                }
            });
        });
        function getFileName(id) {
            var filename = $('#upload-file__input_'+id).val().replace(/.*(\/|\\)/, '');
            $('#input-file-'+id).html(filename);
        }
        // function openTab(evt, tabName) {
        //     var i, tabcontent, tablinks;
        //     tabcontent = document.getElementsByClassName("tabcontent");
        //     for (i = 0; i < tabcontent.length; i++) {
        //         tabcontent[i].style.display = "none";
        //         tabcontent[i].className += "";
        //     }
        //     tablinks = document.getElementsByClassName("tablinks");
        //     for (i = 0; i < tablinks.length; i++) {
        //         tablinks[i].className = tablinks[i].className.replace(" active", "");
        //     }
        //     for (i = 0; i < tabcontent.length; i++) {
        //         tabcontent[i].className = tabcontent[i].className.replace(" active", "");
        //     }
        //     document.getElementById(tabName).style.display = "flex";
        //     evt.currentTarget.className += " active";
        //     document.getElementById(tabName).className += " active";
        // }
        // document.getElementById("defaultOpen").click();
    </script>
@endsection
