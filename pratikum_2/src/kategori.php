<?php 
include "../connection/config.php";
$title_web = "Produk | SBD";
include "../components/header.php";
include "../components/navbar_inside.php";
?>

<div class="container">
    <table class="table-main">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>
        <?php 
        $increment = 1;
        $query = mysqli_query($connect, "SELECT * FROM tbkategori");
        $check = mysqli_num_rows($query);
        if($check == 0) {
            echo "<tr>
                <td colspan='5' align='center'><h3>Data Kategori Kosong!</h3></td>
            </tr>";
        }
        while($data = mysqli_fetch_assoc($query)) :
        ?>
        <tr>
            <td><?= $increment++ ?></td>
            <td><?= $data['namakategori'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include "../components/footer.php"; ?>