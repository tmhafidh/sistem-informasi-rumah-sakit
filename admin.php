<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$pasien = query("SELECT * FROM pasien")
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>Selamat Datang di Rumah Sakit Malikusssaleh</h1>

<h2>Halaman Admin</h2>
<br>
<a href="pasien.php">Data Paseien</a>
<br>
<a href="dokter.php">Data Dokter</a>
<br>
<a href="kamar.php">Data Kamar</a>
<br>
<a href="obat.php">Data Obat</a>

</body>
</html>