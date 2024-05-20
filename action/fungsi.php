<?php
require "../include/koneksi.php";

function uploaddatatamu($data)
{
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $nik = htmlspecialchars($data['nik']);
    $notelp = htmlspecialchars($data['notelp']);
    $tujuan = htmlspecialchars($data['tujuan']);
    $orangyangdituju = htmlspecialchars($data['orangyangdituju']);
    $novisitor = htmlspecialchars($data['novisitor']);
    $alamat = htmlspecialchars($data['alamat']);
    $tgl = date('Y-m-d');
    $bln = date('F');
    $waktumasuk = date('H:i:s');
    $gambar = htmlspecialchars($data['gambar']);


    if (!empty($gambar)) {
        $file = explode(',', $gambar);
        $encoded_data = str_replace(' ', '+', $file[1]);
        $decoded_data = base64_decode($encoded_data);
        $filename = uniqid() . '.png';
        file_put_contents('../gambar/' . $filename, $decoded_data);
    };


    $query = "INSERT INTO `bukutamu` (`nama`, `nik`, `alamat`, `notelp`, `novisitor`, `tujuan`, `Waktu_Masuk`, `orang_yang_dituju`, `gambar`, `tanggal`, `bulan`) VALUES ('$nama', '$nik', '$alamat', '$notelp', '$novisitor', '$tujuan', '$waktumasuk','$orangyangdituju','$filename', '$tgl', '$bln')";

    mysqli_query($conn, $query);

    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function fotoktp($data)
{

    $gambar = htmlspecialchars($data['gambar']);

    if (!empty($gambar)) {
        $file = explode(',', $gambar);
        $encoded_data = str_replace(' ', '+', $file[1]);
        $decoded_data = base64_decode($encoded_data);
        $filename = uniqid() . '.png';
        file_put_contents('../gambar/' . $filename, $decoded_data);
    };

    return $filename;
}

function uploadktp($data)
{

    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $nik = htmlspecialchars($data['nik']);
    $notelp = htmlspecialchars($data['notelp']);
    $tujuan = htmlspecialchars($data['tujuan']);
    $novisitor = htmlspecialchars($data['novisitor']);
    $alamat = htmlspecialchars($data['alamat']);
    $tgl = date('Y-m-d');
    $bln = date('F');
    $waktumasuk = date('H:i:s');


    $direktori = "../gambar/";
    $filename = $_FILES['gambar']['name'];
    // $ukurangambar = $_FILES['gambar']['size'];
    // $gambarError = $_FILES['gambar']['error'];
    // $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $filename);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    $namaBaru = uniqid();
    $namaBaru .= '.';
    $namaBaru .= $ekstensiGambar;

    $query = "INSERT INTO `bukutamu`(`nama`, `nik`, `alamat`, `notelp`, `novisitor`, `tujuan`, `gambar`, `tanggal`, `Waktu_Masuk`, `bulan`) VALUES ('$nama','$nik','$alamat','$notelp','$novisitor','$tujuan','$namaBaru','$tgl','$waktumasuk','$bln')";

    mysqli_query($conn, $query);

    move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori . $namaBaru);

    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function potretktp($data)
{

    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $nik = htmlspecialchars($data['nik']);
    $notelp = htmlspecialchars($data['notelp']);
    $tujuan = htmlspecialchars($data['tujuan']);
    $novisitor = htmlspecialchars($data['novisitor']);
    $alamat = htmlspecialchars($data['alamat']);
    $tgl = date('Y-m-d');
    $bln = date('F');
    $waktumasuk = date('H:i:s');


    $direktori = "../gambar/";
    $filename = $_FILES['gambar']['name'];
    // $ukurangambar = $_FILES['gambar']['size'];
    // $gambarError = $_FILES['gambar']['error'];
    // $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $filename);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    $namaBaru = uniqid();
    $namaBaru .= '.';
    $namaBaru .= $ekstensiGambar;

    $query = "INSERT INTO `bukutamu`(`nama`, `nik`, `alamat`, `notelp`, `novisitor`, `tujuan`, `gambar`, `tanggal`, `Waktu_Masuk`, `bulan`) VALUES ('$nama','$nik','$alamat','$notelp','$novisitor','$tujuan','$namaBaru','$tgl','$waktumasuk','$bln')";

    mysqli_query($conn, $query);

    move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori . $namaBaru);

    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}


