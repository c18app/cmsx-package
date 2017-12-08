@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a href="{{ route('tags.index') }}" class="btn btn-link btn-xs" role="button"><span
                            class="fa fa-arrow-circle-left"></span> Back</a>
                <a href="{{ route('tags.edit', ['tag'=>$tag]) }}" class="btn btn-warning btn-xs"
                   role="button"><span class="fa fa-pencil"></span> Edit</a>
            </div>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <tr>
                    <th class="col-lg-2">id</th>
                    <th class="col-lg-10">value</th>
                </tr>
                <tr>
                    <td class="active">title:</td>
                    <td>{{ $tag->title }}</td>
                </tr>
                <tr>
                    <td class="active">invisible:</td>
                    <td>{{ $tag->invisible }}</td>
                </tr>
            </table>
        </div>
    </div>

    @if($tag->pages()->count()>0)
        <div class="row">
            <div class="col-lg-12">
                Uses in Pages
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    @foreach($tag->pages as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->title }}</td>
                            <td class="text-right">
                                <a href="{{ route('pages.edit', ['page'=>$v]) }}" class="btn btn-warning btn-xs"
                                   role="button"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="{{ route('pages.show', ['page'=>$v]) }}" class="btn btn-info btn-xs"
                                   role="button"><span class="fa fa-search"></span> Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
    @endif
@endsection
