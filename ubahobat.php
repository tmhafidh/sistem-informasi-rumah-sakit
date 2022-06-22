<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';


//ambil data di url
$ID_Obat = $_GET["ID_Obat"];

// query data obat berdasarkan id
$obat = query ("SELECT * FROM obat WHERE ID_Obat = '$ID_Obat'")[0];


// cek apakah tombol submit udah di tekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di ubah atau tidak
    if(ubahobat($_POST) > 0 ){
        echo "
            <script>
                alert('Data berhsail diubah!');
                document.location.href = 'obat.php';
            </script>
        ";
    }else{
        echo 
        "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'obat.php';
            </script>
        "
        ;
        
    }
    
    }
 ?>
<!DOCTYPE html>
<html>
<head>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Ubah Data Obat</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                       <a href="index.php">
                    <img src="images/icon/logo.jpg" alt="RS Malikussaleh" />
                </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li >
                            
                                <a href="index.php">
                                <i class="fas fa-hospital-o"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="pasien.php">
                                <i class="fas fa-users  "></i>Pesien</a>
                        </li>
                        <li>
                            <a href="dokter.php">
                                <i class="fas fa-users"></i>Dokter</a>
                        </li>
                        <li>
                            <a href="kamar.php">
                                <i class="far  fa-plus-square"></i>Kamar</a>
                        </li>
                        <li>
                            <a href="obat.php">
                                <i class="fas fa-medkit"></i>Obat</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Setting User</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.php">Login</a>
                                </li>
                                <li>
                                    <a href="register.php">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.php">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
 <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
              <a href="index.php">
                    <img src="images/icon/logo.jpg" alt="RS Malikussaleh" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li >
                                <a href="index.php">
                                <i class="fas fa-hospital-o"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="pasien.php">
                                <i class="fas fa-users"></i>Pasien</a>
                        </li>
                        <li>
                            <a href="dokter.php">
                                <i class="fas fa-users"></i>Dokter</a>
                        </li>
                        <li>
                            <a href="kamar.php">
                                <i class="far  fa-plus-square"></i>Kamar</a>
                        </li>
                        <li>
                            <a href="obat.php">
                                <i class="fas fa-medkit"></i>Obat</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Setting User</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.php">Login</a>
                                </li>
                                <li>
                                    <a href="register.php">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.php">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

          <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                               
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Logout</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">  
                                         <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->


    <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row" style="width: 210%">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>UBAH DATA</strong> OBAT
                                    </div>
                                    <div class="card-body card-block">

    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
                <div class="col-12 col-md-9">
                <input type="hidden" name="ID_Obat" id="ID_Obat" required="" value="<?= $obat["ID_Obat"] ?>">
               
                </div>
            </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="Nama_Obat"  class=" form-control-label">Nama Obat </label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" name="Nama_Obat" id="Nama_Obat" required=""placeholder="Masukan Nama Obat" class="form-control" value="<?= $obat["Nama_Obat"] ?>">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="Jenis_Obat"  class=" form-control-label">Jenis Obat </label>
             </div>
            <div class="col-12 col-md-9">
                <select name="Jenis_Obat" id="Jenis_Obat" class="form-control" >
                    <option value="<?= $obat["Jenis_Obat"] ?>">-Pilihan-</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Kapsul">Kapsul</option>
                    <option value="Tetes">Tetes</option>
                    <option value="Syrup">Syrup</option>
                    <option value="Bubuk">Bubuk</option>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="stok" class=" form-control-label">Stok Obat </label>
            </div>
            <div class="col-12 col-md-9">
                <input type="number" name="stok" id="stok" required="" placeholder="Masukan Stok Obat" class="form-control" value="<?= $obat["stok"] ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i>Tambah Data!
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
             <i class="fa fa-ban"></i> Reset
            </button>
         </div>
         </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Rumah Sakit Malikussaleh.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>
</html>
