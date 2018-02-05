<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <link href="/vendor/c18app/cmsx/fontawesome/5.0.6/css/fontawesome-all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>

    <link rel="stylesheet" href="/vendor/c18app/cmsx/jquery/ui/1.12.1/themes/base/jquery-ui.min.css">
    <script src="/vendor/c18app/cmsx/jquery/ui/1.12.1/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="/vendor/c18app/cmsx/css/backend/app.css">
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