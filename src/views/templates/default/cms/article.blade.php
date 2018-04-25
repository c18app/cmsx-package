@extends(Config('cmsx.app.template').'::layouts.main')

@section('title', ' - ' . $article->title)

@section('page-title', $article->title)

@section('content')
    {!! $article->formatedContent !!}
@endsection

