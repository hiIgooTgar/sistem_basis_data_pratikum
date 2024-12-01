<?php 

include '../connection/config.php';
include '../components/header.php'

?>

<div class="row">
    <div class="col-md-12">
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
    while($data = mysqli_fetch_assoc($query)) :

    ?>
    <tr>
      <th scope="row"><?= $a++ ?></th>
      <td><?= $data['no_ktp'] ?></td>
      <td><?= $data['nama'] ?></td>
      <td><?= $data['alamat'] ?></td>
      <td>
        <a href="" class="badge bg-warning text-dark">Ubah</a>
        <a href="" class="badge bg-danger">Hapus</a>
      </td>
    </tr>
    <?php 
    endwhile;
    ?>
   
  </tbody>
</table>
    </div>
</div>

<?php 

include '../components/footer.php'
?>