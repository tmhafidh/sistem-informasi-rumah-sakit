<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$ID_Kamar = $_GET['ID_Kamar'];

if (hapuskamar($ID_Kamar) > 0){
	echo 
		"
			<script>
				alert('Data Berhasil dihapus!');
				document.location.href = 'kamar.php';
			</script>
		";
	} else{
		echo 
		"
			<script>
				alert('Data gagal dihapsus!');
				document.location.href = 'kamar.php';
		 	</script>
		"
			;
	}

 ?>