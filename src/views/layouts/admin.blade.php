<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <script src="https://use.fontawesome.com/d63a82012b.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    @include('cmsx::css.adminstyle')
</head>
<body class="admin">
@include('cmsx::admin.menu.top')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 sidebar">
            @include('cmsx::admin.menu.left')
        </div>

        <div class="col-lg-10 col-lg-offset-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @include('cmsx::flash')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>