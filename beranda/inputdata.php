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
                        <div><i class="bx bx-clipboard me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">Masukan Data</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action="../action/proses.php" method="POST">
                        <div class="col-md-12">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="number" class="form-control" id="nik" name="nik" required autocomplete="off" maxlength="16">
                        </div>
                        <div class="col-md-4">
                            <label for="notelp" class="form-label">No. Telpon/WA</label>
                            <input type="number" class="form-control" id="notelp" name="notelp" required autocomplete="off" placeholder="08xxxxxxx" maxlength="13">
                        </div>
                        <div class="col-md-4">
                            <label for="novisitor" class="form-label">No. Visitor</label>
                            <input type="number" class="form-control" id="novisitor" name="novisitor" required autocomplete="off" maxlength="3">
                        </div>
                        <div class="col-md-12">
                            <label for="tujuan" class="form-label">Tujuan Kedatangan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="kepada" class="form-label">Kepada Bpk/Ibu atau fungsi</label>
                            <input type="text" class="form-control" id="kepada" name="orangyangdituju" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="alamat" class="form-label">Alamat/Instansi Tamu</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-12 mt-4 card">
                                <div class="card-body">
                                    <video id="video" width="100%" autoplay="true"></video>
                                    <input type="hidden" id="picture" name="gambar">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col text-center" style="transform: translateY(-15px);">
                            <input type="hidden" value="checkIn" name="aksi">
                            <button onclick="switchCamera()" type="button" class="btn btn-primary px-5">Ganti Kamera</button>
                        </div> -->

                        <div class="col text-center" style="transform: translateY(-15px);">
                            <input type="hidden" value="checkIn" name="aksi">
                            <button onclick="takePicture()" type="submit" name="submit" class="btn btn-primary px-5">CheckIn</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form Tamu -->
        </div>







        <script>
            setInterval(function() {
                window.location.href = "inputdata.php"
            }, 300000);
        </script>
<script src="../assets/js/cam.js">
        <?php

        include "foot.php";

        ?>