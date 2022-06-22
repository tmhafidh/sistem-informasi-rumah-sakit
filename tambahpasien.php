<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';

// cek apakah tombol submit udah di tekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di ubah atau tidak
    if(tambahpasien($_POST) > 0 ){
        echo "
            <script>
                alert('Data berhsail ditambahkan!');
                document.location.href = 'pasien.php';
            </script>
        ";
    }else{
        echo mysqli_error($conn)
        // "
        //     <script>
        //         alert('Data gagal ditambahkan!');
        //         document.location.href = 'pasien.php';
        //     </script>
        // "
        ;
    }
    
    }

    $carikode = mysqli_query($conn, "SELECT ID_Pasien FROM pasien ORDER BY ID_Pasien DESC ") or die (mysqli_error($conn));
$datakode = mysqli_fetch_array($carikode);
if($datakode){
    $nilaikode = substr($datakode [0], 1);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "P".str_pad($kode, 3, "0", STR_PAD_LEFT );
}else{
    $hasilkode = "P001";
}
 ?>

<!DOCTYPE html>
<html>
<head>
 <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">


    <title>Tambah Data Antrian</title>


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
<body>
    
    <div class="page-wrapper">

  <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
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
                                        <strong>TAMBAH DATA</strong> PASIEN
                                    </div>
                                    <div class="card-body card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row form-group">
                                         <div class="col col-md-3">
                                             <label for="ID_Pasien" class="form-control-label">ID Pasien </label>
                                         </div>
                                         <div class="col-12 col-md-9">
                                            <input type="hidden" name="ID_Pasien" id="ID_Pasien" value="<?php echo $hasilkode ?>" required="">
                                             <p class="form-control-static"><?php echo $hasilkode ?></p>
                                        </div>
                                    </div>


         <div class="row form-group">
            <div class="col col-md-3">
                <label for="Nama_Pasien" class=" form-control-label">Nama Pasien </label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" name="Nama_Pasien" id="Nama_Pasien" required="" placeholder="Masukan Nama" class="form-control">
             </div>
         </div>
        <div class="row form-group">
             <div class="col col-md-3" >    
                <label for="JK" class=" form-control-label">Jenis Kelamin</label>
            </div>
            <div class="col col-md-9">
            <div class="form-check-inline form-check">
                <input type="radio" name="JK" value="LK" class="form-check-input"> Laki - Laki
                <input type="radio" name="JK" value="PR" class="form-check-input"> Perempuan
            </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="Alamat" class=" form-control-label">Alamat  </label>
            </div>
            <div class="col-12 col-md-9">
                <textarea  name="Alamat" id="Alamat" required="" placeholder="Masukan Alamat" class="form-control"></textarea>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="tgl_lahir"  class=" form-control-label">Tanggal Lahir  </label>
            </div>
            <div class="col-12 col-md-9">
                <input type="date" name="tgl_lahir" id="tgl_lahir" required="" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="Umur" class=" form-control-label">Umur </label>
            </div>
             <div class="col-12 col-md-9">
                <input type="number" name="Umur" id="Umur" required="" placeholder="Masukan Umur" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="Penyakit"  class=" form-control-label">Penyakit </label>
        </div>
            <div class="col-12 col-md-9">
                <input type="text" name="Penyakit" id="Penyakit" required="" placeholder="Masukan Penyakit" class="form-control">
            </div>
        </div>
         <div class="row form-group">
            <div class="col col-md-3">
                <label for="ID_Dokter" class=" form-control-label">Dokter </label>
             </div>
            <div class="col-12 col-md-9">
               <select name="ID_Dokter" id="ID_Dokter" class="form-control">>
                    <option>-pilih-</option>
                    <?php 
                    $sql_dokter = mysqli_query($conn, "SELECT * FROM dokter ") or die (mysqli_error($conn));
                        while($data_dokter = mysqli_fetch_assoc($sql_dokter)){
                             echo '<option value= "'.$data_dokter['ID_Dokter'].'">'.$data_dokter['Nama_Dokter'].'</option>';
                      } ?>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="ID_Kamar" class=" form-control-label">Kamar </label>
         </div>
             <div class="col-12 col-md-9">
                <select name="ID_Kamar" id="ID_Kamar" required="" class="form-control">
                    <option>-pilih-</option>
                    <?php 
                    $sql_kamar = mysqli_query($conn, "SELECT * FROM kamar ") or die (mysqli_error($conn));
                         while($data_kamar = mysqli_fetch_assoc($sql_kamar)){
                                    echo '<option value= "'.$data_kamar['ID_Kamar'].'">'.$data_kamar['Nama_Kamar'].'</option>';
                      } ?>
                    
                </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                <label for="ID_Obat"  class=" form-control-label">Obat</label>
                </div>
            <div class="col-12 col-md-9">
                 <select  name="ID_Obat" id="ID_Obat" required=""  class="form-control">
                <option value="">-Pilih-</option>
                <?php 
                    $sql_obat = mysqli_query($conn, "SELECT * FROM Obat ") or die (mysqli_error($conn));
                    while($data_obat = mysqli_fetch_assoc($sql_obat)){
                    echo '<option value= "'.$data_obat['ID_Obat'].'">'.$data_obat['Nama_Obat'].'</option>';
                   } ?>
                 </select>

           </div>
        </div>
               <div class="card-footer">
                                                <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i>
                                                Tambah Data!</button>
                                                <button type="reset" name="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i>reset
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


    </form>
</body>
</html>
