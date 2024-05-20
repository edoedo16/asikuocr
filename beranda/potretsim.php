<?php

include "head.php";

?>
<div class="container">
    <a href="pilihsim.php"><button type="button" class="btn btn-secondary px-5 mb-3 mx-auto">Kembali</button></a>
    <div class="row d-flex justify-content-center">
        <div class="mb-1">
            <!-- Scan KTP-->
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-id-card me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">Ambil Gambar SIM Anda</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 text-center ">
                            <form action="../action/proses.php" method="post">
                                <div class="justify-content-center">
                                    <div class=" card">
                                        <div class="card-body">
                                            <video id="video" width="100%" autoplay="true"></video>
                                            <input type="hidden" id="picture" name="gambar">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <button onclick="switchCamera()" type="button" class="btn btn-danger "><i class="bx bx-revision"></i></button><span class="m-2" style="color: gray;">Putar Kamera</span>
                                </div>
                                <br>
                                <div class="text-center">
                                    <input type="hidden" value="checkIn" name="aksi">
                                    <button onclick="takePicturee()" type="submit" name="submit" class="btn btn-danger px-5 mb-3">Memotret SIM</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-7 col-md-12 ">
                            <div>
                                <Span>Pastikan Gambar KTP Anda :</Span><br>
                                <img src="../assets/images/sim dummy.png" width="200px" height="120px" class="mt-2">
                                <ul class="mt-3">
                                    <li>Pastikan posisi gambar SIM sesuai dengan contoh.</li>
                                    <li>Pastikan gambar jelas dan tidak kabur.</li>
                                    <li>Pastikan pencahayaan pada gambar baik.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Pilih Inputan -->




    </div>


</div>

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