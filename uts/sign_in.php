<?php

session_start();
if (!empty($_SESSION['signin'])) {
    header("Location: ./uts/sign_in.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | SBD</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="width: 100%; height: 100dvh;">
        <div class="row">
            <div class="col-md-12">
                <div class="card content-card-sign p-4 shadow-lg">
                    <h2 class="my-3">Sign In | MyAedificium</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" autocomplete="off" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" autocomplete="off" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="signIp">Sign In</button>
                        <p class="mt-4">Belum punya akun? <span><a href="./sign_up.php">Sign Up</a></span> sekarang!</p>
                    </form>
                    <div class="home-icon">
                        <a class="text-white btn btn-sm btn-primary" href="./"><i class="bi bi-house"></i> Home</a>
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

if (isset($_POST['signIp'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $cek_username = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($cek_username) > 0) {
        $data = mysqli_fetch_array($cek_username);
        if (password_verify($password, $data['password'])) {
            $_SESSION['signin'] = 1;
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['id_users'] = $data['id_users'];
            header("Location: ./");
        } else {
            echo "
            <script>alert('Password anda salah!');
            document.location.href = 'sign_in.php'</script>
            ";
        }
    } else {
        echo "
            <script>alert('Username atau Password anda salah!');
            document.location.href = 'sign_in.php'</script>
            ";
    }
}


?>