function checkout($data)
{
    global $conn;
    $id = $data['id_bukutamu'];
    $checkout = $data['checkout'];

    $query = mysqli_query($conn, "UPDATE `bukutamu` SET `Waktu_Keluar` = '$checkout' WHERE `bukutamu`.`id_bukutamu` = '$id'");

    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function reservasitamu($data)
{
    global $conn;
    $nama1 = htmlspecialchars($data['nama1']);
    $tujuan1 = htmlspecialchars($data['tujuan1']);
    $telpntamu = htmlspecialchars($data['notelepontamu']);
    $telpntujuan = htmlspecialchars($data['notelepontujuan']);
    $tanggal1 = htmlspecialchars($data['tanggalbertemu']);
    $waktu1 = htmlspecialchars($data['waktubertemu']) . " WITA";

    $query = mysqli_query($conn, "INSERT INTO `reservasi`(`nama1`, `notelepontamu`, `notelepontujuan`, `tujuan1`,  `tanggal_bertemu`, `waktu_bertemu`) VALUES ('$nama1', '$telpntamu', '$telpntujuan', '$tujuan1','$tanggal1','$waktu1')");
    $queryy = mysqli_query($conn, "SELECT `nowa` FROM `user` WHERE `user`.`role` = 'AdminSecurity'");
    $querynowa = mysqli_fetch_assoc($queryy);

    $pesan = "Hallo Bpk/Ibu Ada Reservasi dari tamu berikut : \n";
    $pesan .= "\n";
    $pesan .= "Nama Tamu : " . $data['nama1'] . "\n";
    $pesan .= "\n";
    $pesan .= "Perihal : " . $data['tujuan1'] . "\n";
    $pesan .= "\n";
    $pesan .= "Tanggal bertemu : " . $data['tanggalbertemu'] . "\n";
    $pesan .= "\n";
    $pesan .= "Waktu bertemu : " . $data['waktubertemu'] . " WITA \n";
    $pesan .= "\n";
    $pesan .= "Jika Ada perubahan tanggal atau waktu bertemu tolong beritahu admin security setempat";
    //wa($telpntujuan, $pesan);

    $pesann = "Hallo Bpk/Ibu reservasi anda telah diteruskan dan tinggal menunggu persetujuan dari admin security setempat.";

    //wa($telpntamu, $pesann);

    $pesannn = "Hallo Bpk/Ibu AdminSecurity ada reservasi yang harus disetujui atau dibatalkan pada ASIKU. \n";

    //wa($querynowa['nowa'], $pesannn);


    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function editreservasi($data)
{
    global $conn;
    $id = htmlspecialchars($data['id']);
    $tglbertemu = htmlspecialchars($data['tanggalbertemu']);
    $waktubertemu = htmlspecialchars($data['waktubertemu']) . " WITA";

    $query = mysqli_query($conn, "UPDATE `reservasi` SET `tanggal_bertemu` = '$tglbertemu', `waktu_bertemu` = '$waktubertemu' WHERE `id_reservasi` = '$id'");

    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function hapusreservasi($data)
{
    global $conn;
    $id = $data['idr'];

    $query = mysqli_query($conn, "DELETE FROM `reservasi` WHERE `reservasi`.`id_reservasi` = '$id'");

    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function terimareservasi($data)
{
    global $conn;
    $id = $data['idr'];

    $query = mysqli_query($conn, "UPDATE `reservasi` SET `status` = 'disetujui' WHERE `reservasi`.`id_reservasi` = '$id'");
    $queryy = mysqli_query($conn, "SELECT `notelepontamu` FROM `reservasi` WHERE `reservasi`.`id_reservasi` = '$id'");
    $queryyy = mysqli_query($conn, "SELECT * FROM `reservasi` WHERE `reservasi`.`id_reservasi` = '$id'");
    $data = mysqli_fetch_assoc($queryyy);
    $nomor = mysqli_fetch_assoc($queryy);

    $pesan = "Hallo Bpk/Ibu reservasi anda diterima oleh admin. \n";
    $pesan .= "\n";
    $pesan .= "Dengan keterangan : \n";
    $pesan .= "\n";
    $pesan .= "Nama : " . $data['nama1'] . "\n";
    $pesan .= "\n";
    $pesan .= "Perihal/tujuan : " . $data['tujuan1'] . "\n";
    $pesan .= "\n";
    $pesan .= "Tanggal : " . $data['tanggal_bertemu'] . "\n";
    $pesan .= "\n";
    $pesan .= "Waktu : " . $data['waktu_bertemu'] . "\n";
    $pesan .= "\n";
    $pesan .= "Datang sesuai waktu reservasi anda.";
    //wa($nomor['notelepontamu'], $pesan);

    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function batalreservasi($data)
{
    global $conn;
    $id = $data['idr'];
    $keterangan = $data['keterangan'];
    $query = mysqli_query($conn, "UPDATE `reservasi` SET `status` = 'dibatalkan', `keterangan` = '$keterangan' WHERE `reservasi`.`id_reservasi` = '$id'");
    $queryy = mysqli_query($conn, "SELECT `notelepontamu` FROM `reservasi` WHERE `reservasi`.`id_reservasi` = '$id'");
    $nomor = mysqli_fetch_assoc($queryy);

    $pesan = "Hallo Bpk/Ibu reservasi anda dibatalkan oleh admin. \n";
    $pesan .= "\n";
    $pesan .= "Dengan keterangan : \n";
    $pesan .= "\n";
    $pesan .= $keterangan;

    //wa($nomor['notelepontamu'], $pesan);
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function tambahakun($data)
{
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $nowa = htmlspecialchars($data['nowa']);
    $role =  htmlspecialchars($data['role']);

    $pesan = "Hallo, berikut adalah informasi akun anda : \n";
    $pesan .= "\n";
    $pesan .= "Nama : " . $data['nama'] . "\n";
    $pesan .= "\n";
    $pesan .= "Username : " . $data['username'] . "\n";
    $pesan .= "\n";
    $pesan .= "Password : " . $data['password'] . "\n";

    $passhash = password_hash($password, PASSWORD_BCRYPT);
    $query = mysqli_query($conn, "INSERT INTO `user` (`nama`, `username`, `password`, `nowa`, `role`) VALUES ('$nama', '$username', '$passhash', '$nowa','$role')");

    //wa($nowa, $pesan);
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function editakun($data)
{
    global $conn;
    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $nowa = htmlspecialchars($data['nowa']);
    $role =  htmlspecialchars($data['role']);

    $pesan = "Hallo, berikut adalah informasi akun anda yang baru : \n";
    $pesan .= "\n";
    $pesan .= "Nama : " . $data['nama'] . "\n";
    $pesan .= "\n";
    $pesan .= "Username : " . $data['username'] . "\n";
    $pesan .= "\n";
    $pesan .= "Password : " . $data['password'] . "\n";

    $passhash = password_hash($password, PASSWORD_BCRYPT);
    $query = mysqli_query($conn, "UPDATE `user` SET `nama` = '$nama', `username` = '$username', `password` = '$passhash', `nowa` = '$nowa',`role` = '$role' WHERE `id_login` = '$id'");

    //wa($nowa, $pesan);
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function hapusakun($data)
{
    global $conn;
    $id = $data['id'];

    $query = mysqli_query($conn, "DELETE FROM `user` WHERE `user`.`id_login` = '$id'");

    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function hapusinfotamu($data)
{
    global $conn;
    $id = $data['idrr'];
    $sql = mysqli_query($conn, "SELECT `gambar` FROM `bukutamu` WHERE `bukutamu`.`id_bukutamu` = '$id'");
    $data = mysqli_fetch_assoc($sql);
    $gambar = "../gambar/" . $data['gambar'];
    if (file_exists($gambar)) {
        unlink($gambar);
    }
    $query = mysqli_query($conn, "DELETE FROM `bukutamu` WHERE `id_bukutamu` = '$id'");
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

// function wa($nomor, $pesan)
// {
//     $nomor_telepon = $nomor;

//     $nomor_telepon = preg_replace('/[^0-9]/', '', $nomor_telepon);

//     $nomor_telepon = preg_replace('/^0/', '62', $nomor_telepon);

//     $url = "https://pekapge.net/wascm.php";

//     $curl = curl_init($url);
//     curl_setopt($curl, CURLOPT_URL, $url);
//     curl_setopt($curl, CURLOPT_POST, true);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//     $headers = array(
//         "Content-Type: application/x-www-form-urlencoded",
//     );
//     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//     $data = "kepada=" . $nomor_telepon . "&pesanku=" . $pesan . "&key=ZZAWICGWsx11h";

//     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//     //for debug only!
//     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//     $resp = curl_exec($curl);
//     curl_close($curl);
//     //var_dump($resp);
// }


function keluar()
{
    unset($_SESSION);
    session_destroy();

    return true;
}
