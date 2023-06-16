<!DOCTYPE html>
<html lang="en">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('css/Layout/layoutStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Layout/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Layout/dropdown.css') }}">
    <title>{{ $title }}</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <div class="brand-section d-flex">
                <div class="hamburger-button">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a class="navbar-brand text-white d-flex align-items-center" href="#">
                    <img src="{{ asset('img/Logo.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    <h6 class="nav-text mb-0 ms-3">
                        SIG REKLAME KECAMATAN KOLAKA
                    </h6>
                </a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
    <div id="side-container">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav d-flex flex-column" style="margin-left:0; height: 95%">
                <li class="sidebar-brand">
                    <a href="#menu-toggle" id="menu-toggle" style="margin-top:20px;"> <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i> </a>
                </li>
                <li class="account-section text-center">
                    <div class="text-center">
                        <img class="sb-img" src="{{ asset('img/profile-pic.png') }}" alt="">
                        <p class="username">{{ Auth::user()->nama }}</p>
                    </div>
                    <hr>
                </li>
                <li class="{{ Route::is('home.admin') ? 'active' : '' }}">
                    <a href="{{ Route('home.admin') }}"><i class="fa fa-home" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Home</span> </a>
                </li>
                <li class="{{ Route::is('data-reklame.admin') ? 'active' : '' }}">
                    <a href="{{ Route('data-reklame.admin') }}"> <i class="fa fa-files-o" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Data Reklame</span> </a>
                </li>
                <li class="{{ Route::is('reklame.admin') ? 'active' : '' }}">
                    <a href="{{ Route('reklame.admin') }}"> <i class="fa fa-window-maximize" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Penyewaan Reklame</span> </a>
                </li>
                <li class="{{ Route::is('akun.admin') ? 'active' : '' }}">
                    <a href="{{ Route('akun.admin') }}"> <i class="fa fa-user-circle" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Pengaturan Akun</span> </a>
                </li>
                <li class="{{ Route::is('laporan.admin') ? 'active' : '' }}">
                    <a href="{{ Route('laporan.admin') }}"> <i class="fa fa-folder" aria-hidden="true"></i> <span class="sb-text" style="margin-left:10px;">Laporan Penyewaan</span> </a>
                </li>
                <li class="mt-auto">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-sign-out" aria-hidden="true"></i> <span class="sb-text" style="margin-left:10px;">Keluar</span> </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container mt-5 pt-4">
        <div class="row">
            <div id="wrapper">
                <p class="breadcrump-page text-end mb-5">{{ $title }} | <span class="breadcrump-role">{{ Auth::user()->role }}</span></p>
                <section class="include-section">
                    @include('sweetalert::alert')
                    @yield('content')
                </section>

                <!-- Modal Logout -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('img/redquestion.png') }}" width="90px" height="90px" alt="">
                                    <p class="text-black mt-3">Apakah Anda yakin ingin keluar?</p>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">Tidak</button>
                                    <a href="{{ route('logout') }}" type="button" class="btn btn-danger w-25">Ya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->
    </div>
</body>
<script src="https://kit.fontawesome.com/645f3ace4e.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

</html>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#add_user', function(e) {
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
                url: "{{ route('akun-tambah.admin') }}",
                dataType: 'json',
                data: {
                    nama: nama,
                    role: role,
                    email: email,
                    alamat: alamat,
                    no_telp: no_telp,
                    password: password,
                    _token: _token
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#tambahAkunModal').modal('hide');
                        $('#addUserForm')[0].reset();
                        $('#tableKelolaAkun').DataTable().ajax.reload();
                        Swal.fire("Done!", "Data User Berhasil Ditambahkan", "success");
                    }
                },
                error: function(response) {
                    var errors = response.responseJSON;
                    alert(errors);
                }
            })

        })
    })
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#btn-hapus', function(e) {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'question',
                text: 'Apakah Anda Yakin Ingin Menghapus Data User Ini?',
                showConfirmButton: true,
                showCancelButton: true
            }).then(function() {
                $.ajax({
                    url: 'kelola-akun/delete/' + id,
                    method: 'DELETE',
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#tableKelolaAkun').DataTable().ajax.reload();
                            Swal.fire("Done!", "Data User Berhasil Dihapus", "success");
                        }
                    },
                    error: function(response) {
                        var errors = response.responseJSON;
                        alert(errors);
                    }
                })
            });
        });
        $(document).on('click', '#btn-hapus-reklame', function(e) {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'question',
                text: 'Apakah Anda Yakin Ingin Menghapus Data User Ini?',
                showConfirmButton: true,
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: 'data-reklame/delete/' + id,
                        method: 'DELETE',
                        success: function(response) {
                            if (response.status == 'success') {
                                $('#tableReklame').DataTable().ajax.reload();
                                Swal.fire("Done!", "Data Reklame Berhasil Dihapus", "success");
                            }
                        },
                        error: function(response) {
                            var errors = response.responseJSON;
                            alert(errors);
                        }
                    })
                }
            });
        })
    })
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#add_reklame', function(e) {
            e.preventDefault();
            let status = $('.selectpicker').val();
            let nama = $('#nama-add').val();
            let lattitude = $('#lattitude-add').val();
            let longitude = $('#longitude-add').val();
            let tinggi = $('#tinggi-add').val();
            let luas = $('#luas-add').val();
            let lama = $('#lama-add').val();
            let harga = $('#harga-add').val();
            let _token = $('#reklame-token-add').val();

            $.ajax({
                method: 'POST',
                url: "{{ route('data-reklame-tambah.admin') }}",
                dataType: 'json',
                data: {
                    nama: nama,
                    status: status,
                    lattitude: lattitude,
                    longitude: longitude,
                    tinggi: tinggi,
                    luas: luas,
                    lama: lama,
                    harga: harga,
                    _token: _token
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#tambahReklameModal').modal('hide');
                        $('#formReklame')[0].reset();
                        $('#tableReklame').DataTable().ajax.reload();
                        Swal.fire("Done!", "Data Reklame Berhasil Ditambahkan", "success");
                    }
                },
                error: function(response) {
                    var errors = response.responseJSON;
                    alert(errors);
                }
            })

        })
    })
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#detail-reklame', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                method: 'GET',
                url: 'data-reklame/json-detail/' + id,
                dataType: 'json',
                success: function(response) {
                    if (response.statusWeb == 'success') {
                        $('#detailReklame').modal('show');
                        $('#nama').val(response.reklame.nama);
                        $('#latitude').val(response.reklame.latitude);
                        $('#longitude').val(response.reklame.longitude);
                        $('#status').val(response.reklame.status);
                        $('#harga').val(response.reklame.harga);
                        $('#tgl_pasang').val(response.reklame.tgl_pasang);
                        $('#jth_tempo').val(response.reklame.jth_tempo);
                        $('#jenis_iklan').val(response.reklame.jenis_iklan);
                    }
                },
                error: function(response) {
                    var errors = response.responseJSON;
                    alert(errors);
                }
            })
        })
    })
