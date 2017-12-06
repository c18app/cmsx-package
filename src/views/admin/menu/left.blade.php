<ul class="nav nav-sidebar">
    <li class="{{ Request()->route()->named('pages.*') ? ' active' : '' }}">
        <a href="{{ route('pages.index') }}"><span class="fa fa-file-text"></span>&nbsp;&nbsp;Pages</a>
    </li>
    <li class="{{ Request()->route()->named('admin.article') ? ' active' : '' }}">
        <a href="{{ route('admin.article') }}" class="text-muted"><span class="fa fa-file-text-o"></span>&nbsp;&nbsp;Articles</a>
    </li>
    <li class="{{ Request()->route()->named('admin.content') ? ' active' : '' }}">
        <a href="{{ route('admin.content') }}" class="text-muted"><span class="fa fa-yelp"></span>&nbsp;&nbsp;Content</a>
    </li>
    <li class="{{ Request()->route()->named('admin.comment') ? ' active' : '' }}">
        <a href="{{ route('admin.comment') }}" class="text-muted"><span class="fa fa-commenting-o"></span>&nbsp;&nbsp;Comments</a>
    </li>
    <li class="{{ Request()->route()->named('tags.*') ? ' active' : '' }}">
        <a href="{{ route('tags.index') }}"><span class="fa fa-tag"></span>&nbsp;&nbsp;Tags</a>
    </li>
    <li class="{{ Request()->route()->named('admin.category') ? ' active' : '' }}">
        <a href="{{ route('admin.category') }}" class="text-muted"><span class="fa fa-sitemap"></span>&nbsp;&nbsp;Categories</a>
    </li>
    <li class="{{ Request()->route()->named('admin.file') ? ' active' : '' }}">
        <a href="{{ route('admin.file') }}" class="text-muted"><span class="fa fa-file-o"></span>&nbsp;&nbsp;Files</a>
    </li>
    <li class="{{ Request()->route()->named('admin.gallery') ? ' active' : '' }}">
        <a href="{{ route('admin.gallery') }}" class="text-muted"><span class="fa fa-picture-o"></span>&nbsp;&nbsp;Galleries</a>
    </li>
    <li class="{{ Request()->route()->named('admin.menu') ? ' active' : '' }}">
        <a href="{{ route('admin.menu') }}" class="text-muted"><span class="fa fa-bars"></span>&nbsp;&nbsp;Menus</a>
    </li>
    <li class="{{ Request()->route()->named('admin.user') ? ' active' : '' }}">
        <a href="{{ route('admin.user') }}" class="text-muted"><span class="fa fa-user-o"></span>&nbsp;&nbsp;Users</a>
    </li>
    <li class="{{ Request()->route()->named('admin.maillist') ? ' active' : '' }}">
        <a href="{{ route('admin.maillist') }}" class="text-muted"><span class="fa fa-envelope-o"></span>&nbsp;&nbsp;MailList</a>
    </li>
    <li class="{{ Request()->route()->named('admin.setting') ? ' active' : '' }}">
        <a href="{{ route('admin.setting') }}" class="text-muted"><span class="fa fa-cog"></span>&nbsp;&nbsp;Settings</a>
    </li>
    <li class="{{ Request()->route()->named('admin.translate') ? ' active' : '' }}">
        <a href="{{ route('admin.translate') }}" class="text-muted"><span class="fa fa-globe"></span>&nbsp;&nbsp;Translates</a>
    </li>
</ul>