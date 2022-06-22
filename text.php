    <br>
                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <a href="tambahpasien.php" style="color: white;">Tambah Pasien</a>
                                        <i class="zmdi zmdi-plus"></i></button>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Pasien</th>
                                                <th>ID Dokter</th>
                                                <th>ID Kamar</th>
                                                <th>ID Obat</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i=1; ?>
    <?php foreach( $administrasi as $row): ?> 
    <tr>
        <td><?= $i ?></td>
        <td><?= $row["ID_Pasien"]; ?></td>
        <td><?= $row["ID_Dokter"]; ?></td>
        <td><?= $row["ID_Kamar"]; ?></td>
        <td><?= $row["ID_Obat"]; ?></td>
        <td>
             <div class="table-data-feature">
            <button class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
                <a href="hapuspasien.php?ID_Dokter=<?= $row["ID_Dokter"];?>" onclick="return confirm('Apakah Sudah Sesuai ?');"><i class="zmdi zmdi-delete"></i></a><!-- </button>
            <button class="item" data-toggle="tooltip" data-placement="top" title="Ubah">  
                                                        <a href="ubahpasien.php?ID_Pasien=<?= $row["ID_Pasien"];?>"><i class="zmdi zmdi-edit"></i></a>
                                                    </button> -->
            </div>

        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
