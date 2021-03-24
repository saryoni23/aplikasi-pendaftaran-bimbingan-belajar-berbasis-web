<?php

// memasukan file koneksi ke database
require '../config/keneksi1.php';
// menyimpan variable yang dikirim Form
// $kd_daftar      = $_POST['kd_daftar'];
$nis            = $_POST['nis'];
$nm_siswa       = $_POST['nm_siswa'];
$tanggal        = $_POST['tanggal'];
$bulan          = $_POST['bulan'];
$tahun          = $_POST['tahun'];
$jk             = $_POST['jk'];
$alamat         = $_POST['alamat'];
$asal_sekolah   = $_POST['asal_sekolah'];
$no_telp        = $_POST['no_telp'];
$jurusan        = $_POST['jurusan'];

$password       = $_POST['password'];
$photoUri       = '';
$id_user        = '';
//opsinal {boleh pakai foto | boleh tidak}
$photo = $_FILES['photo'];
if ($photo['error'] == 0) { //jika tidak ada eroor
    //batasi jenis file gambar {jpg|png}
    $fileType = pathinfo($photo['name'], PATHINFO_EXTENSION);

    if ($fileType == 'jpg' || $fileType == 'png') {
        $namaBaru = md5(uniqid()) . '.' . $fileType;
        move_uploaded_file($photo['tmp_name'], './uploads/' . $namaBaru);
        $photoUri = 'uploads/' . $namaBaru;
    }
}

// cek nilai variable

if (empty($password)) {
    header('location: ./register.php?error=' . base64_encode('Password tidak boleh kosong'));
}
if (empty($nm_siswa)) {
    header('location: ./register.php?error=' . base64_encode('Nama Siswa tidak boleh kosong'));
}
if (empty($jk)) {
    header('location: ./register.php?error=' . base64_encode('Jenis kelamin tidak boleh kosong'));
}
if (empty($alamat)) {
    header('location: ./register.php?error=' . base64_encode('Alamat tidak boleh kosong'));
}
if (empty($asal_sekolah)) {
    header('location: ./register.php?error=' . base64_encode('Asal Sekolah tidak boleh kosong'));
}
if (empty($no_telp)) {
    header('location: ./register.php?error=' . base64_encode('No Telepon tidak boleh kosong'));
}
// SQL Insert

$input = mysqli_query($db, "INSERT INTO siswa(id,
                                     nis,
                                     nm_siswa,
                                     tahun,
                                     bulan,
                                     tanggal,
                                     jk,
                                     alamat,
                                     asal_sekolah,
                                     no_telp,
                                     jurusan,
                                     photo                                     
                                    ) 
                               VALUES(
                                    '',
                                    '$nis',
                                    '$nm_siswa',
                                    '$tahun',
                                    '$bulan',
                                    '$tanggal',
                                    '$jk',
                                    '$alamat',
                                    '$asal_sekolah',
                                    '$no_telp',
                                    '$jurusan',
                                    '$photoUri'
                                    )");
mysqli_query($db, "INSERT INTO users(id,
                                     username,
                                     password,
                                     level) 
                               VALUES('$id_user',
                                    '$nis',
                                    '$password',
                                    'member')");
if ($input) {
    echo "<script>alert('Insert Data Berhasil'); window.location.href = './register.php';</script>";
} else {
    echo "<script>alert('Gagal Membuat User'); window.location.href = './register.php';</script>";
}
