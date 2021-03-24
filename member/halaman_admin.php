<?php
require 'template/header.php' ?>
<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=gagal");
}

?>

<body align="center">
    <h1>Selamat Datang</h1>
        <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
        <p>Tetapi ini Bukan Halaman Admin</p>

        <a class="btn btn-block btn-custom-green" href="logout.php">Logout</a>

</body>


<?php require 'template/footer.php' ?>