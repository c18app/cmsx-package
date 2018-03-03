@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a href="{{ route('articles.index') }}" class="btn btn-link btn-xs" role="button"><span
                            class="far fa-arrow-alt-circle-left"></span> Back</a>
                <a href="{{ route('articles.edit', ['article'=>$article]) }}" class="btn btn-warning btn-xs"
                   role="button"><span class="fas fa-pencil-alt"></span> Edit</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ $article->getUrl() }}" target="_blank">{{ $article->getUrl() }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <tr>
                    <th class="col-lg-2">id</th>
                    <th class="col-lg-10">value</th>
                </tr>
                <tr>
                    <td class="active">title:</td>
                    <td>{{ $article->title }}</td>
                </tr>
                <tr>
                    <td class="active">content:</td>
                    <td>{{ $article->content }}</td>
                </tr>
                <tr>
                    <td class="active">tags:</td>
                    <td>
                        {{ $article->tags->implode('title', '; ') }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
