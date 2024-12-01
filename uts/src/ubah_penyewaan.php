<?php

include '../connection/config.php';
include '../components/header.php';

if (!isset($_GET['id_penyewaan'])) {
    header("Location: ../");
}

$id_penyewaan = $_GET['id_penyewaan'];

$query = "SELECT * FROM penyewaan 
-- INNER JOIN anggota ON penyewaan.no_ktp = anggota.no_ktp
-- INNER JOIN gedung ON penyewaan.no_gedung = gedung.no_gedung
WHERE id_penyewaan = '$id_penyewaan'";
$sql = mysqli_query($connect, $query);
$dataPenyewaan = mysqli_fetch_array($sql);


?>

<div class="row">
    <div class="col-md-12">
        <a href="./penyewaan.php" class="btn btn-primary mb-3">Kembali</a>
        <div class="card p-4 mb-4">
            <h4 class="mb-4 col-12">Ubah Penyewaan</h3>
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="id_penyewaan" class="form-label">ID Penyewaan</label>
                        <input type="text" value="<?= $dataPenyewaan['id_penyewaan'] ?>" autocomplete="off" class="form-control" id="id_penyewaan" name="id_penyewaan">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="tanggal_penyewaan" class="form-label">Tanggal Penyewaan</label>
                        <input type="date" value="<?= $dataPenyewaan['tanggal_penyewaan'] ?>" autocomplete="off" class="form-control" id="tanggal_penyewaan" name="tanggal_penyewaan">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="no_ktp" class="form-label">Nomor KTP | NIK</label>
                        <select class="form-control" name="no_ktp" id="no_ktp">
                            <?php
                            $query = mysqli_query($connect, "SELECT * FROM anggota");
                            while ($data = mysqli_fetch_array($query)) :
                                $selectedKtp = ($dataPenyewaan['no_ktp'] == $data['no_ktp']) ? "selected" : ""
                            ?>
                                <option <?= $selectedKtp ?> value="<?= $data['no_ktp'] ?>"><?= $data['no_ktp'] ?> | <?= $data['nama'] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="no_gedung" class="form-label">Nomor Gedung | Nama Gedung</label>
                        <select class="form-control" name="no_gedung" id="no_gedung">
                            <?php
                            $query = mysqli_query($connect, "SELECT * FROM gedung");
                            while ($data = mysqli_fetch_array($query)) :
                                $selectedGedung = ($dataPenyewaan['no_gedung'] == $data['no_gedung']) ? "selected" : ""
                            ?>
                                <option <?= $selectedGedung ?> value="<?= $data['no_gedung'] ?>"><?= $data['no_gedung'] ?> | <?= $data['nama_gedung'] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="editAnggota" class="btn btn-warning">Ubah</button>
                    </div>
                </div>
        </div>
    </div>
</div>

<?php

include '../components/footer.php';

?>