@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('settings.create') }}" class="btn btn-primary pull-right btn-xs" role="button"><span
                        class="fas fa-plus"></span> Setting</a>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" id="sortable">
                @foreach($settings as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->title }}</td>
                        <td class="text-right">
                            <form action="{{ route('settings.destroy', ['tag'=>$v]) }}" method="post"
                                  id="deleteSetting_{{ $v->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="del" value="{{ $v->id }}">
                                <input type="hidden" name="hash" value="{{ sha1('hash-delete-setting-id-'.$v->id) }}">
                            </form>
                            <a href="javascript:void(0);" class="btn btn-danger btn-xs" onclick="$('form#deleteSetting_{{ $v->id }}').submit();"><span class="fas fa-times"></span>
                                Delete</a>
                            <a href="{{ route('settings.edit', ['tag'=>$v]) }}" class="btn btn-warning btn-xs"
                               role="button"><span class="fas fa-pencil-alt"></span> Edit</a>
                            <a href="{{ route('settings.show', ['tag'=>$v]) }}" class="btn btn-info btn-xs"
                               role="button"><span class="fas fa-search"></span> Detail</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('cmsx::admin.@confirmjs')
@endsection
