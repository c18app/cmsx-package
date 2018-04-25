@extends(Config('cmsx.app.template').'::layouts.main', ['content-type' => 'page', 'content-data' => $page])

@section('title', ' - ' . $page->title)

@section('content-title', $page->title)

@section('content')
    {!! $page->formatedContent !!}
@endsection

