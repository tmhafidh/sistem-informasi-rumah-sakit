<?php 


session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';

$ID_Pasien = $_GET["ID_Pasien"];

if (hapuspasien($ID_Pasien) > 0){
	echo "
			<script>
				alert('Berhasil');
				document.location.href = 'pasien.php';
			</script>
		";
	} else{
		
		"
			<script>
				alert('Gagal!');
				document.location.href = 'pasien.php';
			</script>
		"
		;
	}

 ?>