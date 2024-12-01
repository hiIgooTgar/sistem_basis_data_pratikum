<?php

include '../connection/config.php';
include '../components/header.php'

?>

<div class="row">
  <div class="col-md-12">
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Tambah data gedung
    </button>

    <div class="table-responsive">
      <table class="table table-hover ">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nomor Gedung</th>
            <th scope="col">Nama Gedung</th>
            <th scope="col">Kapasitas</th>
            <th scope="col">Harga Sewa</th>
            <th scope="col">Fasilitas</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $a = 1;
          $sql = "SELECT gedung.*, fasilitas.nama_fasilitas FROM gedung
    INNER JOIN  fasilitas ON gedung.id_fasilitas = fasilitas.id_fasilitas";
          $query = mysqli_query($connect, $sql);
          while ($data = mysqli_fetch_assoc($query)) :

          ?>
            <tr>
              <th scope="row"><?= $a++ ?></th>
              <td><?= $data['no_gedung'] ?></td>
              <td><?= $data['nama_gedung'] ?></td>
              <td><?= $data['kapasitas'] ?></td>
              <td><?= $data['harga_sewa'] ?></td>
              <td><?= $data['nama_fasilitas'] ?></td>
              <td>
                <a href="./ubah_gedung.php?no_gedung=<?= $data['no_gedung'] ?>" class="badge bg-warning text-dark">Ubah</a>
                <a href="./delete_gedung.php?no_gedung=<?= $data['no_gedung'] ?>" onclick="return confirm('Apakah anda ingin dihapus?')" class="badge bg-danger">Hapus</a>
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
            <h5 class="modal-title" id="staticBackdropLabel">Tambah data gedung</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="no_gedung" class="form-label">Nomor Gedung</label>
                <input type="text" value="GE" autocomplete="off" class="form-control" id="no_gedung" name="no_gedung">
              </div>
              <div class="mb-3">
                <label for="nama_gedung" class="form-label">Nama Gedung</label>
                <input type="text" autocomplete="off" class="form-control" id="nama_gedung" name="nama_gedung">
              </div>
              <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" autocomplete="off" class="form-control" id="kapasitas" name="kapasitas">
              </div>
              <div class="mb-3">
                <label for="harga_sewa" class="form-label">Harga Sewa</label>
                <input type="number" autocomplete="off" class="form-control" id="harga_sewa" name="harga_sewa">
              </div>
              <div class="mb-3">
                <label for="id_fasilitas" class="form-label">Fasilitas</label>
                <select class="form-control" name="id_fasilitas" id="id_fasilitas">
                  <?php
                  $query = mysqli_query($connect, "SELECT * FROM fasilitas");
                  while ($data = mysqli_fetch_array($query)) :
                  ?>
                    <option value="<?= $data['id_fasilitas'] ?>"><?= $data['nama_fasilitas'] ?></option>
                  <?php endwhile ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="addGedung" class="btn btn-primary">Submit</button>
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

if (isset($_POST['addGedung'])) {
  $no_gedung = htmlspecialchars($_POST['no_gedung']);
  $nama_gedung = htmlspecialchars($_POST['nama_gedung']);
  $kapasitas = htmlspecialchars($_POST['kapasitas']);
  $harga_sewa = htmlspecialchars($_POST['harga_sewa']);
  $id_fasilitas = htmlspecialchars($_POST['id_fasilitas']);

  $cek_no_gedung = mysqli_query($connect, "SELECT * FROM gedung WHERE no_gedung = '$no_gedung'");
  if (mysqli_num_rows($cek_no_gedung) > 0) {
    echo "
        <script>alert('Nomor Gedung sudah terdaftar');
        document.location.href = 'gedung.php'</script>
        ";
  } else {
    $sql = "INSERT INTO gedung(no_gedung, nama_gedung, kapasitas, harga_sewa, id_fasilitas) 
    VALUES('$no_gedung', '$nama_gedung', '$kapasitas', '$harga_sewa', '$id_fasilitas')";
    $query = mysqli_query($connect, $sql);
    if ($query) {
      echo "
            <script>alert('Data gedung berhasil ditambahkan');
            document.location.href = 'gedung.php'</script>
            ";
    } else {
      echo "
            <script>alert('Data gedung gagal ditambahkan');
            document.location.href = 'gedung.php'</script>
            ";
    }
  }
}

?>