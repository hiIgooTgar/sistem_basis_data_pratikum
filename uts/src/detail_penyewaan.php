<?php

include '../connection/config.php';
include '../components/header.php';

if (!isset($_GET['id_penyewaan'])) {
    header("Location: ../");
}

$id_penyewaan = $_GET['id_penyewaan'];

$query = "SELECT penyewaan.*, anggota.*, gedung.*, fasilitas.* FROM penyewaan 
INNER JOIN anggota ON penyewaan.no_ktp = anggota.no_ktp
INNER JOIN gedung ON penyewaan.no_gedung = gedung.no_gedung
INNER JOIN fasilitas ON gedung.id_fasilitas = fasilitas.id_fasilitas
WHERE id_penyewaan = '$id_penyewaan'";
$sql = mysqli_query($connect, $query);
$dataPenyewaan = mysqli_fetch_array($sql);


?>

<div class="row">
    <div class="col-md-12">
        <a href="./penyewaan.php" class="btn btn-primary mb-3">Kembali</a>
        <div class="card p-4">
            <h4 class="bg-primary p-2 text-white mb-4"><?= $dataPenyewaan['id_penyewaan'] ?> - ID Penyewaan</h3>
                <div class="card p-4 mb-4">
                    <h4 class="mb-4">Detail Penyewaan</h3>
                        <div class="mb-3">
                            <label for="tanggal_penyewaan" class="form-label">Tanggal Penyewaan</label>
                            <input disabled type="text" value="<?php $date = $dataPenyewaan['tanggal_penyewaan'];
                                                                echo date("d F Y", strtotime($date)) ?>" autocomplete="off" class="form-control" id="tanggal_penyewaan" name="tanggal_penyewaan">
                        </div>
                </div>
                <div class="card p-4 mb-4">
                    <h4 class="mb-4">Detail Anggota</h3>
                        <div class="mb-3">
                            <label for="no_ktp" class="form-label">Nomor KTP | NIK Penyewa</label>
                            <input disabled type="text" value="<?= $dataPenyewaan['no_ktp'] ?>" autocomplete="off" class="form-control" id="no_ktp" name="no_ktp">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Penyewa</label>
                            <input disabled type="text" value="<?= $dataPenyewaan['nama'] ?>" autocomplete="off" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Penyewa</label>
                            <input disabled type="text" value="<?= $dataPenyewaan['alamat'] ?>" autocomplete="off" class="form-control" id="alamat" name="alamat">
                        </div>
                </div>
                <div class="card p-4">
                    <h4 class="mb-4">Detail Gedung</h3>
                        <div class="mb-3">
                            <label for="no_gedung" class="form-label">Nomor Gedung</label>
                            <input disabled type="text" value="<?= $dataPenyewaan['no_gedung'] ?>" autocomplete="off" class="form-control" id="no_gedung" name="no_gedung">
                        </div>
                        <div class="mb-3">
                            <label for="nama_gedung" class="form-label">Nama Gedung</label>
                            <input disabled type="text" value="<?= $dataPenyewaan['nama_gedung'] ?>" autocomplete="off" class="form-control" id="nama_gedung" name="nama_gedung">
                        </div>
                        <div class="mb-3">
                            <label for="kapasitas" class="form-label">Kapasitas</label>
                            <input disabled type="number" value="<?= $dataPenyewaan['kapasitas'] ?>" autocomplete="off" class="form-control" id="kapasitas" name="kapasitas">
                        </div>
                        <div class="mb-3">
                            <label for="harga_sewa" class="form-label">Harga Sewa</label>
                            <input disabled type="number" value="<?= $dataPenyewaan['harga_sewa'] ?>" autocomplete="off" class="form-control" id="harga_sewa" name="harga_sewa">
                        </div>
                        <div class="mb-3">
                            <label for="id_fasilitas" class="form-label">Fasilitas</label>
                            <input disabled type="text" value="<?= $dataPenyewaan['id_fasilitas'] ?> | <?= $dataPenyewaan['nama_fasilitas'] ?>" autocomplete="off" class="form-control" id="id_fasilitas" name="nama_fasilitas">
                        </div>
                </div>
        </div>
    </div>
</div>

<?php

include '../components/footer.php';

?>