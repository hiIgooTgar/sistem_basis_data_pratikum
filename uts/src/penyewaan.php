<?php

include '../connection/config.php';
include '../components/header.php'

?>

<div class="row">
  <div class="col-md-12">
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Tambah data penyewaan
    </button>
    <table class="table table-hover table-responsive">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID Penyewaan</th>
          <th scope="col">No KTP</th>
          <th scope="col">Anggota Penyewa</th>
          <th scope="col">No Gedung</th>
          <th scope="col">Nama Gedung</th>
          <th scope="col">Tanggal Penyewaan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $a = 1;
        $sql = "SELECT penyewaan.*, anggota.no_ktp, anggota.nama AS nama_anggota, gedung.no_gedung, gedung.nama_gedung FROM penyewaan
    INNER JOIN anggota ON penyewaan.no_ktp = anggota.no_ktp
    INNER JOIN gedung ON penyewaan.no_gedung = gedung.no_gedung";
        $query = mysqli_query($connect, $sql);
        while ($data = mysqli_fetch_assoc($query)) :
          $date = $data['tanggal_penyewaan']
        ?>
          <tr>
            <th scope="row"><?= $a++ ?></th>
            <td><?= $data['id_penyewaan'] ?></td>
            <td><?= $data['no_ktp'] ?></td>
            <td><?= $data['nama_anggota'] ?></td>
            <td><?= $data['no_gedung'] ?></td>
            <td><?= $data['nama_gedung'] ?></td>
            <td><?= date('d F Y', strtotime($date)) ?></td>
            <td>
              <a href="" class="badge bg-warning text-dark">Ubah</a>
              <a href="./delete_penyewaan.php?id_penyewaan=<?= $data['id_penyewaan'] ?>" onclick="return confirm('Apakah anda ingin dihapus?')" class="badge bg-danger">Hapus</a>
            </td>
          </tr>
        <?php
        endwhile;
        ?>

      </tbody>
    </table>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah data gedung</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="id_penyewaan" class="form-label">ID Penyewaan</label>
                <input type="text" value="PYN" autocomplete="off" class="form-control" id="id_penyewaan" name="id_penyewaan">
              </div>
              <div class="mb-3">
                <label for="no_ktp" class="form-label">Nomor KTP | NIK</label>
                <select class="form-control" name="no_ktp" id="no_ktp">
                  <?php
                  $query = mysqli_query($connect, "SELECT * FROM anggota");
                  while ($data = mysqli_fetch_array($query)) :
                  ?>
                    <option value="<?= $data['no_ktp'] ?>"><?= $data['no_ktp'] ?> | <?= $data['nama'] ?></option>
                  <?php endwhile ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="no_gedung" class="form-label">Nomor Gedung</label>
                <select class="form-control" name="no_gedung" id="no_gedung">
                  <?php
                  $query = mysqli_query($connect, "SELECT * FROM gedung");
                  while ($data = mysqli_fetch_array($query)) :
                  ?>
                    <option value="<?= $data['no_gedung'] ?>"><?= $data['no_gedung'] ?> | <?= $data['nama_gedung'] ?></option>
                  <?php endwhile ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="tanggal_penyewaan" class="form-label">Tanggal Penyewaan</label>
                <input type="date" value="<?= date('Y-m-d') ?>" autocomplete="off" class="form-control" id="tanggal_penyewaan" name="tanggal_penyewaan">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="addPenyewaan" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

include '../components/footer.php'
?>



<?php


if (isset($_POST['addPenyewaan'])) {
  $id_penyewaan = htmlspecialchars($_POST['id_penyewaan']);
  $no_ktp = htmlspecialchars($_POST['no_ktp']);
  $no_gedung = htmlspecialchars($_POST['no_gedung']);
  $tanggal_penyewaan = htmlspecialchars($_POST['tanggal_penyewaan']);

  $cek_id_penyewaan = mysqli_query($connect, "SELECT * FROM penyewaan WHERE id_penyewaan = '$id_penyewaan'");
  if (mysqli_num_rows($cek_id_penyewaan) > 0) {
    echo "
        <script>alert('Nomor penyewaan sudah terdaftar');
        document.location.href = 'penyewaan.php'</script>
        ";
  } else {
    $sql = "INSERT INTO penyewaan(id_penyewaan, no_ktp, no_gedung, tanggal_penyewaan) 
    VALUES('$id_penyewaan', '$no_ktp', '$no_gedung', '$tanggal_penyewaan')";
    $query = mysqli_query($connect, $sql);
    if ($query) {
      echo "
            <script>alert('Data penyewaan berhasil ditambahkan');
            document.location.href = 'penyewaan.php'</script>
            ";
    } else {
      echo "
            <script>alert('Data penyewaan gagal ditambahkan');
            document.location.href = 'penyewaan.php'</script>
            ";
    }
  }
}



?>