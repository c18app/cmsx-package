@extends('cmsx::layouts.frontend')

@section('title', ' - ' . $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>
    {!! nl2br($article->content) !!}
@endsection

