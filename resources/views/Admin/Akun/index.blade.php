@extends('Admin.layout.app', ['title' => 'Kelola Akun'])
<link rel="stylesheet" href="{{ asset('css/Admin/Penyewaan Reklame/sewaReklame.css') }}">

@section('content')
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
        <h1 class="modal-title fs-5" id="tambahAkunModalLabel">Tambah Data Penyewaan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-auto">
                        <div class="btn-group">
                            <select class="selectpicker">
                                <option selected>Peran</option>
                                <option value="Pimpinan">Pimpinan</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <form action="" id="addUserForm" method="post">
                    <div class="mb-3">
                        <p class="form-label-modal" >Nama Reklame</p>
                        <input type="text" class="form-control input-border-blue" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Email</p>
                        <input type="email" class="form-control input-border-blue" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Alamat</p>
                        <input type="text" class="form-control input-border-blue" id="alamat" name="alamat">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <p class="form-label-modal" >Nomor Telpon</p>
                        <input type="text" class="form-control input-border-blue" id="no_telp" name="no_telp">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Password</p>
                        <input type="text" class="form-control input-border-blue" id="password" name="password">
                        <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary w-50" id="add_user" type="button">SIMPAN</button>
                    </div>
                </form>
                </div>
            </div>            
        </div>
    </div>
  </div>
</div>

@push('script')
<script>
    $(document).ready(function(){
        $(document).on('click', '#add_user', function(e){
            e.preventDefault();
            let role = $('.selectpicker').val();
            let nama = $('#nama').val();
            let email = $('#email').val();
            let alamat = $('#alamat').val();
            let no_telp = $('#no_telp').val();
            let password = $('#password').val();
            let _token = $('#signup-token').val();

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
                    var errors = response.responseJSON;
                    alert(errors);
                }
            })

        });
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