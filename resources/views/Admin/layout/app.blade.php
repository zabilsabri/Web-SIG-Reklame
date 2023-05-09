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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Admin/layoutStyle.css') }}">
    <title>Layout</title>
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
                    <img src="{{ asset('img/profile-pic.png') }}" alt="">
                    <p class="username" >user</p>
                    </div>
                    <hr>
                </li>
                <li>
                    <a href="#"><i class="fa fa-home" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Home</span>  </a>
                </li>
                <li>
                    <a href="#"> <i class="fa fa-files-o" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Data Reklame</span> </a>
                </li>
                <li>
                    <a href="#"> <i class="fa fa-window-maximize" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Penyewaan Reklame</span> </a>
                </li>
                <li>
                    <a href="#"> <i class="fa fa-user-circle" aria-hidden="true"> </i> <span class="sb-text" style="margin-left:10px;">Pengaturan Akun</span> </a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

    
</body>
<script src="https://kit.fontawesome.com/645f3ace4e.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>

<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>