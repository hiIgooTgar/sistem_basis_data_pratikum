<?php

include "../connection/config.php";

if (!isset($_GET['id_penyewaan'])) {
    header("Location: ../");
}

if ($_SESSION['role'] == 'users') {
    header("Location: ../");
}

$id_penyewaan = $_GET['id_penyewaan'];

$query = mysqli_query($connect, "DELETE FROM penyewaan WHERE id_penyewaan = '$id_penyewaan'");
if ($query) {
    echo "
            <script>alert('Data penyewaan berhasil dihapus');
            document.location.href = 'penyewaan.php'</script>
            ";
} else {
    echo "
            <script>alert('Data penyewaan gagal ditambahkan');
            document.location.href = 'penyewaan.php'</script>
            ";
}
