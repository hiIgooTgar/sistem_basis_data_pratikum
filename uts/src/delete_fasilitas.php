<?php

include "../connection/config.php";

if (!isset($_GET['id_fasilitas'])) {
    header("Location: ../");
}

$id_fasilitas = $_GET['id_fasilitas'];

$query = mysqli_query($connect, "DELETE FROM fasilitas WHERE id_fasilitas = '$id_fasilitas'");
if ($query) {
    echo "
            <script>alert('Data fasilitas berhasil dihapus');
            document.location.href = 'fasilitas.php'</script>
            ";
} else {
    echo "
            <script>alert('Data fasilitas gagal ditambahkan');
            document.location.href = 'fasilitas.php'</script>
            ";
}
