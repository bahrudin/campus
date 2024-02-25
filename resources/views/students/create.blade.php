@extends('layouts.app')
@push('styles')
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <style>
        .select2 {
            width: 100% !important;
        }
    </style>
@endpush

@section('contents')
    <div class="container">
        <h5 class="text-muted p-2">Form Mahasiswa | Tambah</h5>
        <div class="bg-light p-5 rounded mt-3">
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-6">
                        <input type="text" name="nik" class="form-control form-control-sm" id="nik">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control form-control-sm" id="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <div class="form-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender1"
                                   value="Laki-laki">
                            <label class="form-check-label" for="gender">Laki-Laki</label>
                            <input class="form-check-input" type="radio" name="gender" id="gender2"
                                   value="Perempuan">
                            <label class="form-check-label" for="gender">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-6">
                        <textarea name="address" class="form-control form-control-sm" id="address" rows="2"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8 my-3">
                        <div class="table-responsive">
                            <table id="dynamicInputs" class="table table-sm table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>MATAKULIAH</th>
                                    <th>AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Baris input default -->
                                <tr id="row_1">
                                    <td>1</td>
                                    <td><select name="addMore[0][lesson]"
                                                class="form-control form-control-sm lessonTitle"
                                                id="lessonDefault"></select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success addInput">Tambah</button>
                                        <button type="button" class="btn btn-danger btn-sm deleteInput" data-index="1"
                                                disabled>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <p><small class="text-muted"><b>Note : </b>Ketik satu huruf, tanda silang (X) untuk reset
                                pilihan.</small></p>
                    </div>
                </div>
                <!-- Upload File -->
                <div class="form-group row">
                    <label for="nik" class="col-sm-2 col-form-label">Upload KRS</label>
                    <div class="col-sm-6">
                        <input type="file" name="uploadDoc" class="form-control form-control-sm" id="uploadDoc"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <a href="{{ route('students.index') }}" class="btn btn-sm btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function () {
            var index = 2; // Mulai dengan 2 karena baris default sudah ada
            // Inisialisasi Select2 untuk semua elemen dengan kelas lessonTitle
            $('.lessonTitle').select2({
                allowClear: true,
                placeholder: "Pilih Matakuliah",
                width: '100%',
                ajax: {
                    url: '/autocomplete-students',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.title,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('#dynamicInputs').on('click', '.addInput', function () {
                let newRow = $('<tr id="row_' + index + '"><td>' + index + '</td><td><select name="addMore[' + index + '][lesson]" class="form-control form-control-sm lessonTitle"></select></td><td><button type="button" class="btn btn-sm btn-success addInput">Tambah</button> <button type="button" class="btn btn-sm btn-danger deleteInput" data-index="' + index + '">Hapus</button></td></tr>');
                $('#dynamicInputs tbody').append(newRow);
                // Inisialisasi Select2 untuk elemen select baru
                $('#row_' + index + ' .lessonTitle').select2({
                    allowClear: true,
                    placeholder: "Pilih Matakuliah",
                    width: '100%',
                    ajax: {
                        url: '/autocomplete-students',
                        dataType: 'json',
                        delay: 250,
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.title,
                                        id: item.id
                                    }
                                })
                            };
                        },
                        cache: true
                    }
                });

                index++;
            });

            $('#dynamicInputs').on('click', '.deleteInput', function () {
                var dataIndex = $(this).data('index');
                if (dataIndex !== 1) { // Memeriksa apakah input yang akan dihapus bukanlah input pertama
                    $('#row_' + dataIndex).remove();
                    resetIndex(); // Panggil fungsi untuk mengatur ulang indeks setelah penghapusan
                }
            });

            $('#dynamicForm').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serializeArray();
                console.log(formData);
            });

            function resetIndex() {
                var rows = $('#dynamicInputs tbody').children('tr');
                if (rows.length === 0) {
                    index = 1; // Jika tidak ada baris, kembalikan indeks ke 1
                } else {
                    index = rows.length + 1; // Kembalikan indeks berikutnya dari jumlah baris yang tersisa
                }
                // Perbarui nomor urut pada setiap baris
                rows.each(function (i) {
                    $(this).find('td:first').text(i + 1);
                });
            }
        });
    </script>
@endpush
