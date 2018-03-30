@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('error'))
    <div class="row">
        <div class="col">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        </div>
    </div>
@endif

@if(Session::has('confirm'))
    <div class="row">
        <div class="col">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="alert alert-success">{{ Session::get('confirm') }}</p>
        </div>
    </div>
@endif