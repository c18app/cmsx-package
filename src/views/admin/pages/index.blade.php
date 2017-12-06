@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('pages.create') }}" class="btn btn-primary pull-right" role="button"><span
                        class="fa fa-plus"></span> Page</a>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" id="sortable">
                @foreach($pages as $v)
                    <tr data-order="{{ $v->order }}" data-id="{{ $v->id }}" class="{{ $v->id>0 ? 'sortable' : '' }}">
                        <td class="{{ $v->id>0 ? 'handle' : '' }}" style="position: relative;">
                            <div class="drag"></div>
                        </td>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->title }}</td>
                        <td>{{ $v->tags->implode('title', '; ') }}</td>
                        <td class="text-right">
                            <form action="{{ route('pages.destroy', ['page'=>$v]) }}" method="post" id="deletePage_{{ $v->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="del" value="{{ $v->id }}">
                                <input type="hidden" name="hash" value="{{ sha1('hash-delete-page-id-'.$v->id) }}">
                            </form>
                            <a href="javascript:void(0);" class="btn btn-danger"
                                                  role="button" onclick="return confirmForm('delete Page?', $('form#deletePage_{{ $v->id }}'));"><span class="fa fa-times"></span> Delete</a>
                            <a href="{{ route('pages.edit', ['page'=>$v]) }}" class="btn btn-warning"
                               role="button"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="{{ route('pages.show', ['page'=>$v]) }}" class="btn btn-info"
                               role="button"><span class="fa fa-search"></span> Detail</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('cmsx::admin.@sortablejs', ['type'=>'Page'])
    @include('cmsx::admin.@confirmjs')
@endsection
