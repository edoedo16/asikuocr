<?php
session_start();
if (!isset($_SESSION["status"])) {
    header("location: ../login/error.php");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="../assets/images/favicon.png" type="image/png" />
    <!--plugins-->
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <title>ASIKU - <?= $title; ?></title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <a href=""><img src="../assets/images/favicon.png" class="logo-icon"></a>
                </div>
                <div>
                    <a href=""><img src="../assets/images/ASIKU-logotype.png" class="logo-text"></a>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <?php
                if ($_SESSION['role'] == 'ICT') {

                ?>
                    <li>
                        <a href="index.php">
                            <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="reservasi.php">
                            <div class="parent-icon"><i class='bx bx-comment-detail'></i>
                            </div>
                            <div class="menu-title">Reservasi</div>
                        </a>
                    </li>
                    <li>
                        <a href="tambahuser.php">
                            <div class="parent-icon"><i class='bx bx-user-plus'></i>
                            </div>
                            <div class="menu-title">Tambah User</div>
                        </a>
                    </li>
                <?php
                } else if ($_SESSION['role'] == 'Security') {
                ?>
                    <li>
                        <a href="dashboardsecurity.php">
                            <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="reservasisecurity.php">
                            <div class="parent-icon"><i class='bx bx-comment-detail'></i>
                            </div>
                            <div class="menu-title">Reservasi</div>
                        </a>
                    </li>
                <?php
                } else if ($_SESSION['role'] == 'AdminSecurity') {
                ?>
                    <li>
                        <a href="index.php">
                            <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="reservasi.php">
                            <div class="parent-icon"><i class='bx bx-comment-detail'></i>
                            </div>
                            <div class="menu-title">Reservasi</div>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>

            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->

        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="top-menu ms-auto">
                        <div class="header-notifications-list">
                        </div>
                        <div class="header-message-list">
                        </div>
                    </div>

                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/images/icons/user.png" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0"><?= $_SESSION['nama'] ?></p>
                                <p class="designattion mb-0"><?= $_SESSION['role'] ?></p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">

                            <li><a class="dropdown-item" href="../action/proses.php?aksi=logout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->