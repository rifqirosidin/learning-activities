@extends('layouts.base_layout')
@section('content')
    <div class="container-fluid">
        @include('component.toast')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header white">
                        Learning Activity
                        <div class="float-right">
                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                    data-target="#modalCreate">
                                Buat Baru
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <a href="{{ route('learning-activities.index') }}" class="btn btn-xs btn-primary mb-3 mr-3"><i
                                    class="icon icon-home"></i>Active</a>
                            <a href="{{ route('trashed.index') }}" class="btn btn-xs btn-danger mb-3"><i
                                    class="icon icon-trash"></i>Trash</a>
                        </div>

                        <table class="table table-bordered table-hover data-tables"
                               data-options='{"searching":true}'>
                            <thead>
                            <tr>
                                <th>Nama Metode</th>
                                <th>Learning Activity</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($learnings as $learning)
                                <tr>
                                    <td>{{ $learning->method->name }}</td>
                                    <td>{{ $learning->activity }}</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-primary"
                                                onclick="restoreItem('{{ $learning->id  }}',
                                                    '{{ $learning->activity }}')">Restore
                                        </button>
                                        <button class="btn btn-xs btn-danger"
                                                onclick="permanentDelete('{{ $learning->id  }}',
                                                    '{{ $learning->activity }}')">Delete
                                        </button>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('modal')
    @include('learning_activity.modal_edit')
    @include('learning_activity.modal_create')
@endpush
@push('js')
    @include('component.alert')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>

    <script>
        $(function () {
            $('input[name="staydate"]').daterangepicker({
                opens: 'left'
            }, function (start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>

    <script>
        let type = "post";
        $(document).ready(function () {
            type = "edit";
            $(" .btnEdit").click(function () {
                $('#modalEdit').modal('show');
                let methodId = $(this).data('method');
                let activity = $(this).data('activity');
                let start_date = $(this).data('start_date');
                let end_date = $(this).data('end_date');
                let id = $(this).data('dataid');
                let theUrl = "{{ route('learning-activities.update', ':id') }}";
                theUrl = theUrl.replace(':id', id);

                $(" #activitas_edit").val(activity);
                $(" #staydate_edit").val(start_date + " - " + end_date);

                $(" #formedit").attr('action', theUrl);
                $(" #option" + methodId).attr('selected', 'true')

            })
        });

        function permanentDelete(id, name) {
            let theUrl = "{{ route('trashed.destroy', ':id') }}";
            console.log("id" + id);
            theUrl = theUrl.replace(":id", id);

            swal({
                title: "Apakah anda yakin?",
                text: "Mengahapus permanent item " + name,
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
                                window.location.href = data;
                                swal("Sukses!", "Menghapus item  Sukses", "success");
                            },
                            error: function (data) {
                                window.location.href = data;
                                swal("Failed", "Menghapus item Failed", "error");
                            }
                        })
                    } else {
                        swal("Batal");
                    }
                });
        }

        function restoreItem(id, name) {
            let theUrl = "{{ route('trashed.restore', ':id') }}";
            theUrl = theUrl.replace(":id", id);
            swal({
                title: "Apakah anda yakin?",
                text: "Restore item " + name,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "Post",
                            url: theUrl,
                            success: function (data) {
                                window.location.href = data;
                            },
                            error: function (data) {
                                window.location.href = data;
                            }
                        })
                    } else {
                        swal("Batal");
                    }
                });
        }

    </script>
@endpush
