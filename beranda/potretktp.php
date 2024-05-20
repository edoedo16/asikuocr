<?php

include "head.php";

?>
<div class="container">
    <a href="pilihktp.php"><button type="button" class="btn btn-secondary px-5 mb-3 mx-auto">Kembali</button></a>
    <div class="row d-flex justify-content-center">
        <div class="mb-1">
            <!-- Scan KTP-->
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-id-card me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">Ambil Gambar KTP Anda</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 m-3">
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
                            <div>
                                <Span>Pastikan Gambar KTP Anda :</Span><br>
                                <img src="../assets/images/ktp dummy.png" width="200px" height="120px" class="mt-2">
                                <ul class="mt-3">
                                    <li>Pastikan posisi gambar KTP sesuai dengan contoh.</li>
                                    <li>Pastikan gambar jelas dan tidak kabur.</li>
                                    <li>Pastikan pencahayaan pada gambar baik.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 text-center ">
                            <form action="../action/proses.php" method="post">
                                <div class="justify-content-center">
                                    <div class=" card">
                                        <div class="card-body">
                                            <?php

                                            if (empty($_SESSION['gambar'])) {
                                            ?>
                                                <video id="video" width="100%" autoplay="true"></video>
                                                <input type="hidden" id="picture" name="gambar">
                                            <?php
                                            } else {
                                            ?>
                                                <img class="text-center" src="../gambar/<?= $_SESSION['namagambar'] ?>" style="width:100%;" id="hasilKtp" />
                                            <?php
                                            }

                                            ?>


                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-start">
                                    <button onclick="switchCamera()" type="button" class="btn btn-danger "><i class="bx bx-revision"></i></button><span class="m-2" style="color: gray;">Putar Kamera</span>
                                </div>
                                <br>
                                <?php

                                if (empty($_SESSION['gambar'])) {
                                ?>
                                    <div class="text-center">
                                        <input type="hidden" value="fotoktp" name="aksi">
                                        <button onclick="takePicturee()" type="submit" name="submit" class="btn btn-danger px-5 mb-3">Memotret KTP</button>
                                    </div>
                            </form>
                        <?php
                                } else {
                        ?>
                            </form>
                            <div class="text-center">
                                <!-- <input type="hidden" value="checkIn" name="aksi"> -->
                                <button id="prosesOCR" class="btn btn-danger px-5 mb-3" onclick="prosesOCR()">Scan KTP</button>
                            </div>

                        <?php
                                    unset($_SESSION['gambar']);
                                }

                        ?>

                        </div>
                        <div class="hasilocr col-lg-12">
                            <div class="row text-center">
                                <div class="col-lg-12 col-md-12">
                                    <div id="progress" class="mt-3 text-primary fw-bold fs-4 ">
                                        Progress Ekstraksi : 0%
                                    </div>
                                </div>
                            </div>
                            <form action="../action/proses.php">
                                <div id="box" class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="namaInput" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="nikInput" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaanInput" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">No. Telepon/WA</label>
                                        <input type="number" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">No. Visitor</label>
                                        <input type="number" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamatInput" placeholder="Alamat..." rows="2"></textarea required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Tujuan Kedatangan</label>
                                        <textarea class="form-control" id="tujuanInput" placeholder="Tujuan..." rows="2"></textarea required>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mb-5">
                                        <!-- <input type="hidden" value="uploadktp" name="aksi"> -->
                                        <button type="submit" class="btn btn-success px-5">Check In</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- End Pilih Inputan -->




    </div>
</div>
<script src="https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jimp/browser/lib/jimp.min.js"></script>
<script>
    var box = document.getElementById("box");
    var prog = document.getElementById('progress');

    box.style.display = "none";
    prog.style.display = "none";

    function updateProgress(progress) {
        var prog = document.getElementById('progress');
        var box = document.getElementById("box");

        prog.innerText = 'Progress Ekstraksi : ' + progress + '%';
        if (progress == 100) {
            prog.style.display = "none";
            box.style.display = null;
        } else if (progress != 100) {
            prog.style.display = null;
            box.style.display = "none";
        }


    }

    // Handle image upload
    function prosesOCR() {
        //alert('test');
        // if (file) {
        var imageElement = document.getElementById("hasilKtp");

        // imageElement.addEventListener('load', function() {
        var imagePath = imageElement.currentSrc;

        console.log("Path Gambar:", imagePath);

        Jimp.read(imagePath)
            .then(image => {

                image.grayscale();

                return image.getBase64Async(Jimp.AUTO);
            })
            .then(preprocessedImageDataUrl => {

                Tesseract.recognize(
                    preprocessedImageDataUrl,
                    'ind', {
                        logger: m => {
                            if (m.status === 'recognizing text') {

                                updateProgress(Math.round((m.progress * 100)));
                            }
                            console.log(m);
                        }
                    }
                ).then(({
                    data: {
                        text
                    }
                }) => {

                    const nikMatch = text.match(/NIK ([^\n]+)/);
                    const namaMatch = text.match(/Nama ([^\n]+)/);
                    const alamatMatch = text.match(/Alamat ([^\n]+)/);
                    const pekerjaanMatch = text.match(/Pekerjaan ([^\n]+)/);

                    if (nikMatch) {
                        const nik = nikMatch[1].replace(/[^a-zA-Z0-9\s]/g, '');
                        console.log(`Nama: ${nik}`);
                        document.getElementById('nikInput').value = nik;
                    }

                    if (namaMatch) {
                        const nama = namaMatch[1].replace(/[^a-zA-Z0-9\s]/g, '');
                        console.log(`Nama: ${nama}`);
                        document.getElementById('namaInput').value = nama;
                    }

                    if (alamatMatch) {
                        const alamat = alamatMatch[1].replace(/[^a-zA-Z0-9\s]/g, '');
                        console.log(`Alamat: ${alamat}`);
                        document.getElementById('alamatInput').value = alamat;
                    }

                    if (pekerjaanMatch) {
                        const pekerjaan = pekerjaanMatch[1].replace(/[^a-zA-Z0-9\s]/g, '');
                        console.log(`Pekerjaan: ${pekerjaan}`);
                        document.getElementById('pekerjaanInput').value = pekerjaan;
                    }


                    updateProgress(100);
                });
            })
            .catch(err => {
                console.error(err);


                updateProgress(0);
                document.getElementById('nikInput').value = 'Error during OCR process';
                document.getElementById('namaInput').value = 'Error during OCR process';
                document.getElementById('alamatInput').value = 'Error during OCR process';
                document.getElementById('pekerjaanInput').value = 'Error during OCR process';
            });

        //});

        // reader.readAsDataURL(file);
        // }
    };
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script src="../assets/js/cam2.js">
<?php

include "foot.php";

?>