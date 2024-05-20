<?php

include "../include/koneksi.php";
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` ='$user'");

$selek = mysqli_fetch_assoc($query);
$row = mysqli_num_rows($query);

if ($row >= 1) {
    $passs = $selek['password'];
    if (password_verify($pass, $passs)) {

        if ($selek["role"] == "ICT") {
            $_SESSION['status'] = "Sukses";
            $_SESSION['nama'] = $selek['nama'];
            $_SESSION['role'] = $selek['role'];
            header("location: ../dashboard/");
        } else if ($selek["role"] == "Security") {
            $_SESSION['status'] = "Sukses";
            $_SESSION['nama'] = $selek['nama'];
            $_SESSION['role'] = $selek['role'];
            header("location:../dashboard/dashboardsecurity.php");
        } else if ($selek['role'] == "AdminSecurity") {
            $_SESSION['status'] = "Sukses";
            $_SESSION['nama'] = $selek['nama'];
            $_SESSION['role'] = $selek['role'];
            header("location:../dashboard/");
        }
    } else {
        $_SESSION['status'] = "Gagal";


        echo "
        <script>
            window.location.href='index.php';
        </script>";
    }
} else {

    $_SESSION['status'] = "Gagal";


    echo "
    <script>
        window.location.href='index.php';
    </script>";
}
