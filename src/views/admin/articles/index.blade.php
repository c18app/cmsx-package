@extends('cmsx::layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('articles.create') }}" class="btn btn-primary btn-xs pull-right" role="button"><span
                        class="fas fa-plus"></span> Article</a>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                @foreach($articles as $v)
                    <tr data-order="{{ $v->order }}" data-id="{{ $v->id }}" class="{{ $v->id>0 ? 'sortable' : '' }}">
                        <td class="{{ $v->id>0 ? 'handle' : '' }}" style="position: relative;">
                            <div class="drag"></div>
                        </td>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->title }}</td>
                        <td>{{ $v->tags->implode('title', '; ') }}</td>
                        <td class="text-right">
                            <form action="{{ route('articles.destroy', ['article'=>$v]) }}" method="post" id="deleteArticle_{{ $v->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="del" value="{{ $v->id }}">
                                <input type="hidden" name="hash" value="{{ sha1('hash-delete-article-id-'.$v->id) }}">
                            </form>
                            <a href="javascript:void(0);" class="btn btn-danger btn-xs"
                                                  role="button" onclick="return confirmForm('delete Article?', $('form#deleteArticle_{{ $v->id }}'));"><span class="fas fa-times"></span> Delete</a>
                            <a href="{{ route('articles.edit', ['article'=>$v]) }}" class="btn btn-warning btn-xs"
                               role="button"><span class="fas fa-pencil-alt"></span> Edit</a>
                            <a href="{{ route('articles.show', ['article'=>$v]) }}" class="btn btn-info btn-xs"
                               role="button"><span class="fas fa-search"></span> Detail</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script>
        $("table").sortable({
            items: "tr.sortable",
            handle: ".handle div.drag",
            appendTo: "parent",
            helper: "clone",
            update: function (event, ui) {
                var ids = [];
                var i = 0;
                $('table tr.sortable').each(function () {
                    ids[i++] = $(this).data('id');
                })
                $.post('{{ route('admin.sort', ['type'=>'Article']) }}', {'ids': ids, '_token': '{{ csrf_token() }}'});
            }
        }).disableSelection();
    </script>
@endsection
