<?php
$title = "Dashboard";
require 'head.php';
require '../include/koneksi.php';


$data = mysqli_query($conn, "SELECT * FROM `bukutamu`");
$data1 = mysqli_query($conn, "SELECT * FROM `reservasi`");

$jumlahVisitor = mysqli_num_rows($data);
$jumlahReservasi = mysqli_num_rows($data1);

?>
<!-- Start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!-- Start row -->
        <div class="row">
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
            <div class="col-md-3">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?= $jumlahVisitor; ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-happy fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Pengunjung PGELHD</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?= $jumlahReservasi; ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-duplicate fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width:100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Reservasi</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End row -->

        <!-- Start grafik -->
        <?php
        $datagrafik = mysqli_query($conn, "SELECT YEAR(`tanggal`) AS tahun, MONTH(`tanggal`) AS bulan, COUNT(`id_bukutamu`) AS jumlah
        FROM `bukutamu`
        GROUP BY YEAR(`tanggal`), MONTH(`tanggal`)
        ORDER BY YEAR(`tanggal`), MONTH(`tanggal`)");
        // $jumlah_data = [];
        // $label = [];
        $data = [];
        foreach ($datagrafik as $row) {
            // $jumlah_data[] = $row['jumlah'];
            // $label[] = $row['tgl'];
            $tahun = $row['tahun'];
            $bulan = $row['bulan'];
            $jumlah = $row['jumlah'];

            $nama_bulan = date('F', mktime(0, 0, 0, $bulan, 1));
            $data[$tahun][] = [
                'bulan' => $nama_bulan,
                'jumlah' => $jumlah
            ];
        };
        $data_json = json_encode($data);


        ?>
        <!-- Start row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5>Jumlah Pengunjung PGELHD Tiap Bulan</h5>
                        <hr>
                        <div class="chart-js-container3">
                            <canvas id="chart0"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
        <!-- End grafik -->

        <!-- Start Info Tamu -->
        <div class="col-12">
            <div class="card" style="max-height: 60vh; overflow: scroll;">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-table me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">Pengunjung Bulan <?= date('F'); ?></h5>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>No. Visitor</th>
                                    <th>No. Telepon</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <?php
                                $tgl = date('Y-m');
                                $tamuall = mysqli_query($conn, "SELECT * FROM bukutamu WHERE tanggal LIKE '%$tgl%'");
                                ?>

                                <?php $nomor = 1; ?>
                                <?php foreach ($tamuall as $row) : ?>
                                    <tr>
                                        <td><?= $nomor++; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['novisitor']; ?></td>
                                        <td><?= $row['notelp']; ?></td>
                                        <td>
                                            <?php
                                            $statusout = $row['Waktu_Keluar'];
                                            if ($statusout == "belum_pulang") {
                                            ?>


                                                <form action="../action/proses.php" method="POST">
                                                    <button type="submit" name="submit" class="btn btn-warning">
                                                        <input type="hidden" value="checkOut" name="aksi">
                                                        <input type="hidden" name="checkout" value="<?php date_default_timezone_set('Asia/Makassar');
                                                                                                    $waktu = date("H:i:s");
                                                                                                    echo $waktu; ?>">
                                                        <input type="hidden" name="id_bukutamu" value="<?= $row['id_bukutamu']; ?>">
                                                        <i class='bx bx-run me-0'></i>
                                                    </button>
                                                </form>


                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-danger" style="font-size: small;">CheckOut</button>
                                            <?php
                                            }


                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Info Tamu -->


            <!-- Start Tabel info rekap -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5>Informasi Keseluruhan Pengunjung PGELHD</h5>
                            <hr>
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>NO. Visitor</th>
                                            <th>No. Telepon</th>
                                            <th>Alamat</th>
                                            <th>Perihal</th>
                                            <th>Orang/Fungsi Yang Dituju</th>
                                            <th>Tanggal</th>
                                            <th>Bulan</th>
                                            <th>Waktu Masuk</th>
                                            <th>Waktu Keluar</th>
                                            <th>Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $semuatamu = mysqli_query($conn, "SELECT * FROM `bukutamu` ORDER BY `id_bukutamu` DESC"); ?>
                                        <?php $nomor = 1; ?>
                                        <?php foreach ($semuatamu as $row) : ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['nik']; ?></td>
                                                <td><?= $row['novisitor']; ?></td>
                                                <td><?= $row['notelp']; ?></td>
                                                <td><?= $row['alamat']; ?></td>
                                                <td><?= $row['tujuan'] ?></td>
                                                <td><?= $row['orang_yang_dituju'] ?></td>
                                                <td><?= $row['tanggal']; ?></td>
                                                <td><?= $row['bulan']; ?></td>
                                                <td><?= $row['Waktu_Masuk']; ?></td>
                                                <td><?= $row['Waktu_Keluar']; ?></td>
                                                <td><img src="../gambar/<?= $row['gambar']; ?>" class="img-responsive img-img-thumbnail" width="100" height="100"></td>
                                            </tr>

                                            <!--Hapus modal -->

                                            <div class="modal fade" id="hapusModal<?= $nomor; ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi hapus data tamu</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>


                                                        <div class="modal-body">
                                                            <div class=""> Yakin untuk menghapus data tamu?</div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="../action/proses.php" method="POST">
                                                                <input type="hidden" value="hapusinfotamu" name="aksi">
                                                                <input type="hidden" value="<?= htmlspecialchars($row['id_bukutamu']); ?>" name="idrr">
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
                </div>
            </div>
            <!-- End tabel info rekap -->

        </div>
    </div>
    <!-- End page wrapper -->








    <?php

    include "foot.php";


    ?>