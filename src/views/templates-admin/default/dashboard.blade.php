@extends(Config('cmsx.app.template-admin').'::layouts.main')

@section('content')
    <div class="row">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        Pages ({{ \C18app\Cmsx\Models\Page::count() }})
    </div>

@endsection

