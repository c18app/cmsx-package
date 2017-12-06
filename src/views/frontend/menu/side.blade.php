<ul class="side-nav">
    <li class="title">
        <strong>Obsah</strong>
    </li>
    @foreach(\Cms18\CmsX\Models\Page::orderBy('order', 'asc')->orderby('id', 'desc')->get() as $page)
        <li class="item"><a href="{{ $page->getUrl() }}">{{ $page->title }}</a></li>
    @endforeach
</ul>
