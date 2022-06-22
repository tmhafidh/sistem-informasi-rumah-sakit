<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';

$ID_Dokter = $_GET['ID_Dokter'];

if (hapusadministrasi($ID_Dokter) > 0){
	echo 
	"
			<script>
				alert('Data Berhasil Dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	} else{
		echo 
		"
			<script>
				alert('Data gagal Dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	}

 ?>