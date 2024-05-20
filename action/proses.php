<?php
require "fungsi.php";

session_start();

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "checkIn") {
        $berhasil = uploaddatatamu($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Data Berhasil Ditambahkan';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data Gagal Ditambahkan';
        }
        echo "<script>window.location.href='../beranda/inputdata.php';</script>";
    } else if ($_POST['aksi'] == "checkOut") {
        $berhasil = checkout($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Tamu selesai berkunjung';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Kamu Gagal melakukan CheckOut';
        }
        echo "<script>window.location.href='../dashboard/dashboard.php';</script>";
    } else if ($_POST['aksi'] == "reservasi") {
        $berhasil = reservasitamu($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Reservasi Berhasil Disimpan';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Reservasi Gagal Disimpan';
        }
        echo "<script>window.location.href='../index.php';</script>";
    } else if ($_POST['aksi'] == "hapusreservasi") {
        $berhasil = hapusreservasi($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Data Berhasil Dihapus';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data Gagal Dihapus';
        }
        echo "<script>window.location.href='../dashboard/reservasi.php';</script>";
    } else if ($_POST['aksi'] == "tambahakun") {
        $berhasil = tambahakun($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Akun Berhasil Dibuat';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Akun Gagal Dibuat';
        }
        echo "<script>window.location.href='../dashboard/tambahuser.php';</script>";
    } else if ($_POST['aksi'] == "editakun") {
        $berhasil = editakun($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Akun Berhasil Diubah';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Akun Gagal Diubah';
        }
        echo "<script>window.location.href='../dashboard/tambahuser.php';</script>";
    } else if ($_POST['aksi'] == "hapusakun") {
        $berhasil = hapusakun($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Akun Berhasil Dihapus';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Akun Gagal Dihapus';
        }
        echo "<script>window.location.href='../dashboard/tambahuser.php';</script>";
    } else if ($_POST['aksi'] == "hapusinfotamu") {
        $berhasil = hapusinfotamu($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Data Berhasil Dihapus';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data Gagal Dihapus';
        }
        echo "<script>window.location.href='../dashboard/index.php';</script>";
    } else if ($_POST['aksi'] == "disetujui") {
        $berhasil = terimareservasi($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Reservasi Berhasil Disetujui';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Reservasi Gagal Disetujui';
        }
        echo "<script>window.location.href='../dashboard/reservasi.php';</script>";
    } else if ($_POST['aksi'] == "dibatalkan") {
        $berhasil = batalreservasi($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Reservasi Berhasil Ditolak';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Reservasi Gagal Ditolak';
        }
        echo "<script>window.location.href='../dashboard/reservasi.php';</script>";
    } else if ($_POST['aksi'] == "editreservasi") {
        $berhasil = editreservasi($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Reservasi Berhasil Diedit';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Reservasi Gagal Diedit';
        }
        echo "<script>window.location.href='../dashboard/reservasi.php';</script>";
    } else if ($_POST['aksi'] == "fotoktp") {
        $berhasil = fotoktp($_POST);
        if (!empty($berhasil)) {
            $_SESSION['gambar'] = 'berhasil';
            $_SESSION['namagambar'] = $berhasil;
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'KTP gagal dipotret';
        }
        echo "<script>window.location.href='../beranda/potretktp.php';</script>";
    } else if ($_POST['aksi'] == "uploadKtp") {
        $berhasil = uploadktp($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Data Berhasil Diupload';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data Gagal Diupload';
        }
        echo "<script>window.location.href='../beranda/uploadktp.php';</script>";
    } else if ($_POST['aksi'] == "potretKtp") {
        $berhasil = potretktp($_POST);
        if ($berhasil > 0) {
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['pesan'] = 'Data Berhasil Diupload';
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data Gagal Diupload';
        }
        echo "<script>window.location.href='../beranda/potretktp.php';</script>";
    }
}

if ($_GET['aksi'] == "logout") {
    $berhasil = keluar();
    if ($berhasil) {
        echo "<script>window.location.href='../login/index.php';</script>";
    }
}
