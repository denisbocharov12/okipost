<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Title  -->
    <title>Invoice Print Okipost Moldova</title>
    <!-- StyleSheets  -->
{{--    <link rel="stylesheet" href="{{asset('/backend')}}/assets/css/dashlite.css?ver=2.4.0">--}}
{{--    <link id="skin-default" rel="stylesheet" href="{{asset('/backend')}}/assets/css/theme.css?ver=2.4.0">--}}
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure,
        footer, header, hgroup, menu, nav, section {
            display: block;
        }
        body {
            line-height: 1;
            margin: 30px;
        }
        ol, ul {
            list-style: none;
        }
        blockquote, q {
            quotes: none;
        }
        blockquote:before, blockquote:after,
        q:before, q:after {
            content: '';
            content: none;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
        img{
            width: 100%;
            object-fit: cover;
        }
        h1{
            font-weight: 700;
            font-size: 14px;
        }
        p{
            margin: 15px 0px;
        }
        .invoice-wrap .invoice-brand img{
            width: 250px;
        }
        .invoice-contact .overline-title{
            font-weight: bold;
            font-size: 28px;
        }
        .invoice-contact-info{
            margin-top: 10px;
            margin-left: 5px;
        }
        .invoice-contact-info h4{
            margin-bottom: 5px;
            font-size: 20px;
            font-weight: 600;
        }
        .invoice-contact-info ul li{
            margin-bottom: 2.5px;
        }
        .invoice-desc h3{
            font-weight: bold;
            font-size: 20px;
            margin-top: 20px;
            margin-bottom: 5px;
        }
        .invoice-desc ul{
            background-color: #f3f3f3;
            border-radius: 5px;
            padding: 20px;
        }
        .invoice-desc ul li{
            margin-left: 5px;
            margin-bottom: 2.5px;
        }
        .invoice-desc ul li .bold{
            font-weight: bold;
        }
        .invoice-brand{
            margin-top: 50px;
            text-align: center;
        }
        .invoice-brand img{
            display: block;
        }
    </style>
</head>
<body>
<div class="invoice-wrap">
    <div class="invoice-brand text-center">
        <img src="https://okipost.md/frontend/assets/images/logo-color-pdf.png" alt="">
    </div>
    <div class="invoice-head">
        <div class="invoice-contact">
            <span class="overline-title">Invoice To</span>
            <div class="invoice-contact-info">
                <h4 class="title">{{$user->first_name}} {{$user->last_name}}</h4>
                <ul class="list-plain">
                    <li><em class="icon ni ni-call-fill fs-14px"></em><span>{{$user->user_id}}</span></li>
                    <li><em class="icon ni ni-map-pin-fill fs-18px"></em><span>{{$user->email}}</span></li>
                    <li><em class="icon ni ni-call-fill fs-14px"></em><span>{{$user->phone}}</span></li>
                </ul>
            </div>
        </div>
        <div class="invoice-desc">
            <h3 class="title">Invoice</h3>
            <ul class="list-plain">
                <li class="invoice-id"><span class="bold">Invoice ID</span>: <span>{{$payed->id}}</span></li>
                <li class="invoice-date"><span class="bold">Date</span>: <span>{{$payed->created_at}}</span></li>
                <li><span class="bold">Сумма к оплате</span>: <span>{{$payed->needed_sum}} {{$payed->currency}}</span></li>
                <li><span class="bold">Кем</span>: <span>{{$user->first_name}} {{$user->last_name}}</span></li>
                <li><span class="bold">ID</span>: <span>{{$payed->code}}</span></li>
                <li><span class="bold">IDNO</span>: <span>{{$user->user_id}}</span></li>
                <li><span class="bold">Email</span>: <span>{{$user->email}}</span></li>
                <li><span class="bold">Телефон</span>: <span>{{$user->phone}}</span></li>
            </ul>
        </div>
    </div><!-- .invoice-head -->
</div><!-- .invoice-wrap -->
</body>
</html>
