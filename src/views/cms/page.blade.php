@extends('cmsx::layouts.frontend')

@section('title', ' - ' . $page->title)

@section('content')
    <h1>{{ $page->title }}</h1>
    {!! nl2br($page->content) !!}
@endsection

