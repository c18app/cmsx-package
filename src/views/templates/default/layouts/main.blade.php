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
    @includeIf(Config('cmsx.app.template-custom').'header')
</head>
@includeFirst([Config('cmsx.app.template-custom').'maincontent', Config('cmsx.app.template').'::customizable.maincontent'])
</html>