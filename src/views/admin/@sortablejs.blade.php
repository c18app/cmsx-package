<script type="application/javascript">
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
            $.post('{{ route('admin.sort', ['type'=>$type]) }}', {'ids': ids, '_token': '{{ csrf_token() }}'});
        }
    }).disableSelection();
</script>