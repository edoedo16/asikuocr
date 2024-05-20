<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
    <p class="mb-0">Copyright &copy 2023.</p>
</footer>
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
<script src="../assets/plugins/jquery-knob/excanvas.js"></script>
<script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>
<script src="../assets/plugins/chartjs/Chart.min.js"></script>
<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/js/index.js"></script>
<!--app JS-->
<script src="../assets/js/app.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "sEmptyTable": "Tidads"
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    var dataJSON = '<?php echo $data_json; ?>';

    var data = JSON.parse(dataJSON);

    // var labels = data.map(function(item) {
    //     return item.bulan;
    // });
    // var values = data.map(function(item) {
    //     return item.jumlah;
    // });

    var labels = [];
    var values = [];
    for (var tahun in data) {
        var kunjunganperbulan = data[tahun];


        for (var i = 0; i < kunjunganperbulan.length; i++) {
            var bulan = kunjunganperbulan[i].bulan;
            var jumlah = kunjunganperbulan[i].jumlah;

            labels.push(bulan + ' ' + tahun);
            values.push(jumlah);

        }
    }

    var ctx = document.getElementById('chart0').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Visitor',
                data: values,
                backgroundColor: [
                    '#f73757'
                ],
                lineTension: 0.4,
                borderColor: [
                    '#f73757'
                ],
                borderWidth: 3
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    display: true,
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    $(function() {
        $(".knob").knob();
    });
</script>


</body>

</html>