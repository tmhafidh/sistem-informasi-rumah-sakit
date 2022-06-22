<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$pasien = query("SELECT * FROM pasien");
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Antrian Puskesmas</h1>

<a href="tambah.php">Tambah Antrian Pasien</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>Nomor</th>
        <th>ID</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Tanggal Lahir</th>
        <th>Umur</th>
        <th>Penyakit</th>
        <th>Dokter</th>
        <th>Kamar</th>
        <th>Obat</th>
        <th></th>
    </tr>

    <?php $i=1; ?>
    <?php foreach( $pasien as $row): ?> 
    <tr>
        <td><?= $i ?></td>
        <td><?= $row["ID_Pasien"]; ?></td>
        <td><?= $row["Nama_Pasien"]; ?></td>
        <td><?= $row["JK"]; ?></td>
        <td><?= $row["Alamat"]; ?></td>
        <td><?= $row["tgl_lahir"]; ?></td>
        <td><?= $row["Umur"]; ?></td>
        <td><?= $row["Penyakit"]; ?></td>
        <td><?= $row["ID_Dokter"]; ?></td>
        <td><?= $row["ID_Obat"]; ?></td>
        <td>
            <button><a href="hapus.php?no_antri=<?= $row["no_antri"];?>" onclick="return confirm('Apakah Sudah Sesuai ?');">Selesai</a></button>
            <button><a href="hapus.php?no_antri=<?= $row["no_antri"];?>" onclick="return confirm('Apakah Sudah Sesuai ?');">Hapus</a></button>

        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>

</table>

</body>
</html>