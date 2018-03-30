@extends(Config('cmsx.app.template').'::layouts.main')

@section('title', ' - ' . $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>
    {!! $article->formatedContent !!}
@endsection

