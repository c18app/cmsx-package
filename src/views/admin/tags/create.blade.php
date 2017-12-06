@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div>
                <a href="{{ route('tags.index') }}" class="btn btn-default pull-right" role="button"><span
                            class="fa fa-arrow-circle-left"></span> Back</a>
            </div>
            <div class="clearfix"></div>
            @include('cmsx::admin.tags.@form', ['action'=>route('tags.store')])
        </div>
    </div>
@endsection
