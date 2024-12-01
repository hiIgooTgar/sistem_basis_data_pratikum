<?php 

$connect = mysqli_connect("localhost", 'root', '', 'uts_sbd');
if(!$connect) {
    die('Gagal terhubung database ').mysqli_connect_error($connect);
}

?>