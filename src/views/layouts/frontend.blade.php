<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('cmsx.app.name') }} @yield('title', '')</title>

    <link href="/vendor/c18app/cmsx/fontawesome/5.0.6/css/fontawesome-all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>

    <link rel="stylesheet" href="/vendor/c18app/cmsx/css/frontend/app.css">
    @includeIf('cmsx::custom.frontend.layout.header')
</head>
<body class="frontend">
@include('cmsx::frontend.menu.top')
<div class="container" id="main-content">
    <div class="row">
        <div class="col-lg-2">
            @include('cmsx::frontend.menu.side')
        </div>
        <div class="col-lg-10">
            @yield('content')
        </div>
    </div>
</div>
@include('cmsx::frontend.menu.bottom')
</body>
</html>