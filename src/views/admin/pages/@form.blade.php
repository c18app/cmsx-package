@include('cmsx::admin.pages.@@form-includes')

<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @isset($method)
        {{ method_field($method) }}
    @endisset
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $page->title) }}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content">{{ old('content', $page->content) }}</textarea>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        {{--{{ $page->tags()->where('tag_id', $tag->id)->count() }}--}}
        <input type="text" name="tags" id="input-tags" class="input-tags" value="{{ $page->tags->implode('title', ',') }}">
    </div>
    <div class="form-group">
        <button type="submit" class="form-control btn btn-success">Save</button>
    </div>
</form>

<script type="application/javascript">
    $('.input-tags').selectize({
        options: [@foreach(\Cms18\CmsX\Models\Tag::orderBy('title')->get() as $item) {value: "{{ $item->title }}", text: "{{ $item->title }}"}, @endforeach],
        plugins: ['remove_button'],
        persist: false,
        create: true,
        render: {
            item: function(data, escape) {
                return '<div>' + escape(data.text) + '</div>';
            }
        }/*,
        onDelete: function(values) {
            return confirm(values.length > 1 ? 'Are you sure you want to remove these ' + values.length + ' items?' : 'Are you sure you want to remove "' + values[0] + '"?');
        }*/
    });
</script>