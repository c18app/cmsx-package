@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a href="{{ route('settings.index') }}" class="btn btn-link btn-xs" role="button"><span
                            class="far fa-arrow-alt-circle-left"></span> Back</a>
                <a href="{{ route('settings.edit', ['setting'=>$setting]) }}" class="btn btn-warning btn-xs"
                   role="button"><span class="fas fa-pencil-alt"></span> Edit</a>
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
                    <td>{{ $setting->title }}</td>
                </tr>
                <tr>
                    <td class="active">content:</td>
                    <td>{{ $setting->content }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
