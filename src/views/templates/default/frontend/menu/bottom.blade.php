<div id="bottom-content">
@includeFirst([Config('cmsx.app.template-custom').'::bottommenu', Config('cmsx.app.template').'::customizable.bottommenu'])
</div>

<script>
    var wh = $(window).height();
    var th = Math.max($('#top-content .navbar-default').outerHeight(true), $('#top-content').outerHeight(true));
    var bh = $('#bottom-content').outerHeight(true);
    var mhx = $('#top-content').outerHeight(true) -  $('#top-content').height();
    var mh = wh - th - bh - mhx;

    $('#main-content').css('minHeight', mh);
</script>