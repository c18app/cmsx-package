@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div>
                <a href="{{ route('translates.index') }}" class="btn btn-link btn-xs pull-right" role="button"><span
                            class="fa far-arrow-circle-left"></span> Back</a>
            </div>
            <div class="clearfix"></div>
            @include('cmsx::admin.translates.@form', ['action'=>route('translates.store')])
        </div>
    </div>
@endsection
