@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        Pages ({{ \Cms18\CmsX\Models\Page::count() }})
    </div>

@endsection

