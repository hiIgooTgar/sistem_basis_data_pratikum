<?php 

include "../connection/config.php";
$title_web = "SBD | Detail Pembelian";
include "../components/header.php";
include "../components/navbar_inside.php";

$notabeli = $_GET['notabeli'];

$query = "SELECT * FROM tbpembelian WHERE notabeli = $notabeli";
$sql = mysqli_query($connect, $query);
$fetchData = mysqli_fetch_assoc($sql);

if(mysqli_num_rows($sql) < 1) {
    die("Data tidak ditemukan!");
} 

?>

<?php 

include "../components/footer.php";

?>