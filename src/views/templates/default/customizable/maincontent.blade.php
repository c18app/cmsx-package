<body class="frontend">
@include(Config('cmsx.app.template').'::frontend.menu.top')
<div class="container" id="main-content">
    <div class="row">
        <div class="col-lg-2">
            @include(Config('cmsx.app.template').'::frontend.menu.side')
        </div>
        <div class="col-lg-10">
            @yield('content')
        </div>
    </div>
</div>
@include(Config('cmsx.app.template').'::frontend.menu.bottom')
</body>