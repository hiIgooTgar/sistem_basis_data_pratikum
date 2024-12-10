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
      Tambah data fasilitas
    </button>
    <div class="table-responsive">

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">ID Fasilitas</th>
            <th scope="col">Nama Fasilitas</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $a = 1;
          $sql = "SELECT * FROM fasilitas";
          $query = mysqli_query($connect, $sql);
          while ($data = mysqli_fetch_assoc($query)) :

          ?>
            <tr>
              <th scope="row"><?= $a++ ?></th>
              <td><?= $data['id_fasilitas'] ?></td>
              <td><?= $data['nama_fasilitas'] ?></td>
              <td>
                <a href="./ubah_fasilitas.php?id_fasilitas=<?= $data['id_fasilitas'] ?>" class="badge bg-warning text-dark">Ubah</a>
                <a href="./delete_fasilitas.php?id_fasilitas=<?= $data['id_fasilitas'] ?>" onclick="return confirm('Apakah anda ingin dihapus?')" class="badge bg-danger">Hapus</a>
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
            <h5 class="modal-title" id="staticBackdropLabel">Tambah data fasilitas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="id_fasilitas" class="form-label">ID Fasilitas</label>
                <input type="text" value="FA" autocomplete="off" class="form-control" id="id_fasilitas" name="id_fasilitas">
              </div>
              <div class="mb-3">
                <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                <textarea class="form-control" style="height: 100px;" name="nama_fasilitas" id="nama_fasilitas" cols="10" rows="10"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="addFasilitas" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

include '../components/footer.php';

?>

<?php


if (isset($_POST['addFasilitas'])) {
  $id_fasilitas = htmlspecialchars($_POST['id_fasilitas']);
  $nama_fasilitas = htmlspecialchars($_POST['nama_fasilitas']);

  $cek_id_fasilitas = mysqli_query($connect, "SELECT * FROM fasilitas WHERE id_fasilitas = '$id_fasilitas'");
  if (mysqli_num_rows($cek_id_fasilitas) > 0) {
    echo "
        <script>alert('ID Fasilitas sudah terdaftar');
        document.location.href = 'fasilitas.php'</script>
        ";
  } else {
    $sql = "INSERT INTO fasilitas(id_fasilitas, nama_fasilitas) VALUES('$id_fasilitas', '$nama_fasilitas')";
    $query = mysqli_query($connect, $sql);
    if ($query) {
      echo "
            <script>alert('Data fasilitas berhasil ditambahkan');
            document.location.href = 'fasilitas.php'</script>
            ";
    } else {
      echo "
            <script>alert('Data fasilitas gagal ditambahkan');
            document.location.href = 'fasilitas.php'</script>
            ";
    }
  }
}



?>