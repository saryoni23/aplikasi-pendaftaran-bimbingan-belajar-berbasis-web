<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../config/keneksi1.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db, "select * from users where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:halaman_admin.php");

        // cek jika user login sebagai pegawai
    } else if ($data['level'] == "member") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "member";
        // alihkan ke halaman dashboard pegawai
        header("location:member/index.php");

        // cek jika user login sebagai pengurus
    } else if ($data['level'] == "pengurus") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "pengurus";
        // alihkan ke halaman dashboard pengurus
        header("location:halaman_pengurus.php");
    } else {

        // alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
