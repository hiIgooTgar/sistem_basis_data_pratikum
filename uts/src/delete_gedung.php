<?php

include "../connection/config.php";

if (!isset($_GET['no_gedung'])) {
    header("Location: ../");
}

if ($_SESSION['role'] == 'users') {
    header("Location: ../");
}

$no_gedung = $_GET['no_gedung'];

$query = mysqli_query($connect, "DELETE FROM gedung WHERE no_gedung = '$no_gedung'");
if ($query) {
    echo "
            <script>alert('Data gedung berhasil dihapus');
            document.location.href = 'gedung.php'</script>
            ";
} else {
    echo "
            <script>alert('Data gedung gagal ditambahkan');
            document.location.href = 'gedung.php'</script>
            ";
}
