<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';
$obat = query("SELECT * FROM obat");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $obat = cariobat($_POST["keyword"]);
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Data Obat</title>

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
                                    <a href="registrasi.php">Register</a>
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
                                    <a href="registrasi.php">Register</a>
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
                                <input class="au-input au-input--xl" type="text" name="keyword" placeholder="Cari Pasien..." autofocus="" autocomplete="off" />
                                <button class="au-btn--submit" type="submit" name="cari">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
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
                	<h1>DATA OBAT R.S MALIKUSSALEH</h1>
                	<br>
                	<button class="au-btn au-btn-icon au-btn--blue">
                						<a href="tambahobat.php" style="color: white;">Tambah Obat</a>
                                        <i class="zmdi zmdi-plus"></i></button>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
										      <tr>
												<th>No.</th>
												<th>ID</th>
												<th>Nama</th>
                                                <th>Persediaan</th>
												<th>Jenis</th>
												<th></th>
											</tr>
                                        </thead>
                                        <tbody>
                                          
											<?php $i=1; ?>
												<?php foreach( $obat as $row): ?> 
												<tr>
													<td><?= $i ?></td>
													<td><?= $row["ID_Obat"]; ?></td>
													<td><?= $row["Nama_Obat"]; ?></td>
                                                    <td><?= $row["stok"]; ?></td>
													<td><?= $row["Jenis_Obat"]; ?></td>
													<td>
														<div class="table-data-feature">
														<button class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
                                                            <a href="hapusobat.php?ID_Obat=<?= $row["ID_Obat"];?>" onclick="return confirm('Apakah Sudah Sesuai ?');"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Ubah">
                                                        <a href="ubahobat.php?ID_Obat=<?= $row["ID_Obat"];?>"><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        </div>
													</td>
												</tr>
												<?php $i++; ?>
											<?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
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
<!-- end document-->
