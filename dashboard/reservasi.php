<?php
$title = "Reservasi";
require "head.php";
require "../include/koneksi.php";
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5>Reservasi Tamu PGE</h5>
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
                    <hr>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>No.WA Tamu</th>
                                    <th>No.WA Tujuan</th>
                                    <th>Tujuan/Perihal</th>
                                    <th>Tanggal Bertemu</th>
                                    <th>Waktu Bertemu</th>
                                    <th>Status</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $reservasii = mysqli_query($conn, "SELECT * FROM `reservasi`") ?>
                                <?php $nomor = 1; ?>
                                <?php foreach ($reservasii as $row) : ?>
                                    <tr class="text-center">
                                        <td><?= $nomor++; ?></td>
                                        <td><?= $row['nama1']; ?></td>
                                        <td><?= $row['notelepontamu']; ?></td>
                                        <td><?= $row['notelepontujuan']; ?></td>
                                        <td><?= $row['tujuan1']; ?></td>
                                        <td><?= $row['tanggal_bertemu']; ?></td>
                                        <td><?= $row['waktu_bertemu']; ?></td>

                                        <td>
                                            <?php
                                            if ($row['status'] == "pending") {
                                            ?>
                                                <div class="badge rounded-pill bg-light-info text-info w-100">Pending</div>
                                            <?php
                                            } else if ($row['status'] == "disetujui") {
                                            ?>

                                                <div class="badge rounded-pill bg-light-success text-success w-100">Disetujui</div>
                                            <?php
                                            } else if ($row['status'] == "dibatalkan") {
                                            ?>
                                                <div class="badge rounded-pill bg-light-danger text-danger w-100">Dibatalkan</div>
                                            <?php
                                            }

                                            ?>

                                        </td>

                                        <td>
                                            <?php
                                            if ($row['status'] == "pending") {
                                            ?>
                                                <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#terima<?= $nomor; ?>"><i class="bx bx-check me-0"></i>
                                                </button>
                                                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#batal<?= $nomor; ?>"><i class="bx bx-x me-0"></i>
                                                </button>
                                                <!-- <button type="submit" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bx bx-edit-alt me-0"></i>
                                                </button> -->
                                            <?php

                                            }
                                            ?>
                                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#hapusModalr<?= $nomor; ?>"><i class="bx bx-trash-alt me-0"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!--Hapus modal -->

                                    <div class="modal fade" id="hapusModalr<?= $nomor; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi hapus data reservasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>


                                                <div class="modal-body">
                                                    <div class=""> Yakin untuk menghapus data reservasi?</div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="../action/proses.php" method="POST">
                                                        <input type="hidden" value="hapusreservasi" name="aksi">
                                                        <input type="hidden" value="<?= htmlspecialchars($row['id_reservasi']); ?>" name="idr">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                        <button class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- end modal -->

                                    <!--terima modal -->

                                    <div class="modal fade" id="terima<?= $nomor; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi persetujuan reservasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-footer">
                                                    <form action="../action/proses.php" method="POST">
                                                        <input type="hidden" value="disetujui" name="aksi">
                                                        <input type="hidden" value="<?= htmlspecialchars($row['id_reservasi']); ?>" name="idr">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                        <button class="btn btn-success">Terima</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- end modal -->

                                    <!--tolak modal -->

                                    <div class="modal fade" id="batal<?= $nomor; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi persetujuan reservasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="../action/proses.php" method="POST">
                                                    <div class="modal-body">
                                                        <div>
                                                            <h6>Keterangan :</h6>
                                                            <textarea name="keterangan" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" value="dibatalkan" name="aksi">
                                                        <input type="hidden" value="<?= htmlspecialchars($row['id_reservasi']); ?>" name="idr">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                        <button class="btn btn-danger">Batalkan</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- end modal -->


                                    <!-- edit modal reservasi -->
                                    <div class="modal fade" id="editModal<?= $nomor; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit reservasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>


                                                <form action="../action/proses.php" method="POST">
                                                    <div class="modal-body">
                                                        <div class="row g-1">
                                                            <div class="col-12">
                                                                <label class="form-label">Tanggal Bertemu</label>
                                                                <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                                                    <input type="date" name="tanggalbertemu" class="form-control border-start-0" placeholder="Nama" autocomplete="off" required value="<?= htmlspecialchars($row['tanggal_bertemu']); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label">Waktu Bertemu</label>
                                                                <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bx-time'></i></span>
                                                                    <input type="time" name="waktubertemu" class="form-control border-start-0" placeholder="Nama" autocomplete="off" required value="<?= htmlspecialchars($row['waktu_bertemu']); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <input type="hidden" value="editreservasi" name="aksi">
                                                        <input type="hidden" value="<?= $row['id_reservasi'] ?>" name="id">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                        <button type="submit" class="btn btn-success">Simpan</button>

                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require "foot.php";
?>