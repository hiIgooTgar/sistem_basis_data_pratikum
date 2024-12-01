<?php

include '../connection/config.php';
include '../components/header.php';

if (!isset($_GET['no_ktp'])) {
    header("Location: ../");
}

$no_ktp = $_GET['no_ktp'];

$query = "SELECT * FROM anggota WHERE no_ktp = '$no_ktp'";
$sql = mysqli_query($connect, $query);
$dataAnggota = mysqli_fetch_array($sql);


?>

<div class="row">
    <div class="col-md-12">
        <a href="./anggota.php" class="btn btn-primary mb-3">Kembali</a>
        <div class="card p-4 mb-4">
            <h4 class="mb-4 col-12">Ubah Anggota</h3>
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="no_ktp" class="form-label">Nomor KTP | NIK</label>
                        <input type="text" value="<?= $dataAnggota['no_ktp'] ?>" autocomplete="off" class="form-control" id="no_ktp" name="no_ktp">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="nama" class="form-label">Nama Anggota</label>
                        <input type="text" value="<?= $dataAnggota['nama'] ?>" autocomplete="off" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="alamat" class="form-label">Alamat Anggota</label>
                        <textarea class="form-control" style="height: 100px;" name="alamat" id="alamat" cols="10" rows="10"><?= $dataAnggota['alamat'] ?></textarea>
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