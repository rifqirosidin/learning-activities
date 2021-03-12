@extends('layouts.base_layout')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header white">Learning Activity</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover data-tables"
                               data-options='{"searching":true}'>
                            <thead>
                            <tr>
                                <th>Nama Metode</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($methods as $method)
                                <tr class="row{{ $method->id }}">
                                    <td class="item{{ $method->id }}">{{ $method->name }}</td>
                                    <td>
                                        <button type="button" data-methodid="{{ $method->id }}" data-name="{{ $method->name }}" class="btn btn-xs btn-primary btnEdit" data-toggle="modal" data-target="#modalEdit">Edit
                                        </button>
                                        <button onclick="methodDelete('{{ $method->id }}', '{{ $method->name }}')" class="btn btn-xs btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header white">
                        Buat Metode
                    </div>
                    <div class="card-body">
                        <form action="{{ route('methods.store') }}" method="post">
                            @csrf
                            <label for="name">Nama Metode</label>
                            <div class="form-group focused">
                                <input class="form-control" name="name" type="text" placeholder="Nama Metode">
                                <span class="text-red"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('modal')
    @include('method.modal_create')
@endpush
@push('js')
    <script>

        $(document).ready(function () {

            $(" button[type='submit']").click(function (e) {
                e.preventDefault();
                let name = $(" input[name='name']").val();
                $.ajax({
                    type: "post",
                    url: "{{ route('methods.store') }}",
                    data: {
                        'name': name
                    },
                    success: function (data) {
                        console.log(data)
                        $(" .dataTables_empty").remove()
                        $(" input[name='name']").val("");
                        let methodName = data.name;
                        $(" tbody").append(`<tr class="row${data.id}">
                                    <td class="item${data.id}">${data.name}</td>
                                    <td>
                                        <button type="button" data-methodid="${data.id}" data-name="${methodName}" class="btn btn-xs btn-primary btnEdit" data-toggle="modal" data-target="#modalEdit">Edit
                                        </button>
                                        <button onclick="methodDelete('${data.id}', '${data.name}')" class="btn btn-xs btn-danger">Delete</button>
                                    </td>
                                </tr>`)
                        swal("Sukses!", "Buat Metode Sukses", "success");
                    },
                    error: function (data) {
                        console.log(data);
                        $(" span").html(data.responseJSON.errors['name'][0]);
                        swal("Failed", "Buat Metode Failed", "error");
                    }
                })
            });


            $(document).on('click', '.btnEdit', function (e) {
                let data = $(this).data('name')
                let id = $(this).data('methodid')
                console.log("iddd " + id)
                $(" input[name='method']").val(data);
                $(" #methodId").val(id);
            })

            $("#btnUpdate").click(function () {
                let name =  $(" input[name='method']").val();
                let id = $(" #methodId").val()
                let theUrl = "{{ route('methods.update', ':id') }}";
                theUrl = theUrl.replace(":id", id);
                $.ajax({
                    type: "PATCH",
                    url: theUrl,
                    data: {
                        'id': id,
                        'name': name
                    },
                    success: function (data) {
                        $(" .item" + id).html(name)
                        $(" input[name='method']").val("");
                        $('#modalEdit').modal('hide')
                        swal("Sukses!", "Update Metode Sukses", "success");
                    },
                    error: function (data) {
                        console.log(data);
                        if (data.responseJSON.errors['name'][0] != ""){
                            $(" span").html(data.responseJSON.errors['name'][0]);
                        }
                        swal("Failed", "Update Metode Failed", "error");
                    }
                })
            })
        })

        function methodDelete(id, method) {
            let theUrl = "{{ route('methods.destroy', ':id') }}";
            console.log("id" + id)
            theUrl = theUrl.replace(":id", id);

            swal({
                title: "Apakah anda yakin?",
                text: "Menghapus item " + method,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "Delete",
                            url: theUrl,
                            success: function (data) {
                                console.log(data)
                                $(" .row" + id).remove()
                                swal("Sukses!", "Hapus Metode Sukses", "success");
                            },
                            error: function (data) {
                                console.log(data);
                                if (data.responseJSON.errors['name'][0] != ""){
                                    $(" span").html(data.responseJSON.errors['name'][0]);
                                }
                                swal("Failed", "Hapus Metode Failed", "error");
                            }
                        })
                    } else {
                        swal("Delete Batal");
                    }
                });
        }
    </script>
@endpush
