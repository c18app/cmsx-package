<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @isset($method)
        {{ method_field($method) }}
    @endisset
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $tag->title) }}">
    </div>
    <div class="form-group">
        <button type="submit" class="form-control btn btn-success">Save</button>
    </div>
</form>