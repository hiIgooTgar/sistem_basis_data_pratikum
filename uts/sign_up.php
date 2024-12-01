<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | SBD</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="width: 100%; height: 100dvh;">
        <div class="row">
            <div class="col-md-12">
                <div class="card content-card-sign p-4 shadow-lg">
                    <h2 class="my-3">Sign Up | MyAedificium</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" autocomplete="off" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" autocomplete="off" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama</label>
                            <input type="text" autocomplete="off" class="form-control" id="nama_lengkap" name="nama_lengkap">
                        </div>
                        <button type="submit" class="btn btn-primary" name="signUp">Sign Up</button>
                        <p class="mt-4">Sudah punya akun? <span><a href="./sign_in.php">Sign In</a></span> sekarang!</p>
                    </form>
                    <div class="home-icon">
                        <a class="text-white btn btn-sm btn-primary" href="./index.php"><i class="bi bi-house"></i> Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/bootstrap.js"></script>

</body>

</html>


<?php

include "./connection/config.php";

if (isset($_POST['signUp'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);

    $cek_username = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($cek_username) > 0) {
        echo "
        <script>alert('Username sudah terdaftar');
        document.location.href = 'sign_up.php'</script>
        ";
    } else {
        $sql = "INSERT INTO users(id_users, username, password, nama_lengkap) VALUES('', '$username', '$password', '$nama_lengkap')";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo "
            <script>alert('Sign Up berhasil didaftarkan');
            document.location.href = 'sign_in.php'</script>
            ";
        } else {
            echo "
            <script>alert('Sign Up gagal didaftarkan');
            document.location.href = 'sign_up.php'</script>
            ";
        }
    }
}


?>