<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';

$ID_Dokter = $_GET['ID_Dokter'];

if (hapusdokter($ID_Dokter) > 0){
	echo 
	"
			<script>
				alert('Data Berhasil Dihapus!');
				document.location.href = 'dokter.php';
			</script>
		";
	} else{
		echo 
		"
			<script>
				alert('Data gagal Dihapus!');
				document.location.href = 'dokter.php';
			</script>
		";
	}

 ?>