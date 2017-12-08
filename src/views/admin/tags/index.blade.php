@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('tags.create') }}" class="btn btn-primary pull-right btn-xs" role="button"><span
                        class="fa fa-plus"></span> Tag</a>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" id="sortable">
                @foreach($tags as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->title }}</td>
                        <td>{!! $v->invisible ? '<span class="btn btn-default btn-xs">invisible</span>' : '' !!}</td>
                        <td class="text-right">
                            <form action="{{ route('tags.destroy', ['tag'=>$v]) }}" method="post"
                                  id="deleteTag_{{ $v->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="del" value="{{ $v->id }}">
                                <input type="hidden" name="hash" value="{{ sha1('hash-delete-tag-id-'.$v->id) }}">
                            </form>
                            @if($v->pages()->count()>0)
                                <a href="javascript:void(0);" class="btn btn-danger  btn-xs"
                                   role="button"
                                   onclick="return confirmForm('delete Tag?', $('form#deleteTag_{{ $v->id }}'));"><span
                                            class="fa fa-times"></span> Delete ({{ $v->pages()->count() }})</a>
                            @else
                                <a href="javascript:void(0);" class="btn btn-danger btn-xs" onclick="$('form#deleteTag_{{ $v->id }}').submit();"><span class="fa fa-times"></span>
                                    Delete</a>
                            @endif
                            <a href="{{ route('tags.edit', ['tag'=>$v]) }}" class="btn btn-warning btn-xs"
                               role="button"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="{{ route('tags.show', ['tag'=>$v]) }}" class="btn btn-info btn-xs"
                               role="button"><span class="fa fa-search"></span> Detail</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('cmsx::admin.@confirmjs')
@endsection
