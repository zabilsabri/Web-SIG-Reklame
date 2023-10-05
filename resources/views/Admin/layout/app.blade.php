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
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>
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
        <div class="side-bg">
        </div>
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav d-flex flex-column" style="margin-left:0; height: 95%">
                <li class="sidebar-brand">
                    <a href="#menu-toggle" id="menu-toggle" style="margin-top:20px;"> <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i> </a>
                </li>
                <li class="account-section text-center">
                    <div class="text-center">
                        <img class="sb-img rounded-circle" src="{{ asset('temp_file/profile/' . Auth::user()->foto) }}" onerror="this.onerror=null;this.src='{{ asset('img/PP.png') }}';" alt="">
                        <p class="username">{{ Auth::user()->nama }}</p>
                    </div>
                    <hr>
                </li>
                <li class="{{ Route::is('home.admin') ? 'active' : '' }}">
                    <a href="{{ Route('home.admin') }}"><i class="fa fa-home" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Home</span> </a>
                </li>
                <li class="{{ Route::is('data-reklame.admin') || Route::is('data-reklame-edit.admin')? 'active' : '' }}">
                    <a href="{{ Route('data-reklame.admin') }}"> <i class="fa fa-files-o" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Data Reklame</span> </a>
                </li>
                <li class="{{ Route::is('reklame.admin') || Route::is('reklame-edit.admin') ? 'active' : '' }}">
                    <a href="{{ Route('reklame.admin') }}"> <i class="fa fa-window-maximize" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Penyewaan Reklame</span> </a>
                </li>
                <li class="{{ Route::is('akun.admin') || Route::is('akun-detail.admin') || Route::is('akun-edit.admin') ? 'active' : '' }}">
                    <a href="{{ Route('akun.admin') }}"> <i class="fa fa-user-circle" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Pengaturan Akun</span> </a>
                </li>
                <li class="{{ Route::is('laporan.admin') || Route::is('laporan-detail.admin') ? 'active' : '' }}">
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

@stack('script')

<script>
    $('#test').selectpicker();
</script>

<!-- Untuk responsivitas halaman -->
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
        if ($(a.target).is(".sidebar-nav") === false &&
            $(a.target).is("li.account-section.text-center") === false &&
            $(a.target).is("div.text-center") === false &&
            $(a.target).is("#sidebar-wrapper") === false &&
            $(a.target).is("img.sb-img") === false &&
            $(a.target).is("p.username") === false && 
            $(a.target).is("li hr") === false) {
            $(".hamburger-button input").prop('checked', false);
            $("#side-container").removeClass("toggle-sidebar");
        }
    });
</script>