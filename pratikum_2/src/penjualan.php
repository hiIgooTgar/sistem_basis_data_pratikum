<?php 

include "../connection/config.php";
$title_web = "Penjualan | SBD";
include "../components/header.php";
include "../components/navbar_inside.php"
?>

<div class="container">
    <a href="./insert_penjualan.php" class="btn btn-primary">Tambah Penjualan</a>
    <table class="table-main">
        <tr>
            <th>No</th>
            <th>Nota Jual</th>
            <th>Tanggal</th>
            <th>Karyawan</th>
            <th>Nama Pelanggan</th>
            <th>Total total</th>
        </tr>
        <?php
        $increment = 1;
        $query = mysqli_query($connect, "SELECT tbpenjualan.*, tbkaryawan.namakaryawan, tbpelanggan.namapelanggan FROM tbpenjualan 
        INNER JOIN tbkaryawan ON tbkaryawan.idkaryawan = tbpenjualan.idkaryawan
        INNER JOIN tbpelanggan ON tbpenjualan.idpelanggan = tbpelanggan.idpelanggan");
        $check = mysqli_num_rows($query);
        if($check == 0) {
            echo "
            <tr>
                <td align='center' colspan='6'><h3>Data Penjualan Kosong!</h3></td>
            </tr>
            ";
        }
        while($data = mysqli_fetch_assoc($query)) :
        // setlocale(LC_ALL, 'id-ID', 'id_ID');
        // echo strftime("%d %B %Y");
        $date = $data['tgljual'];
        ?>
        <tr>
            <td><?= $increment++ ?></td>
            <td><?= $data['notajual'] ?></td>
            <td><?= date("d F Y", strtotime($date)) ?></td>
            <td><?= $data['namakaryawan'] ?></td>
            <td><?= $data['namapelanggan'] ?></td>
            <td><?= $data['totaljual'] ?></td>
            <td>
                <a href="./update_penjualan.php?idpembelian=<?= $data['idpembelian'] ?>" class="btn-sm btn-warning">Ubah</a>
                <a href="" class="btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php 
        endwhile;
        ?>
    </table>
</div>

<?php 
include "../components/footer.php";
?>