@extends('cmsx::layouts.frontend')

@section('title', ' - ' . $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>
    {!! $article->formatedContent !!}
@endsection

