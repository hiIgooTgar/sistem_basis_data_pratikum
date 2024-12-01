<?php

include "../connection/config.php";

if (!isset($_GET['no_ktp'])) {
    header("Location: ../");
}

$no_ktp = $_GET['no_ktp'];

$query = mysqli_query($connect, "DELETE FROM anggota WHERE no_ktp = '$no_ktp'");
if ($query) {
    echo "
            <script>alert('Data anggota berhasil dihapus');
            document.location.href = 'anggota.php'</script>
            ";
} else {
    echo "
            <script>alert('Data anggota gagal ditambahkan');
            document.location.href = 'anggota.php'</script>
            ";
}
