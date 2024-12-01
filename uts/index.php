<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAedificium | UTS - SBD</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
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
                        <a class="nav-link text-white" href="./src/anggota.php">Anggota</a>
                        <a class="nav-link text-white" href="./src/gedung.php">Gedung</a>
                        <a class="nav-link text-white" href="./src/fasilitas.php">Fasilitas</a>
                        <a class="nav-link text-white" href="./src/penyewaan.php">Penyewaan</a>
                        <a class="nav-link btn btn-sm btn-light text-dark" aria-disabled="disabled">Welcome, <?= $_SESSION['nama_lengkap'] ?></a>
                        <a class="nav-link text-white btn btn-sm btn-danger" href="./logout.php">Logout</a>

                    </div>
                </div>
            </div>
        </nav>
    <?php } ?>


    <div class="img-content"></div>
    <main class="content-main row d-flex align-items-center text-white">
        <div class="col-md-7">
            <h3>Selamat Datang di Webiste</h3>
            <h2><b>Penyewaan Gedung | <span class="text-primary">MyAedificium</span></b></h2>
            <p class="wid">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quibusdam nulla impedit officia fuga. Reprehenderit aut dignissimos quisquam adipisci aliquam pariatur ad recusandae facere harum? Omnis explicabo vero voluptates adipisci?</p>
            <a href="#about" class="btn btn-primary mt-2">Selengkapnya...</a>
        </div>
    </main>
    </div>
    <div class="bg-white text-dark pt-3">
        <div class="container">
            <section class="about-section py-5" id="about">
                <h2>Tentang <span class="text-primary">MyAedificium</span></h2>
                <div class="row">
                    <div class="col-md-6">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, vitae? Totam officiis, accusamus fugit quas quae illum, nisi neque ipsa, possimus vel culpa. Iure necessitatibus debitis sit eaque libero ad delectus, odio a dicta, expedita eos quae itaque exercitationem! Repudiandae illum quam, recusandae dolorem deserunt doloremque quos, beatae aut quisquam repellendus expedita excepturi libero ducimus eius impedit vero. Possimus neque omnis nulla error, natus facere exercitationem magnam asperiores repellendus deleniti esse dolorem sed soluta nesciunt iste earum deserunt animi aut labore voluptatum ad quam laborum laboriosam. Earum nisi perferendis, ullam libero harum animi, cum nemo fugiat neque omnis quod vitae.
                    </div>
                    <div class="col-md-6">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, vitae? Totam officiis, accusamus fugit quas quae illum, nisi neque ipsa, possimus vel culpa. Iure necessitatibus debitis sit eaque libero ad delectus, odio a dicta, expedita eos quae itaque exercitationem! Repudiandae illum quam, recusandae dolorem deserunt doloremque quos, beatae aut quisquam repellendus expedita excepturi libero ducimus eius impedit vero. Possimus neque omnis nulla error, natus facere exercitationem magnam asperiores repellendus deleniti esse dolorem sed soluta nesciunt iste earum deserunt animi aut labore voluptatum ad quam laborum laboriosam. Earum nisi perferendis, ullam libero harum animi, cum nemo fugiat neque omnis quod vitae.
                    </div>
                </div>
                <div class="row d-flex justify-content-center my-5">
                    <div class="card col-md-3 col-sm-6">
                        <img class="img-content-about" src="./assets/images/lobby.jpg">
                        <h5 class="text-center py-1">Looby</h5>
                    </div>
                    <div class="card col-md-3 col-sm-6">
                        <img class="img-content-about" src="./assets/images/basement.jpg">
                        <h5 class="text-center py-1">Basement</h5>
                    </div>
                    <div class="card col-md-3 col-sm-6">
                        <img class="img-content-about" src="./assets/images/security.jpg">
                        <h5 class="text-center py-1">Pos Security/keamanan</h5>
                    </div>
                    <div class="card col-md-3 col-sm-6">
                        <img class="img-content-about" src="./assets/images/kolam.png">
                        <h5 class="text-center py-1">Kolam Renang</h5>
                    </div>
                </div>
            </section>

            <section class="contact-section my-5">
                <h2>Kontak <span class="text-primary">MyAedificium</span></h2>
                <div class="row">
                    <div class="col-md-6">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus accusamus, deserunt voluptate eaque vitae esse magni officia quas repudiandae veritatis?
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6 d-flex gap-2">
                                <i class="bi bi-instagram"></i>
                                <p>MyAedificium_Official</p>
                            </div>
                            <div class="col-6 d-flex gap-2">
                                <i class="bi bi-youtube"></i>
                                <p>MyAedificium_Official</p>
                            </div>
                            <div class="col-6 d-flex gap-2">
                                <i class="bi bi-twitter"></i>
                                <p>MyAedificium_Official</p>
                            </div>
                            <div class="col-6 d-flex gap-2">
                                <i class="bi bi-tiktok"></i>
                                <p>MyAedificium_Official</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <footer class="bg-light py-3">
            <p class="text-center mb-0">MyAedificium | &copy; <span id="date_copy"></span></p>
        </footer>

    </div>
    <script src="./assets/js/bootstrap.js"></script>
    <script>
        document.getElementById('date_copy').innerHTML = new Date().getFullYear();
    </script>
</body>

</html>