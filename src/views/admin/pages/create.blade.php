@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div>
                <a href="{{ route('pages.index') }}" class="btn btn-default pull-right" role="button"><span
                            class="fa fa-arrow-circle-left"></span> Back</a>
            </div>
            <div class="clearfix"></div>
            @include('cmsx::admin.pages.@form', ['action'=>route('pages.store')])
        </div>
    </div>
@endsection
