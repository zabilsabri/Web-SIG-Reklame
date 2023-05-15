<!DOCTYPE html>
<html lang="en">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('css/Layout/layoutStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Layout/datatables.css') }}">
    <title>{{ $title }}</title>
</head>
<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">
      <img src="{{ asset('img/logo.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
      <span class="nav-text">
        SIG REKLAME KECAMATAN KOLAKA
      </span>
    </a>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" style="margin-left:0;">
                <li class="sidebar-brand">
                    <a href="#menu-toggle"  id="menu-toggle" style="margin-top:20px;"> <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i> </a>
                </li>
                <li class="text-center">
                    <div class="text-center">
                        <img class="sb-img"  src="{{ asset('img/profile-pic.png') }}" alt="">
                        <p class="username" >user</p>
                    </div>
                    <hr>
                </li>
                <li class="{{ Route::is('home.admin') ? 'active' : '' }}">
                    <a href="{{ Route('home.admin') }}"><i class="fa fa-home" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Home</span>  </a>
                </li>
                <li class="">
                    <a href="#"> <i class="fa fa-files-o" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Data Reklame</span> </a>
                </li>
                <li class="{{ Route::is('reklame.admin') ? 'active' : '' }}">
                    <a href="{{ Route('reklame.admin') }}"> <i class="fa fa-window-maximize" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Penyewaan Reklame</span> </a>
                </li>
                <li class="{{ Route::is('akun.admin') ? 'active' : '' }}">
                    <a href="{{ Route('akun.admin') }}"> <i class="fa fa-user-circle" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Pengaturan Akun</span> </a>
                </li>
            </ul>
        </div>
        <p class="breadcrump-page text-end mb-5" >{{ $title }} | <span class="breadcrump-role" >Admin</span></p>
        <section>
            @yield('content')
        </section>
    </div>
</div>
        <!-- /#sidebar-wrapper -->
    
</body>
<script src="https://kit.fontawesome.com/645f3ace4e.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>

</html>

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
    $(document).ready( function () {
        $('#tableSewaReklame').DataTable({
            scrollX: true,
            "dom": '<"btn-sr">frtp',
            language: { search: '', searchPlaceholder: "Search...",
                paginate: {
                    next: ">",
                    previous: "<"
                } },
            responsive: true,
            
        });
        $('div.btn-sr').html('<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSewaReklameModal">+ Tambah Data</button>');
    
    });

    $(document).ready( function () {
        $('#tableKelolaAkun').DataTable({
            scrollX: true,
            "dom": '<"toolbar">frtp',
            language: { search: '', searchPlaceholder: "Search...",
                paginate: {
                    next: ">",
                    previous: "<"
                } },
            responsive: true,
            
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
    $("#wrapper").toggleClass("toggled");
});
</script>