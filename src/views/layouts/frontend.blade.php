<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kurz programování webu @yield('title', '')</title>

    <link href="/vendor/c18app/cmsx/fontawesome/5.0.6/css/fontawesome-all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>

    @include('cmsx::css.frontendstyle')
    <?php
        $header_html = \C18app\Cmsx\Models\Translate::where('title', 'html_header')->first();
    ?>
    @isset($header_html)
        {!! $header_html->content !!}
    @endisset
</head>
<body class="frontend">
@include('cmsx::frontend.menu.top')
<div class="container">
    <div class="row">
        <div class="col-lg-2">
            @include('cmsx::frontend.menu.side')
        </div>
        <div class="col-lg-10">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>