</script>

<script>
    const ctx = document.getElementById('myChart');
    const labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Penyewaan Reklame',
                data: [65, 59, 80, 81, 56, 55, 40, 80, 81, 56, 55, 40],
                fill: false,
                borderColor: 'rgb(46, 80, 166)',
                tension: 0.5
            }]
        },
    });
</script>

<script>
    $(document).ready(function() {
        $('#tableReklame').DataTable({
            ajax: "{{ route('data-reklame-json.admin') }}",
            scrollX: true,
            "dom": '<"btn-sr">frtp',
            language: {
                search: '',
                searchPlaceholder: "Search...",
                paginate: {
                    next: ">",
                    previous: "<"
                }
            },
            responsive: true,
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable: false
            }, {
                data: 'nama',
                name: 'nama'
            }, {
                data: 'detail',
                name: 'detail'
            }, {
                data: 'lama',
                name: 'lama'
            }, {
                data: 'harga',
                name: 'harga'
            }, {
                data: 'status',
                name: 'status'
            }, {
                data: 'aksi',
                name: 'aksi'
            }],
            "columnDefs": [{
                    "width": "100px",
                    "targets": 6
                } // Mengatur lebar kolom pertama menjadi 200px
            ]
        });
        $('div.btn-sr').html('<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahReklameModal">+ Tambah Data</button>');

    });

    $(document).ready(function() {
        $('#tableLaporan').DataTable({
            scrollX: true,
            "dom": 'frtp',
            language: {
                search: '',
                searchPlaceholder: "Search...",
                paginate: {
                    next: ">",
                    previous: "<"
                }
            },
            responsive: true,
        });
    });

    $(document).ready(function() {
        $('#tableSewaReklame').DataTable({
            scrollX: true,
            "dom": '<"toolbar">frtp',
            language: {
                search: '',
                searchPlaceholder: "Search...",
                paginate: {
                    next: ">",
                    previous: "<"
                }
            },
            responsive: true,
        });
        $('div.toolbar').html('<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahReklameModal">+ Tambah User</button>');
    });


    $(document).ready(function() {
        $('#tableKelolaAkun').DataTable({
            ajax: "{{ route('akun-json.admin') }}",
            processing: true,
            "dom": '<"toolbar">frtp',
            language: {
                search: '',
                searchPlaceholder: "Search...",
                paginate: {
                    next: ">",
                    previous: "<"
                }
            },
            responsive: true,
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable: false
            }, {
                data: 'nama',
                name: 'nama'
            }, {
                data: 'role',
                name: 'role'
            }, {
                data: 'no_telp',
                name: 'no_telp'
            }, {
                data: 'email',
                name: 'email'
            }, {
                data: 'alamat',
                name: 'alamat'
            }, {
                data: 'aksi',
                name: 'aksi'
            }]

        });
        $('div.toolbar').html('<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAkunModal">+ Tambah User</button>');

    });
</script>

<script>
    $('#test').selectpicker();
</script>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#side-container").toggleClass("toggled");
    });

    $(".hamburger-button input").click(function(e) {
        e.stopPropagation();
        console.log("hamburger clicked");
        $("#side-container").toggleClass("toggle-sidebar");
    });
    $(document).on("click", function(a) {
        if ($(a.target).is("#side-container") === false) {
            $(".hamburger-button input").prop('checked', false);
            $("#side-container").removeClass("toggle-sidebar");
        }
    });

</script>