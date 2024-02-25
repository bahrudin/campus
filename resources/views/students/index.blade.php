@extends('layouts.app')

@section('contents')
    <div class="row py-3">
        <div class="col-md-12 bg-light p-4 rounded">
            <form method="GET" id="searchForm">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control form-control-sm" name="searchData" id="searchData">
                    </div>
                    <div class="col-4">
                        <div class="btn-group">
                            <button class="btn btn-info btn-sm" type="submit" id="searchSubmit">Search</button>
                            <a class="btn btn-secondary btn-sm" id="searchReset">Reset</a>
                        </div>
                    </div>
                    <span class="text-muted fs-6">*kata kunci berdasarkan nik, nama, jeni kelamin, alamat</span>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title"><h5 class="text-muted p-2">Tabel List Mahasiswa</h5></div>
                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered table-responsive-sm w-100 data-table">
                            <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">JNS KELAMIN</th>
                                <th class="text-center" style="width:200px">ALAMAT</th>
                                <th class="text-center">JUMLAH MATA KULIAH</th>
                                <th class="text-center" style="width: 150px;">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus item ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="btnConfirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            let itemIdToDelete;
            let eTable = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                responsive: true,
                autoWidth: false,
                language: {
                    processing: '<span><h5>Proses Menampilkan Data...</h5></span>',
                },
                ajax: {
                    url: '{{ route('students.data') }}',
                    data: function (d) {
                        d.getName = $('input[name=searchData]').val();
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', "width":"6%"},
                    {data: 'nik', name: 'nik', className: 'text-left',"width": "10%"},
                    {data: 'name', name: 'name', className: 'text-left'},
                    {data: 'gender', name: 'gender', className: 'text-center'},
                    {data: 'address', name: 'address', className: 'text-left', "width": "30%"},
                    {
                        data: 'total_lessons', name: 'total_lessons', className: 'text-center',"width": "15%",
                        render: function (data, type, full, meta) {
                            return data;
                        }
                    },
                    {
                        data: 'action', name: 'action', orderable: false, searchable: false,
                        className: 'text-center', width: '150px'
                    },
                ]
            });

            //Button reset search
            $('#searchReset').on('click', function () {
                $('#searchForm')[0].reset();
                eTable.ajax.reload();
            });
            //Button search to submit
            $('#searchForm').on('submit', function (e) {
                e.preventDefault();
                eTable.ajax.reload();
            });
            //Delete row
            $('body').on('click', '.btnDelete', function () {
                itemIdToDelete = $(this).data('id');
                $('#confirmDeleteModal').modal('show');
            });
            //Button modal confirm
            $('#btnConfirmDelete').on('click', function () {
                $.ajax({
                    url: '/students/' + itemIdToDelete,
                    method: 'DELETE',
                    data: {id: itemIdToDelete},
                    success: function (response) {
                        console.log(response.message);
                        eTable.ajax.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

                $('#confirmDeleteModal').modal('hide');
            }); //End btnConfirmDelete
        });
    </script>
@endpush
