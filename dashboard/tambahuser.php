<?php
$title = "Tambah User";
require "head.php";
require "../include/koneksi.php";
$data =  mysqli_query($conn, "SELECT * FROM `user`");
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

            <div class="col">
                <a href="#" data-bs-toggle="modal" data-bs-target="#tambahakun">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0 text-white">Tambah User</h6>
                                <div class="ms-auto">
                                    <i class='bx bx-add-to-queue fs-3 text-white'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- modal -->

            <div class="modal fade" id="tambahakun" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <div class="modal-body">
                            <form class="row g-1" action="../action/proses.php" method="POST">
                                <div class="col-12">
                                    <label class="form-label">Nama</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                        <input type="text" name="nama" class="form-control border-start-0" placeholder="Nama" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Username</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user-pin'></i></span>
                                        <input type="text" name="username" class="form-control border-start-0" placeholder="Username" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock'></i></span>
                                        <input type="text" name="password" class="form-control border-start-0" placeholder="Password" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Role</label>
                                    <select class="form-select" name="role">
                                        <option selected>Pilih</option>
                                        <option value="ICT">ICT</option>
                                        <option value="AdminSecurity">Admin Security</option>
                                        <option value="Security">Security</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">No. Telepon/WA</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-phone'></i></span>
                                        <input type="number" name="nowa" class="form-control border-start-0" placeholder="No. WA" autocomplete="off">
                                    </div>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="tambahakun" name="aksi">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end modal -->


        </div><!-- end row -->

        <!-- Start Content -->
        <div class="card radius-10">
            <div class="card-body">

                <!-- alert -->
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
                    }
                }

                ?>
                <!-- end alert -->

                <!-- alert -->
                <?php

                if (isset($_SESSION['alert'])) {

                    if ($_SESSION['alert'] == "gagal") {

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
                <!-- end alert -->

                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Informasi Akun</h5>
                    </div>

                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="example">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>No. Telepon/WA</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($data as $akun) :
                            ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $akun['nama'] ?></td>
                                    <td><?= $akun['username'] ?></td>
                                    <td><?= $akun['role'] ?></td>
                                    <td><?= $akun['nowa'] ?></td>

                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="javascript:;" class="bg bg-warning text-white" data-bs-toggle="modal" data-bs-target="#editModal<?= $nomor; ?>"><i class="bx bx-edit-alt"></i></a>
                                            <a href="javascript:;" class="bg bg-danger text-white ms-4" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $nomor; ?>"><i class="bx bx-x"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <!--Edit modal -->

                                <div class="modal fade" id="editModal<?= $nomor; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Akun</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>


                                            <div class="modal-body">
                                                <form action="../action/proses.php" method="POST">
                                                    <div class="row g-1">
                                                        <div class="col-12">
                                                            <label class="form-label">Nama</label>
                                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                                                <input type="text" name="nama" class="form-control border-start-0" placeholder="Nama" autocomplete="off" required value="<?= htmlspecialchars($akun['nama']); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Username</label>
                                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user-pin'></i></span>
                                                                <input type="text" name="username" class="form-control border-start-0" placeholder="Username" autocomplete="off" required value="<?= htmlspecialchars($akun['username']); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Password</label>
                                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock'></i></span>
                                                                <input type="text" name="password" class="form-control border-start-0" placeholder="New Password" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Role</label>
                                                            <select class="form-select" name="role">
                                                                <?php
                                                                $role = $akun['role'];
                                                                if ($role == "ICT") {
                                                                ?>
                                                                    <option value="ICT">ICT</option>
                                                                    <option value="Security">Security</option>
                                                                    <option value="AdminSecurity">Admin Security</option>
                                                                <?php
                                                                } else if ($role == "Security") {
                                                                ?>
                                                                    <option value="Security">Security</option>
                                                                    <option value="AdminSecurity">Admin Security</option>
                                                                    <option value="ICT">ICT</option>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <option value="AdminSecurity">Admin Security</option>
                                                                    <option value="Security">Security</option>
                                                                    <option value="ICT">ICT</option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">No. Telepon/WA</label>
                                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-phone'></i></span>
                                                                <input type="number" name="nowa" class="form-control border-start-0" placeholder="No. Telpon/WA" autocomplete="off" value="<?= htmlspecialchars($akun['nowa']); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="modal-footer">
                                                <input type="hidden" value="editakun" name="aksi">
                                                <input type="hidden" value="<?= $akun['id_login'] ?>" name="id">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>

                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <!-- end modal -->



                                <!--Hapus modal -->

                                <div class="modal fade" id="hapusModal<?= $nomor; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi hapus akun</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>


                                            <div class="modal-body">
                                                <div class=""> Yakin untuk menghapus akun?</div>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="../action/proses.php" method="POST">
                                                    <input type="hidden" value="hapusakun" name="aksi">
                                                    <input type="hidden" value="<?= htmlspecialchars($akun['id_login']); ?>" name="id">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                    <button class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>

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
        <!-- end content -->
    </div>
</div>




<?php
require "foot.php";
?>