@extends(Config('cmsx.app.template-admin').'::layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div>
                <a href="{{ route('tags.index') }}" class="btn btn-link btn-xs pull-right" role="button"><span
                            class="fa far-arrow-circle-left"></span> Back</a>
            </div>
            <div class="clearfix"></div>
            @include(Config('cmsx.app.template-admin').'::tags.@form', ['action'=>route('tags.store')])
        </div>
    </div>
@endsection
