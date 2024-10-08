<?php 
include "./connection/config.php";
$title_web = "Main Website | SBD"; 
include "./components/header.php";
?>

<?php include "./components/navbar.php"; ?>

<div class="container">
    <table class="table-main">
        <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Telepone</th>
            <th>Jabatan</th>
            <th>Sandi</th>
        </tr>
        <?php 
        $increment = 1;
        $sql = "SELECT * FROM tbkaryawan";
        $query = mysqli_query($connect, $sql);
        $check = mysqli_num_rows($query);
        if($check < 0 ) {
            echo "<tr>
                <td cols='5'>Data found</td>
            </tr>";
        } 
        while($data = mysqli_fetch_assoc($query)) :
        ?>
        <tr>
            <td><?= $increment++ ?></td>
            <td><?= $data['namakaryawan'] ?></td>
            <td><?= $data['teleponkaryawan'] ?></td>
            <td><?= $data['jabatan'] ?></td>
            <td><?= $data['sandi'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php 
include "./components/footer.php";
?>