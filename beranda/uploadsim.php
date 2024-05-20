<?php

include "head.php";

?>
<div class="container">
    <a href="pilihsim.php"><button type="button" class="btn btn-secondary px-5 mb-3 mx-auto">Kembali</button></a>
    <div class="row d-flex justify-content-center">
        <div class="mb-1">
            <!-- Scan SIM-->
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-id-card me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">Upload Gambar SIM Anda</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 m-3 ">
                            <div>
                                <Span>Pastikan Gambar SIM Anda :</Span><br>
                                <img src="../assets/images/sim dummy.png" width="200px" height="120px" class="mt-2">
                                <ul class="mt-3">
                                    <li>Pastikan posisi gambar SIM sesuai dengan contoh.</li>
                                    <li>Pastikan gambar jelas dan tidak kabur.</li>
                                    <li>Pastikan pencahayaan pada gambar baik.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <form action="../action/proses.php" method="post">
                                <label class="form-label mt-3">Upload Gambar SIM</label>
                                <input id="imageInput" type="file" accept="image/*" onchange="readURL(this)" class="form-control">
                                <img id="blah" class="mt-2 text-center" src="../assets/images/sim.png" style="max-height: 240px; width:350px;" />
                                <!-- <div class="col text-center mt-4" style="transform: translateY(-15px);">
                                    <input type="hidden" value="sim" name="aksi">
                                    <button type="submit" name="submit" class="btn btn-danger px-5 mb-3">Upload SIM</button>
                                </div> -->
                        </div>
                        <div class="hasilocr col-lg-12">
                            <div class="row text-center">
                                <div class="col-lg-12 col-md-12">
                                    <div id="progress" class="mt-5 text-primary fw-bold fs-4  ">
                                        Progress: 0%
                                    </div>
                                </div>
                            </div>
                            <div id="box" class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="namaInput">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaanInput">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamatInput" placeholder="Alamat..." rows="2"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Tujuan Kedatangan</label>
                                    <textarea class="form-control" id="tujuanInput" placeholder="Tujuan..." rows="2"></textarea>
                                </div>
                                <div class="col-12 d-flex justify-content-center mb-5">
                                    <button type="submit" class="btn btn-success px-5">Upload</button>
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

        prog.innerText = 'Progress: ' + progress + '%';
        if (progress == 100) {
            prog.style.display = "none";
            box.style.display = null;
        } else if (progress != 100) {
            prog.style.display = null;
            box.style.display = "none";
        }


    }

    // Handle image upload
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {

            const reader = new FileReader();
            reader.onload = function(e) {
                const imageDataUrl = e.target.result;


                Jimp.read(imageDataUrl)
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

                            const namaMatch = text.match(/1. ([^\n]+)/);
                            const alamatMatch = text.match(/4. ([^\n]+)/);
                            const pekerjaanMatch = text.match(/5. ([^\n]+)/);

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
                        document.getElementById('namaInput').value = 'Error during OCR process';
                        document.getElementById('alamatInput').value = 'Error during OCR process';
                        document.getElementById('pekerjaanInput').value = 'Error during OCR process';
                    });
            };

            reader.readAsDataURL(file);
        }
    });
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
<?php

include "foot.php";

?>