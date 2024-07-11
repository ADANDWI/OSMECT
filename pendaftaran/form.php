<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$tanggal_pembukaan = '2024-07-19';

$tanggal_saat_ini = 2024-06-13('Y-m-d');

$selisih_hari = (strtotime($tanggal_pembukaan) - strtotime($tanggal_saat_ini)) / (60 * 60 * 24);


if ($selisih_hari < 30) {
    die("Pendaftaran belum dibuka. Pendaftaran dibuka 30 hari sebelum tanggal pembukaan.");
}

$nama = $_POST["nama"];
$kelas = $_POST["kelas"];
$no_wa = $_POST["no_wa"];
$pilihan_divisi = $_POST["pilihan_divisi"];
$pilihan_bph = $_POST["pilihan_bph"];
$pilihan_sekbid = $_POST["pilihan_sekbid"];
$alasan = $_POST["alasan"];
$visi = $_POST["visi"];
$misi = $_POST["misi"];

$foto = $_FILES["foto"];
$foto_name = $foto["name"];
$foto_tmp_name = $foto["tmp_name"];
$foto_error = $foto["error"];
$foto_size = $foto["size"];
$foto_folder = 'upload/';

if ($foto_error === 0) {
    if ($foto_size < 5000000) { 
        $foto_ext = pathinfo($foto_name, PATHINFO_EXTENSION);
        $foto_ext_lc = strtolower($foto_ext);
        $allowed_exts = array("jpg", "jpeg", "png");

        if (in_array($foto_ext_lc, $allowed_exts)) {
            $new_foto_name = uniqid("IMG-", true).'.'.$foto_ext_lc;
            $foto_upload_path = $foto_folder.$new_foto_name;
            if (!move_uploaded_file($foto_tmp_name, $foto_upload_path)) {
                die("Gagal mengunggah file!");
            }
        } else {
            die("Jenis file tidak didukung!");
        }
    } else {
        die("Ukuran file terlalu besar!");
    }
} else {
    die("Ada kesalahan saat mengunggah foto!");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "INSERT INTO osis_form (nama, kelas, no_wa, pilihan_divisi, pilihan_bph, pilihan_sekbid, alasan, visi, misi, foto_path)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $nama, $kelas, $no_wa, $pilihan_divisi, $pilihan_bph, $pilihan_sekbid, $alasan, $visi, $misi, $foto_upload_path);

if ($stmt->execute()) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
