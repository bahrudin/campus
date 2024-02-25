@extends('layouts.app')

@section('contents')
    <div class="row py-3">
        <div class="col-12">
            <div class="card">
                <div class="card-title"><h5 class="text-muted p-2">Tabel List Matakuliah</h5></div>
                <div class="card-body">
                    <div class="pb-2">
                        <a href="javascript:void(0)" class="btn btn-sm btn-primary float-lg-none btnAdd" id="btnAdd">Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm w-100 data-table" id="dataTable">
                            <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">MATA KULIAH</th>
                                <th class="text-center">KETERANGAN</th>
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
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="headingModal">Form Mata Kuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formModal">
                        <input type="hidden" name="id" id="editId">
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Nama Mata Kuliah</label>
                            <input type="text" name="title" class="form-control form-control-sm" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="descriptions" class="col-form-label">Keterangan</label>
                            <textarea name="descriptions" class="form-control form-control-sm"
                                      id="descriptions"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-warning btn-sm" id="btnUpdate">Update</button>
                    <button type="button" class="btn btn-primary btn-sm" id="btnSave">Simpan</button>
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
    <!-- Modal Delete End-->

    <!-- Modal Info-->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">INFO!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-danger" id="infoDescription"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End-->
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            var deleteId;
            var eTable = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                autoWidth: true,
                language: {
                    processing: '<span>Proses Menampilkan Data...</span>',
                },
                ajax: {
                    url: '{{ route('lessons.data') }}',
                    data: function (d) {
                        d.getName = $('input[name=searchData]').val();
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', width:'8%'},
                    {data: 'title', name: 'title', className: 'text-left'},
                    {data: 'descriptions', name: 'name', className: 'descriptions'},
                    {
                        data: 'action', name: 'action', orderable: false, searchable: false,
                        className: 'text-center', width: '150px'
                    },
                ]
            });//Datatables end

            //Button New
            $("#btnAdd").on('click', function () {
                $('#formModal').trigger("reset");
                $('#headingModal').html("Form | Tambah Data");
                $('#btnUpdate').hide();
                $('#btnSave').show();
                $('#myModal').modal('show');
            });

            //Create row Database
            $("#btnSave").on('click', function (e) {
                e.preventDefault();
                let formData = $("#formModal").serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('lessons.store') }}",
                    data: formData,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        alert(data.message);
                        $('#myModal').modal('hide');
                        eTable.draw();
                    },
                    error: function(xhr, status, error) {
                        console.log(error.responseText);
                        let errorMessage = xhr.responseJSON.message;
                        $('#infoDescription').html(errorMessage)
                        $('#infoModal').modal('show')
                    }
                });
            });

            //Button Edit
            $('#dataTable').on('click', '.btn-edit', function () {
                $('#formModal').trigger("reset");
                let dataId = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: '/lessons/' + dataId,
                    success: function (response) {
                        $('#formModal input[name="id"]').val(response.id);
                        $('#formModal input[name="title"]').val(response.title);
                        $('#formModal #descriptions').val(response.descriptions);

                        $('#headingModal').html("Form | Edit Data");
                        $('#btnUpdate').show();
                        $('#btnSave').hide();
                        $('#myModal').modal('show');
                    },
                });
            });

            //Update row Database
            $("#btnUpdate").on('click', function (e) {
                e.preventDefault();
                let formData = $("#formModal").serialize();
                let dataId = $('#formModal').find('input[name="id"]').val();
                $.ajax({
                    type: "PUT",
                    url: "lessons/" + dataId,
                    data: formData,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        alert(data.message);
                        $('#myModal').modal('hide');
                        eTable.draw();
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.errors;
                        $.each(errorMessage, function(key, value) {
                            console.log(value);
                            $('#infoDescription').html(value)
                        });
                        $('#infoModal').modal('show')
                    }
                });
            });

            //Modal confirm
            $('#dataTable').on('click', '.btn-delete', function() {
                deleteId = $(this).data('id');
                $('#confirmDeleteModal').modal('show');
            });

            //Delete row Database
            $('#btnConfirmDelete').click(function() {
                $.ajax({
                    url: '/lessons/' + deleteId,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        alert(response.message);
                        $('#confirmDeleteModal').modal('hide');
                        eTable.ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        let errorMessage = xhr.responseJSON.message;
                        $('#infoDescription').html(errorMessage)
                        $('#infoModal').modal('show')
                    }
                });
            });

        });
    </script>
@endpush
