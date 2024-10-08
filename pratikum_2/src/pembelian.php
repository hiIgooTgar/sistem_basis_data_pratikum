<?php 

include "../connection/config.php";
$title_web = "Pembelian | SBD";
include "../components/header.php";
include "../components/navbar_inside.php"
?>

<div class="container">
    <table class="table-main">
        <tr>
            <th>No</th>
            <th>Nota</th>
            <th>Tanggal</th>
            <th>Karyawan</th>
            <th>Pemasok</th>
            <th>Total</th>
        </tr>
        <?php 
        $increment = 1;
        $query = mysqli_query($connect, "SELECT tbpembelian.*, tbkaryawan.namakaryawan, tbpemasok.namapemasok FROM tbpembelian 
        INNER JOIN tbkaryawan ON tbkaryawan.idkaryawan = tbpembelian.idkaryawan
        INNER JOIN tbpemasok ON tbpembelian.idpemasok = tbpemasok.idpemasok");
        $check = mysqli_num_rows($query);
        if($check == 0) {
            echo "
            <tr>
                <td align='center' colspan='6'><h3>Data Pembelian Kosong!</h3></td>
            </tr>
            ";
        }
        while($data = mysqli_fetch_assoc($query)) :
        // setlocale(LC_ALL, 'id-ID', 'id_ID');
        // echo strftime("%d %B %Y");
        $date = $data['tglbeli'];
        ?>
        <tr>
            <td><?= $increment++ ?></td>
            <td><?= $data['notabeli'] ?></td>
            <td><?= date("d F Y", strtotime($date)) ?></td>
            <td><?= $data['namakaryawan'] ?></td>
            <td><?= $data['namapemasok'] ?></td>
            <td><?= $data['totalbeli'] ?></td>
        </tr>
        <?php 
        endwhile;
        ?>
    </table>
</div>

<?php 
include "../components/footer.php";
?>