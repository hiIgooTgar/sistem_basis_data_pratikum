<?php 

$database = "ampu_mart";
$connect = mysqli_connect("localhost", "root", "", $database);

if(!$connect) {
    die("Unknown Database $database". mysqli_connect_error($connect));
}

?>