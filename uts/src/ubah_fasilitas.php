<?php

include '../connection/config.php';
include '../components/header.php';

if (!isset($_GET['id_fasilitas'])) {
    header("Location: ../");
}

$id_fasilitas = $_GET['id_fasilitas'];

$query = "SELECT * FROM fasilitas WHERE id_fasilitas = '$id_fasilitas'";
$sql = mysqli_query($connect, $query);
$dataFasilitas = mysqli_fetch_array($sql);


?>

<div class="row">
    <div class="col-md-12">
        <a href="./fasilitas.php" class="btn btn-primary mb-3">Kembali</a>
        <div class="card p-4 mb-4">
            <h4 class="mb-4 col-12">Ubah Fasilitas</h3>
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="id_fasilitas" class="form-label">ID Fasilitas</label>
                        <input type="text" value="<?= $dataFasilitas['id_fasilitas'] ?>" autocomplete="off" class="form-control" id="id_fasilitas" name="id_fasilitas">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                        <input type="text" value="<?= $dataFasilitas['nama_fasilitas'] ?>" autocomplete="off" class="form-control" id="nama_fasilitas" name="nama_fasilitas">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="editFasilitas" class="btn btn-warning">Ubah</button>
                    </div>
                </div>
        </div>
    </div>
</div>

<?php

include '../components/footer.php';

?>