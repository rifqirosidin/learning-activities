<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Akivitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('learning-activities.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="name">Nama Metode</label>
                    <div class="form-group focused">
                        <select id="inputState" class="form-control" name="method_id">
                            @foreach($methods as $method)
                                <option value="{{ $method->id }}">{{ $method->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('methods.index') }}"><span>Buat Metode Baru</span></a>
                    </div>
                    <label for="name">Rentang Waktu</label>
                    <div class="form-group focused">
                        <input type="text" class="form-control" name="staydate"
                               value="{{ Carbon\Carbon::now()->format('m/d/Y') }} - {{ Carbon\Carbon::now()->addDay(1)->format('m/d/Y') }}"/>
                    </div>
                    <label for="name">Aktivitas</label>
                    <div class="form-group focused">
                        <input type="hidden" id="methodId"/>
                        <input class="form-control" name="activity" type="text" placeholder="Nama Metode">
                        <span class="text-red"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


