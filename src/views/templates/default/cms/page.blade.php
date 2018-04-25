@extends(Config('cmsx.app.template').'::layouts.main')

@section('title', ' - ' . $page->title)

@section('page-title', $page->title)

@section('content')
    {!! $page->formatedContent !!}
@endsection

