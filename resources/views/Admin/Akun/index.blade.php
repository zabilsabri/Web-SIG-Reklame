@extends('Admin.layout.app', ['title' => 'Kelola Akun'])
<link rel="stylesheet" href="{{ asset('css/Admin/Penyewaan Reklame/sewaReklame.css') }}">

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
</style>

@section('content')

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show m-5" role="alert">
            <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<table id="tableKelolaAkun" class="table table-striped table-hover">
    <thead>
        <tr class="table-head" >
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Peran</th>
            <th scope="col">Nomor Telpon</th>
            <th scope="col">Email</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
</table>
@endsection

<div class="modal fade" id="tambahAkunModal" tabindex="-1" aria-labelledby="tambahAkunModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahAkunModalLabel">Tambah Data User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-auto">
                        <div class="btn-group">
                            <form action="" id="addUserForm" method="post">
                            <select class="selectpicker" required>
                                <option value="" selected>Peran</option>
                                <option value="Pimpinan">Pimpinan</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <p class="form-label-modal" >Nama</p>
                        <input type="text" class="form-control input-border-blue" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Email</p>
                        <input type="email" class="form-control input-border-blue" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Alamat</p>
                        <input type="text" class="form-control input-border-blue" id="alamat" name="alamat" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <p class="form-label-modal" >Nomor Telpon</p>
                        <input type="number" class="form-control input-border-blue" id="no_telp" name="no_telp" required>
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Password</p>
                        <input type="text" class="form-control input-border-blue" id="password" name="password" required>
                        <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary w-50" id="add_user" type="submit">SIMPAN</button>
                    </div>
                </form>
                </div>
            </div>            
        </div>
    </div>
  </div>
</div>

@push('script')

<!-- Kode untuk memasukkan data ke dalam tabel menggunakan AJAX -->
<script>
    $(document).ready(function(){
        $(document).on('submit', '#addUserForm', function(e){
            e.preventDefault();
            let role = $('.selectpicker').val();
            let nama = $('#nama').val();
            let email = $('#email').val();
            let alamat = $('#alamat').val();
            let no_telp = $('#no_telp').val();
            let password = $('#password').val();
            let _token = $('#signup-token').val();


            // Memanggil route controller untuk menginput data ke dalam database menggunakan AJAX
            $.ajax({
                method: 'POST',
                url:"{{ route('akun-tambah.admin') }}",
                dataType: 'json',
                data:{nama:nama, role:role, email:email, alamat:alamat, no_telp:no_telp, password:password, _token:_token},
                success: function (response) {
                    if(response.status == 'success'){
                        $('#tambahAkunModal').modal('hide');
                        $('#addUserForm')[0].reset();
                        $('#tableKelolaAkun').DataTable().ajax.reload();
                        Swal.fire("Done!", "Data User Berhasil Ditambahkan", "success");
                    }
                },
                error: function (response) {
                    if(response.status === 422){
                        alert("Password anda minimal 8 karakter dan harus mengandung huruf dan angka");
                    } else {
                        var errors = response.responseJSON;
                        alert(errors);
                    }
                }
            })

        });

        // Untuk menghapus data dalam database menggunakan AJAX
        $(document).on('click', '#btn-hapus', function(e){
            var id = $(this).data('id');
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'question',
                text: 'Apakah Anda Yakin Ingin Menghapus Data User Ini?',
                showConfirmButton: true, 
                showCancelButton: true
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        url: 'kelola-akun/delete/'+id,
                        method: 'DELETE',
                        success: function (response) {
                        if(response.status == 'success'){
                            $('#tableKelolaAkun').DataTable().ajax.reload();
                            Swal.fire("Done!", "Data User Berhasil Dihapus", "success");
                        }
                        },
                        error: function (response) {
                            var errors = response.responseJSON;
                            alert(errors);
                        }
                    })
                }
            });
        });

        // Untuk menampilkan data ke dalam datatables (tabel yang digunakan pada web ini)
        $('#tableKelolaAkun').DataTable({
            ajax: "{{ route('akun-json.admin') }}",
            processing: true,
            "dom": '<"toolbar">frtp',
            language: { search: '', searchPlaceholder: "Search...",
                paginate: {
                    next: ">",
                    previous: "<"
                } },
            responsive: true,
            columns: [{
                data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false
            },{
                data: 'nama',
                name: 'nama'
            },{
                data: 'role',
                name: 'role'
            },{
                data: 'no_telp',
                name: 'no_telp'
            },{
                data: 'email',
                name: 'email'
            },{
                data: 'alamat',
                name: 'alamat'
            },{
                data: 'aksi',
                name: 'aksi'
            }]
            
        });
        $('div.toolbar').html('<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAkunModal">+ Tambah User</button>');
    })
</script>
@endpush