@extends(Config('cmsx.app.template').'::layouts.main', ['contentType' => 'page', 'contentData' => $page])

@section('title', ' - ' . $page->title)

@section('content-title', $page->title)

@section('content')
    {!! $page->formatedContent !!}
@endsection

