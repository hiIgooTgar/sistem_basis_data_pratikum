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
    while($data = mysqli_fetch_assoc($query)) :

    ?>
    <tr>
      <th scope="row"><?= $a++ ?></th>
      <td><?= $data['id_fasilitas'] ?></td>
      <td><?= $data['nama_fasilitas'] ?></td>
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