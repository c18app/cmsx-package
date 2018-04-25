@extends(Config('cmsx.app.template').'::layouts.main', ['content-type' => 'article', 'content-data' => $article])

@section('title', ' - ' . $article->title)

@section('content-title', $article->title)

@section('content')
    {!! $article->formatedContent !!}
@endsection

