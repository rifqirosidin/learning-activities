<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Metode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <label for="name">Nama Metode</label>
                    <div class="form-group focused">
                        <input type="hidden" id="methodId"/>
                        <input class="form-control" name="method" type="text" placeholder="Nama Metode">
                        <span class="text-red"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnUpdate" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

