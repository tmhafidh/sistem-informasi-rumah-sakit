<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';

$ID_Obat = $_GET['ID_Obat'];

if (hapusobat($ID_Obat) > 0){
	echo 
	"
			<script>
				alert('Obat berhasil dihapus!');
				document.location.href = 'obat.php';
			</script>
		";
	} else{
		echo 
		"
			<script>
				alert('Obat gagal dihapus!');
				document.location.href = 'obat.php';
			</script>
		"
		;
	}

 ?>