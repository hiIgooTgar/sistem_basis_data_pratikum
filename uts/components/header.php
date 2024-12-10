  <?php

  session_start();

  if (!isset($_SESSION['id_users'])) {
    header("Location: ../");
  }

  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAedificium | UTS - SBD</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
  </head>

  <body>

    <?php if (!isset($_SESSION['id_users'])) { ?>
      <nav class="navbar navbar-expand-lg navbar-light bg-primary sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">
            <h3>MyAedificium</h3>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto gap-2">
              <a class="nav-link text-white" aria-current="page" href="./">Home</a>
              <a class="nav-link btn btn-sm btn-light text-dark" aria-current="page" href="./sign_up.php">Sign Up</a>
              <a class="nav-link btn btn-sm btn-light text-dark" aria-current="page" href="./sign_in.php">Sign In</a>

            </div>
          </div>
        </div>
      </nav>
    <?php } else { ?>

      <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">
            <h3>MyAedificium</h3>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto gap-2">
              <a class="nav-link text-white" href="../">Home</a>
              <a class="nav-link text-white" href="../src/anggota.php">Anggota</a>
              <a class="nav-link text-white" href="../src/gedung.php">Gedung</a>
              <a class="nav-link text-white" href="../src/fasilitas.php">Fasilitas</a>
              <a class="nav-link text-white" href="../src/penyewaan.php">Penyewaan</a>
              <a class="nav-link btn btn-sm btn-light text-dark" aria-disabled="disabled">Welcome, <?= $_SESSION['nama_lengkap'] ?></a>
              <a class="nav-link text-white btn btn-sm btn-danger" href="../logout.php">Logout</a>
            </div>
          </div>
        </div>
      </nav>

    <?php } ?>

    <div class="container my-5">