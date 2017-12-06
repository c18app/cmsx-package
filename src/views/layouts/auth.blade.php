<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>

    @include('cmsx::css.authstyle')
</head>
<body class="auth">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @include('cmsx::flash')
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>