<?php 
include "../connection/config.php";
$title_web = "Pemasok | SBD"; 
include "../components/header.php";
include "../components/navbar_inside.php"; 
?>

<div class="container">
    <table class="table-main">
        <tr>
            <th>No</th>
            <th>Nama Pemasok</th>
            <th>Telepon</th>
            <th>Pic</th>
        </tr>
        <?php 
        $increment = 1;
        $sql = "SELECT * FROM tbpemasok";
        $query = mysqli_query($connect, $sql);
        $check = mysqli_num_rows($query);
        if($check == 0 ) {
            echo "<tr>
                <td align='center' colspan='4'><h3>Data Pemasok Ksosong!</h3></td>
            </tr>";
        } 
        while($data = mysqli_fetch_assoc($query)) :
        ?>
        <tr>
            <td><?= $increment++ ?></td>
            <td><?= $data['namapemasok'] ?></td>
            <td><?= $data['kontak'] ?></td>
            <td><?= $data['pic'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php 
include "../components/footer.php";
?>