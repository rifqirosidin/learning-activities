<button type="button" data-method="{{ $learning->method->id}}"
        data-activity="{{ $learning->activity }}"
        data-dataid="{{ $learning->id }}"
        data-start_date="{{ \Carbon\Carbon::parse($learning->start_date)->format('m/d/Y') }}"
        data-end_date="{{ \Carbon\Carbon::parse($learning->end_date)->format('m/d/Y') }}"
        class="btn btn-xs btn-primary btnEdit"> Edit
</button>
<button class="btn btn-xs btn-danger"
        onclick="moveToTrash('{{ $learning->id  }}',
            '{{ $learning->activity }}')">Delete
</button>
