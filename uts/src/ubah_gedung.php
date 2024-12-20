<?php

include '../connection/config.php';
include '../components/header.php';

if (!isset($_GET['no_gedung'])) {
    header("Location: ../");
}

if ($_SESSION['role'] == 'users') {
    header("Location: ../");
}

$no_gedung = $_GET['no_gedung'];

$query = "SELECT * FROM gedung WHERE no_gedung = '$no_gedung'";
$sql = mysqli_query($connect, $query);
$dataGedung = mysqli_fetch_array($sql);


?>

<div class="row">
    <div class="col-md-12">
        <a href="./gedung.php" class="btn btn-primary mb-3">Kembali</a>
        <div class="card p-4 mb-4">
            <h4 class="mb-4 col-12">Ubah Gedung</h3>
                <form action="" method="post">
                    <div class="row">
                        <input type="hidden" value="<?= $dataGedung['no_gedung'] ?>" name="no_gedung_old">
                        <div class="mb-3 col-md-12">
                            <label for="no_gedung" class="form-label">Nomor Gedung</label>
                            <input type="text" value="<?= $dataGedung['no_gedung'] ?>" autocomplete="off" class="form-control" id="no_gedung" name="no_gedung">
                        </div>
                        <div class="mb-3 col-md-6 col-sm-12">
                            <label for="nama_gedung" class="form-label">Nama Gedung</label>
                            <input type="text" value="<?= $dataGedung['nama_gedung'] ?>" autocomplete="off" class="form-control" id="nama_gedung" name="nama_gedung">
                        </div>
                        <div class="mb-3 col-md-6 col-sm-12">
                            <label for="kapasitas" class="form-label">Kapasitas</label>
                            <input type="number" value="<?= $dataGedung['kapasitas'] ?>" autocomplete="off" class="form-control" id="kapasitas" name="kapasitas">
                        </div>
                        <div class="mb-3 col-md-6 col-sm-12">
                            <label for="harga_sewa" class="form-label">Harga Sewa</label>
                            <input type="number" value="<?= $dataGedung['harga_sewa'] ?>" autocomplete="off" class="form-control" id="harga_sewa" name="harga_sewa">
                        </div>
                        <div class="mb-3 col-md-6 col-sm-12">
                            <label for="id_fasilitas" class="form-label">Fasilitas</label>
                            <select class="form-control" name="id_fasilitas" id="id_fasilitas">
                                <?php
                                $query = mysqli_query($connect, "SELECT * FROM fasilitas");
                                while ($data = mysqli_fetch_array($query)) :
                                    $selected = ($dataGedung['id_fasilitas'] == $data['id_fasilitas']) ? "selected" : ""
                                ?>
                                    <option <?= $selected ?> value="<?= $data['id_fasilitas'] ?>"><?= $data['nama_fasilitas'] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="editGedung" class="btn btn-warning">Ubah</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

<?php

include '../components/footer.php';

?>

<?php

if (isset($_POST['editGedung'])) {
    $no_gedung_old = htmlspecialchars($_POST['no_gedung_old']);
    $no_gedung = htmlspecialchars($_POST['no_gedung']);
    $nama_gedung = htmlspecialchars($_POST['nama_gedung']);
    $kapasitas = htmlspecialchars($_POST['kapasitas']);
    $harga_sewa = htmlspecialchars($_POST['harga_sewa']);
    $id_fasilitas = htmlspecialchars($_POST['id_fasilitas']);

    $sql = "UPDATE gedung SET no_gedung='$no_gedung', nama_gedung='$nama_gedung', kapasitas='$kapasitas', harga_sewa='$harga_sewa', id_fasilitas='$id_fasilitas' WHERE no_gedung='$no_gedung_old'";
    $query = mysqli_query($connect, $sql);
    if ($query) {
        echo "
            <script>alert('Data gedung berhasil diubah');
            document.location.href = 'gedung.php'</script>
            ";
    } else {
        echo "
            <script>alert('Data gedung gagal diubah');
            document.location.href = 'gedung.php'</script>
            ";
    }
}

?>