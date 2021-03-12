<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Akivitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="formedit">
                @method("PATCH")
                @csrf
                <div class="modal-body">
                    <label for="name">Nama Metode</label>
                    <div class="form-group focused">
                        <select id="method_edit" class="form-control" name="method_id">
                            @foreach($methods as $method)
                                <option id="option{{ $method->id }}" value="{{ $method->id }}">{{ $method->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('methods.index') }}"><span>Buat Metode Baru</span></a>
                    </div>
                    <label for="name">Rentang Waktu</label>
                    <div class="form-group focused">
                        <input id="staydate_edit" type="text" class="form-control" name="staydate" value="" />
                    </div>
                    <label for="name">Aktivitas</label>
                    <div class="form-group focused">
                        <input type="hidden" id="methodId"/>
                        <input id="activitas_edit" class="form-control" name="activity" type="text" placeholder="Nama Metode">
                        <span class="text-red"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btnUpdate">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


