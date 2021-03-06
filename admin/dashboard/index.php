<?php
require_once "../../config/app.php";

$authorized = false;
if (isset($_SESSION["level_akun"])) {
    if ($_SESSION["level_akun"] === "admin") {
        $authorized = $db->has("admin", ["id_admin" => $_SESSION["id_admin"]]);
        if (!$authorized) {
            header("Location: ../masuk");
            exit();
        }
    } else {
        header("Location: ../../pelanggan");
        exit();
    }
} else {
    header("Location: ../masuk");
    exit();
}

$akun = $db->select("admin", "*")[0];
$pengaturan = $db->select("pengaturan", "*")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" type="image/x-icon">
    <script src="../../assets/js/app.js"></script>
</head>

<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="index.html"><img src="../../assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-item ">
                        <a href="." class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="?page=pelanggan-home" class='sidebar-link'>
                            <i class="bi bi-house-fill"></i>
                            <span>Pelanggan Home</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a href="?page=pelanggan-hotspot" class='sidebar-link'>
                            <i class="bi bi-tags-fill"></i>
                            <span>Pelanggan Hotspot</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="?page=tiket" class='sidebar-link'>
                            <i class="bi bi-bookmarks-fill"></i>
                            <span>Tiket</span>
                        </a>
                    </li>

                    <!-- <li class="sidebar-item  ">
                        <a href="?catatan-keuangan" class='sidebar-link'>
                            <i class="bi bi-cash-stack"></i>
                            <span>Catatan Keuangan</span>
                        </a>
                    </li> -->

                    <li class="sidebar-item">
                        <a href="?page=cakupan-area" class='sidebar-link'>
                            <i class="bi bi-map-fill"></i>
                            <span>Cakupan Area</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="?=page-pengaturan" class='sidebar-link'>
                            <i class="bi bi-gear-fill"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li>

                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main" class='layout-navbar'>
        <header class='mb-3'>
            <nav class="navbar navbar-expand navbar-light ">
                <div class="container-fluid">
                    <a href="#" class="burger-btn d-block">
                        <i class="bi bi-justify fs-3"></i>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600"><?= htmlspecialchars($akun["nama_lengkap"]) ?></h6>
                                        <p class="mb-0 text-sm text-gray-600">Admin</p>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="../../assets/images/faces/1.jpg">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i>Profil</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i
                                            class="icon-mid bi bi-box-arrow-left me-2"></i>Keluar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div id="main-content">
            <?php
                if (isset($_GET["page"])) {
                    switch($_GET["page"]) {
                        case "":
                            require_once("pages/dashboard.php");
                            break;
                        case "pelanggan-home":
                            require_once("pages/pelanggan-home.php");
                            break;
                        case "pelanggan-hotspot":
                            require_once("pages/pelanggan-hotspot.php");
                            break;
                        case "tiket":
                            require_once("pages/tiket.php");
                            break;
                        case "cakupan-area":
                            require_once("pages/cakupan-area.php");
                            break;
                        case "pengaturan":
                            require_once("pages/pengaturan.php");
                            break;
                    }
                } else {
                    require_once("pages/dashboard.php");
                }
            ?>
        </div>

    </div>
</div>
<script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>

<script src="../../assets/js/mazer.js"></script>
</body>

</html>
