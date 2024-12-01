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
                <form action="" method="post">
                    <div class="row">
                        <input type="hidden" value="<?= $dataPenyewaan['id_penyewaan'] ?>" name="id_penyewaan_old">
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
                            <button type="submit" name="editPenyewaan" class="btn btn-warning">Ubah</button>
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

if (isset($_POST['editPenyewaan'])) {
    $id_penyewaan_old = htmlspecialchars($_POST['id_penyewaan_old']);
    $id_penyewaan = htmlspecialchars($_POST['id_penyewaan']);
    $no_ktp = htmlspecialchars($_POST['no_ktp']);
    $no_gedung = htmlspecialchars($_POST['no_gedung']);
    $tanggal_penyewaan = htmlspecialchars($_POST['tanggal_penyewaan']);

    $sql = "UPDATE penyewaan SET id_penyewaan='$id_penyewaan', no_ktp='$no_ktp', no_gedung='$no_gedung', tanggal_penyewaan='$tanggal_penyewaan' WHERE id_penyewaan='$id_penyewaan_old'";
    $query = mysqli_query($connect, $sql);
    if ($query) {
        echo "
            <script>alert('Data penyewaan berhasil diubah');
            document.location.href = 'penyewaan.php'</script>
            ";
    } else {
        echo "
            <script>alert('Data penyewaan gagal diubah');
            document.location.href = 'penyewaan.php'</script>
            ";
    }
}

?>