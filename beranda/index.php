<?php

include "head.php";

?>
<div class="container">
    <div class="row">
        <div class="col-12">

            <!-- Pesan Berhasil -->
            <?php
            if (isset($_SESSION['alert'])) {
                if ($_SESSION['alert'] == "berhasil") {
            ?>
                    <div class="col-12">
                        <div class="alert alert-outline-success shadow-sm alert-dismissible fade show py-2" style="background-color: #fff;">
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
                        <div class="alert alert-outline-danger shadow-sm alert-dismissible fade show py-2" style="background-color: #fff;">
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

        <div class="col-lg-12 col-md-12 mb-1">
            <!-- Pilih Inputan-->
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-list-ul me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">Pilih Inputan</h5>
                    </div>
                    <hr>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 d-flex justify-content-center">
                        <div class="col">
                            <a href="pilihktp.php">
                                <div class="card radius-10 bg-gradient-deepblue">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 text-white">Scan Data KTP</h5>
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
                        <!-- <div class="col">
                            <a href="pilihsim.php">
                                <div class="card radius-10 bg-gradient-ibiza">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 text-white">Scan SIM</h5>
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
                        </div> -->
                        <div class="col">
                            <a href="inputdata.php">
                                <div class="card radius-10 bg-gradient-ohhappiness">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 text-white">Input Data</h5>
                                            <div class="ms-auto">
                                                <i class='bx bx-user-circle fs-3 text-white'></i>
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
            <!-- End Pilih Inputan -->


            <!-- Start Reservasi -->
            <div class="card col-lg-3">
                <div class="card-body">
                    <div class="card-title d-flex">
                        <i class="bx bx-envelope me-1 font-22"></i>
                        <h5 class="m-1">Buat Reservasi</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reservasi">Reservasi</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end reservasi -->
    </div>


    <!-- start modal reservasi -->
    <div class="modal fade" id="reservasi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg bg-light">
                <div class="modal-header">
                    <h5 class="modal-title">Lengkapi Data Berikut</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../action/proses.php" class="row g-2 justify-content-center" method="POST">
                    <div class="modal-body text-white">
                        <div class="col-lg-12">
                            <label for="nama" class="text-dark">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama1" required autocomplete="off">
                        </div>
                        <div class="col-lg-12">
                            <label for="tlptamu" class="text-dark">No. Telpon/WA Tamu</label>
                            <input type="number" class="form-control" id="tlptamu" name="notelepontamu" required autocomplete="off">
                        </div>
                        <div class="col-lg-12">
                            <label for="tlptujuan" class="text-dark">No. Telpon/WA Tujuan</label>
                            <input type="number" class="form-control" id="tlptujuan" name="notelepontujuan" required autocomplete="off">
                        </div>
                        <div class="col-lg-12">
                            <label for="tanggal" class="text-dark">Tanggal Bertemu</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggalbertemu" required autocomplete="off">

                        </div>
                        <div class="col-lg-12">
                            <label for="waktu" class="text-dark">Waktu Bertemu</label>
                            <input type="time" class="form-control" id="waktu" name="waktubertemu" required autocomplete="off" placeholder="Waktu">
                        </div>
                        <div class="col-lg-12 mt-1">
                            <textarea name="tujuan1" class="form-control" cols="103" rows="5" placeholder="Perihal..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="reservasi" name="aksi">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End modal Reservasi -->

</div>


</div>


<?php

include "foot.php";

?>