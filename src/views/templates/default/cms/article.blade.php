@extends(Config('cmsx.app.template').'::layouts.main', ['contentType' => 'article', 'contentData' => $article])

@section('title', ' - ' . $article->title)

@section('content-title', $article->title)

@section('content')
    {!! $article->formatedContent !!}
@endsection

