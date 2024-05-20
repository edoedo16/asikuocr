<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="../assets/images/favicon.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <title>ASIKU - PGELHD</title>
</head>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">

                        <div class="card shadow">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center mb-4">
                                        <div class="">
                                            <img src="../assets/images/favicon.png" width="120" height="120">
                                        </div>
                                        <!-- <div class="mb-0">
                                            <img src="../assets/images/logo-type-pertamina.png" width="120" height="40">
                                        </div> -->
                                        <div>
                                            <img src="../assets/images/ASIKU-logotype.png" width="180" height="40">
                                        </div>
                                        <div class="mt-2">
                                            <P class="text-secondary">APLIKASI RESERVASI DAN BUKUTAMU</P>
                                        </div>
                                    </div>




                                    <div class="form-body">
                                        <form class="row g-4" action="proseslogin.php" method="POST">
                                            <div class="col-12">
                                                <label for="user" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="user" autocomplete="off" placeholder=" Masukan Username">
                                            </div>
                                            <div class="col-12">
                                                <label for="pass" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" name="password" id="pass" autocomplete="off" placeholder="Masukan Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <?php

                                            if (isset($_SESSION['status'])) {

                                            ?>


                                                <div class="col-12 mt-5">
                                                    <div class="alert alert-outline-danger shadow-sm alert-dismissible fade show py-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="font-35 text-danger"><i class='bx bxs-message-square-x'></i>
                                                            </div>
                                                            <div class="ms-3">
                                                                <div class="text-danger">Username atau password salah!</div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                </div>


                                            <?php
                                                unset($_SESSION['status']);
                                            }

                                            ?>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-danger">Login</button>
                                                </div>
                                                <div class="col-12 text-center mt-1">
                                                    <a href="../index.php">Kembali</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->



    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../assets/plugins/chartjs/chart.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="../assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    <script src="../assets/plugins/jquery-knob/excanvas.js"></script>
    <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>


    <script src="../assets/js/index.js"></script>


    <!--app JS-->
    <script src="../assets/js/app.js"></script>
</body>

</html>