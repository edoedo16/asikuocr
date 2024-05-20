<?php

include "head.php";

?>

<div class="container">
    <div class="row">
        <!-- Pesan Berhasil -->
        <?php
        if (isset($_SESSION['alert'])) {
            if ($_SESSION['alert'] == "berhasil") {
        ?>
                <div class="col-12">
                    <div class="alert alert-outline-success shadow-sm alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                            </div>
                            <div class="ms-3">

                                <div class="text-success"><?= $_SESSION['pesan']; ?></div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php
                unset($_SESSION['alert']);
            } else if ($_SESSION['alert'] == "gagal") {
            ?>
                <div class="col-12">
                    <div class="alert alert-outline-danger shadow-sm alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-danger"><i class='bx bxs-message-square-x'></i>
                            </div>
                            <div class="ms-3">

                                <div class="text-danger"><?= $_SESSION['pesan']; ?></div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
        <?php
                unset($_SESSION['alert']);
            }
        }

        ?>

        <!-- End Pesan Berhasil -->
        <!-- Pesan gagal -->



        <!-- End Pesan gagal -->
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-lg-12 col-md-12 mb-1">
            <a href="../"><button type="button" class="btn btn-secondary px-5 mb-3 mx-auto">Kembali</button></a>
            <!-- Start Form Tamu -->
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-list-ul me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">Pilih Inputan</h5>
                    </div>
                    <hr>
                    <div class="row row-cols-1 row-cols-xl-3 d-flex justify-content-center">
                        <div class="col">
                            <a href="potretsim.php">
                                <div class="card radius-10 bg-gradient-moonlit">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 text-white">Potret SIM</h5>
                                            <div class="ms-auto">
                                                <i class='bx bx-id-card fs-3 text-white'></i>
                                            </div>
                                        </div>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="uploadsim.php">
                                <div class="card radius-10 bg-gradient-moonlit">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 text-white">Upload SIM</h5>
                                            <div class="ms-auto">
                                                <i class='bx bx-id-card fs-3 text-white'></i>
                                            </div>
                                        </div>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
            <!-- End Form Tamu -->
        </div>







        <script>
            setInterval(function() {
                window.location.href = "index.php"
            }, 300000);
        </script>

        <?php

        include "foot.php";

        ?>