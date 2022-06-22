<?php 
// konekasi ke database
$conn  = mysqli_connect("Localhost","root","","judul");


function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows=[];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambahdokter($datadokter) {
	global $conn;

	$ID_Dokter = htmlspecialchars($datadokter["ID_Dokter"]);
	$Nama_Dokter = htmlspecialchars($datadokter["Nama_Dokter"]);
	$Spesialis =htmlspecialchars( $datadokter["Spesialis"]);
	
	$query = "INSERT INTO dokter VALUES
	('$ID_Dokter','$Nama_Dokter','$Spesialis')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function tambahpasien($datapasien) {
	global $conn;

	$ID_Pasien = htmlspecialchars($datapasien["ID_Pasien"]);
	$Nama_Pasien = htmlspecialchars($datapasien["Nama_Pasien"]);
	$JK =htmlspecialchars( $datapasien["JK"]);
	$Alamat = htmlspecialchars($datapasien["Alamat"]);
	$tgl_lahir = htmlspecialchars($datapasien["tgl_lahir"]);
	$Umur = htmlspecialchars($datapasien["Umur"]);
	$Penyakit = htmlspecialchars($datapasien["Penyakit"]);
	$ID_Dokter = htmlspecialchars($datapasien["ID_Dokter"]);
	$ID_Kamar = htmlspecialchars($datapasien["ID_Kamar"]);
	$ID_Obat = htmlspecialchars($datapasien["ID_Obat"]);
	
	$query = "INSERT INTO `pasien` (`ID_Pasien`, `Nama_Pasien`, `JK`, `Alamat`, `tgl_lahir`, `Umur`, `Penyakit`, `ID_Dokter`, `ID_Kamar`, `ID_Obat`) VALUES ('$ID_Pasien', '$Nama_Pasien', '$JK', '$Alamat', '$tgl_lahir', '$Umur', '$Penyakit', '$ID_Dokter', '$ID_Kamar', '$ID_Obat');";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function tambahkamar($datakamar) {
	global $conn;

	$ID_Kamar = htmlspecialchars($datakamar["ID_Kamar"]);
	$Nama_Kamar = htmlspecialchars($datakamar["Nama_Kamar"]);
	$Kelas_Kamar =htmlspecialchars( $datakamar["Kelas_Kamar"]);
	$stok =htmlspecialchars( $datakamar["stok"]);
	
	$query = "INSERT INTO `kamar`(`ID_Kamar`, `Nama_Kamar`, `Kelas_Kamar`, `stok`) VALUES ('$ID_Kamar','$Nama_Kamar','$Kelas_Kamar','$stok')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function tambahobat($dataobat) {
	global $conn;

	$ID_Obat = htmlspecialchars($dataobat["ID_Obat"]);
	$Nama_Obat = htmlspecialchars($dataobat["Nama_Obat"]);
	$Jenis_Obat =htmlspecialchars( $dataobat["Jenis_Obat"]);
	$stok =htmlspecialchars( $dataobat["stok"]);
	
	$query = "INSERT INTO `obat`(`ID_Obat`, `Nama_Obat`, `Jenis_Obat`, `stok`) VALUES ('$ID_Obat','$Nama_Obat','$Jenis_Obat','$stok')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


 function hapusdokter($ID_Dokter){
 	global $conn;
 	mysqli_query($conn, "DELETE FROM dokter WHERE ID_Dokter = '$ID_Dokter'");
 	return mysqli_affected_rows($conn);
 }



 function hapuspasien($ID_Pasien){
 	global $conn;
 	mysqli_query($conn, "DELETE FROM `pasien` WHERE ID_Pasien = '$ID_Pasien'");
 	return mysqli_affected_rows($conn);
 }


 function hapuskamar($ID_Kamar){
 	global $conn;
 	mysqli_query($conn, "DELETE FROM kamar WHERE ID_Kamar = '$ID_Kamar'");
 	return mysqli_affected_rows($conn);

}

function hapusobat($ID_Obat){
 	global $conn;
 	mysqli_query($conn, "DELETE FROM obat WHERE ID_Obat = '$ID_Obat'");
 	return mysqli_affected_rows($conn);

}

function ubahobat($dataobat) {
	global $conn;

	$ID_Obat = $dataobat["ID_Obat"];
	$Nama_Obat = htmlspecialchars($dataobat["Nama_Obat"]);
	$Jenis_Obat =htmlspecialchars( $dataobat["Jenis_Obat"]);
	$stok =htmlspecialchars( $dataobat["stok"]);
	
	$query = "UPDATE `obat` SET `Nama_Obat`= '$Nama_Obat',`Jenis_Obat`='$Jenis_Obat',`stok`='$stok' WHERE ID_Obat ='$ID_Obat' ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function ubahdokter($datadokter) {
	global $conn;

	$ID_Dokter = $datadokter["ID_Dokter"];
	$Nama_Dokter = htmlspecialchars($datadokter["Nama_Dokter"]);
	$Spesialis =htmlspecialchars( $datadokter["Spesialis"]);
	
	$query = "UPDATE `dokter` SET `Nama_Dokter`='$Nama_Dokter',`Spesialis`='$Spesialis' WHERE `ID_Dokter`='$ID_Dokter'";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function ubahkamar($datakamar) {
	global $conn;

	$ID_Kamar = $datakamar["ID_Kamar"];
	$Nama_Kamar = htmlspecialchars($datakamar["Nama_Kamar"]);
	$Kelas_Kamar = htmlspecialchars($datakamar["Kelas_Kamar"]);
	$stok =htmlspecialchars( $datakamar["stok"]);
	
	$query = "UPDATE `kamar` SET `Nama_Kamar`='$Nama_Kamar',`Kelas_Kamar`='$Kelas_Kamar',`stok`='$stok' WHERE `ID_Kamar`='$ID_Kamar'";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

// function ubahpasien($datapasien) {
// 	global $conn;

// 	$ID_Pasien = htmlspecialchars($datapasien["ID_Pasien"]);
// 	$Nama_Pasien = htmlspecialchars($datapasien["Nama_Pasien"]);
// 	$JK =htmlspecialchars( $datapasien["JK"]);
// 	$Alamat = htmlspecialchars($datapasien["Alamat"]);
// 	$tgl_lahir = htmlspecialchars($datapasien["tgl_lahir"]);
// 	$Umur = htmlspecialchars($datapasien["Umur"]);
// 	$Penyakit = htmlspecialchars($datapasien["Penyakit"]);
// 	$ID_Dokter = htmlspecialchars($datapasien["ID_Dokter"]);
// 	$ID_Kamar = htmlspecialchars($datapasien["ID_Kamar"]);
// 	$ID_Obat = htmlspecialchars($datapasien["ID_Obat"]);
	
// 	$query = "UPDATE `pasien` SET `Nama_Pasien`='$Nama_Pasien',`JK`='$JK',`Alamat`='$Alamat',`tgl_lahir`='$tgl_lahir',`Umur`='$Umur',`Penyakit`='$Penyakit',`ID_Dokter`='$ID_Dokter',`ID_Kamar`='$ID_Kamar',`$ID_Obat`='$ID_Obat' WHERE `ID_Pasien`='$ID_Pasien'";

// 	mysqli_query($conn, $query);

// 	return mysqli_affected_rows($conn);

// }

function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek username udah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "
		<script>
		alert('username sudah terdaftar!')
		</script>
		";
		return false;
	}

	//cek konfirmasi password
	if ($password !== $password2) {
		echo "
		<script>
		alert('konfirmasi password tidak sesuai!')
		</script>
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke db
	mysqli_query($conn, "INSERT INTO user VALUES('','$username', '$password') ");

	return mysqli_affected_rows($conn);
}


function carikamar($keyword){
	$query = "SELECT * FROM kamar
				WHERE
				Nama_Kamar LIKE '%$keyword%' OR
				Kelas_Kamar LIKE '%$keyword%'
				";
	return query($query);			
}

function caridokter($keyword){
	$query = "SELECT * FROM dokter
				WHERE
				Nama_Dokter LIKE '%$keyword%' OR
				Spesialis LIKE '%$keyword%'
				";
	return query($query);			
}

function caripasien($keyword){
	$query = "SELECT * FROM pasien
				WHERE
				Nama_Pasien LIKE '%$keyword%' OR
				Alamat LIKE '%$keyword%' OR
				tgl_lahir LIKE '%$keyword%' OR
				JK LIKE '%$keyword%'
				";
	
	return query($query);			
}

function cariobat($keyword){
	$query = "SELECT * FROM obat
				WHERE
				Nama_Obat LIKE '%$keyword%' OR
				Jenis_Obat LIKE '%$keyword%'
				";
	
	return query($query);			
}

 function hapusadministrasi($ID_Dokter){
 	global $conn;
 	mysqli_query($conn, "DELETE FROM dokter WHERE ID_Dokter = '$ID_Dokter'");
 	return mysqli_affected_rows($conn);
 }
