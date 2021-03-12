@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="toast"
             data-title="Peringatan"
             data-message="{{ $error }}"
             data-type="warning">
        </div>
    @endforeach
@endif
