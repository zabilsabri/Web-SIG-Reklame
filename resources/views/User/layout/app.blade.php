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
            <ul class="sidebar-nav" style="margin-left:0;">
                <li class="sidebar-brand">
                    <a href="#menu-toggle" id="menu-toggle" style="margin-top:20px;"> <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i> </a>
                </li>
                <li class="account-section text-center">
                    <div class="text-center">
                        <img class="sb-img" src="{{ asset('img/profile-pic.png') }}" alt="">
                        <p class="username">user</p>
                    </div>
                    <hr>
                </li>
                <li class="{{ Route::is('home.user') ? 'active' : '' }}">
                    <a href="{{ route('home.user') }}"><i class="fa fa-home" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Home</span> </a>
                </li>
                <li class="{{ Route::is('reklame.user') ? 'active' : '' }}">
                    <a href="{{ route('reklame.user') }}"> <i class="fa fa-files-o" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Informasi Reklame</span> </a>
                </li>
                <li class="{{ Route::is('bantuan.user') ? 'active' : '' }}">
                    <a href="{{ route('bantuan.user') }}"> <i class="fa fa-user-circle" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Bantuan</span> </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container mt-4 pt-5">
        <div class="row">
            <div id="wrapper">
                <p class="breadcrump-page text-end mb-5">{{ $title }} | <span class="breadcrump-role">Admin</span></p>
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
    $(document).ready(function() {
        $('#tableInfoReklame').DataTable({
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
            "searching": true,
        });

        $('div.btn-sr').html('<select id="categoryFilterStatus" style="width: auto;" class="form-control special"><option value="">Status (Show All)</option><option value="Belum Disewa">Belum Disewa</option><option value="Sudah Disewa">Sudah Disewa</option></select>');

        var table = $('#tableInfoReklame').DataTable();

        $("#tableInfoReklame_filter.dataTables_filter").append($("#categoryFilterStatus"));

        $("#categoryFilterStatus").on('change', function(e) {
            table.column(9).search(this.value).draw();
        });
    });
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
        if ($(a.target).is("#sidebar-wrapper") === false &&
                $(a.target).is("ul.sidebar-nav") === false &&
                $(a.target).is("li.account-section.text-center") === false && 
                $(a.target).is("div.text-center") === false &&
                $(a.target).is("img.sb-img") === false &&
                $(a.target).is("p.username") === false &&
                $(a.target).is("li hr") === false) {
            $(".hamburger-button input").prop('checked', false);
            $("#side-container").removeClass("toggle-sidebar");
        }
    });
</script>