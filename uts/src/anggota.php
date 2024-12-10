<?php

include '../connection/config.php';
include '../components/header.php';

if ($_SESSION['role'] == 'users') {
  header("Location: ../");
}

?>

<div class="row">
  <div class="col-md-12">
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Tambah data anggota
    </button>

    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nomor KTP</th>
            <th scope="col">Nama Anggota</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $a = 1;
          $sql = "SELECT * FROM anggota";
          $query = mysqli_query($connect, $sql);
          while ($data = mysqli_fetch_assoc($query)) :

          ?>
            <tr>
              <th scope="row"><?= $a++ ?></th>
              <td><?= $data['no_ktp'] ?></td>
              <td><?= $data['nama'] ?></td>
              <td><?= $data['alamat'] ?></td>
              <td>
                <a href="./ubah_anggota.php?no_ktp=<?= $data['no_ktp'] ?>" class="badge bg-warning text-dark">Ubah</a>
                <a href="./delete_anggota.php?no_ktp=<?= $data['no_ktp'] ?>" onclick="return confirm('Apakah anda ingin dihapus?')" class="badge bg-danger">Hapus</a>
              </td>
            </tr>
          <?php
          endwhile;
          ?>

        </tbody>
      </table>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah data anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="no_ktp" class="form-label">Nomor KTP</label>
                <input type="text" autocomplete="off" class="form-control" id="no_ktp" name="no_ktp">
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Anggota</label>
                <input type="text" autocomplete="off" class="form-control" id="nama" name="nama">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" style="height: 100px;" name="alamat" id="alamat" cols="10" rows="10"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="addAnggota" class="btn btn-primary">Submit</button>
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

if (isset($_POST['addAnggota'])) {
  $no_ktp = htmlspecialchars($_POST['no_ktp']);
  $nama = htmlspecialchars($_POST['nama']);
  $alamat = htmlspecialchars($_POST['alamat']);

  $cek_no_ktp = mysqli_query($connect, "SELECT * FROM anggota WHERE no_ktp = '$no_ktp'");
  if (mysqli_num_rows($cek_no_ktp) > 0) {
    echo "
        <script>alert('NIK sudah terdaftar');
        document.location.href = 'anggota.php'</script>
        ";
  } else {
    $sql = "INSERT INTO anggota(no_ktp, nama, alamat) VALUES('$no_ktp', '$nama', '$alamat')";
    $query = mysqli_query($connect, $sql);
    if ($query) {
      echo "
            <script>alert('Data anggota berhasil ditambahkan');
            document.location.href = 'anggota.php'</script>
            ";
    } else {
      echo "
            <script>alert('Data anggota gagal ditambahkan');
            document.location.href = 'anggota.php'</script>
            ";
    }
  }
}

?>