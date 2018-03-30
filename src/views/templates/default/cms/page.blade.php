@extends(Config('cmsx.app.template').'::layouts.main')

@section('title', ' - ' . $page->title)

@section('content')
    <h1>{{ $page->title }}</h1>
    {!! $page->formatedContent !!}
@endsection

