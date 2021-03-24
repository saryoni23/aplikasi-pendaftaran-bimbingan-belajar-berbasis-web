<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Siswa</title>

    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="col-md-4 col-md-offset-4 form-login">
        <div class="outter-form-login">
            <div class="logo-login">
                <em class="glyphicon glyphicon-user"></em>
            </div>

            <h3 class="text-center title-login">
                <?php session_start(); ?>
                SELAMANT DATANG
                <?php echo $_SESSION['username']; ?>
            </h3>
            <div class="form-group">
                <p align="center"><b>Aplikasi Pusat Bimbingan Belajar PRIMAGAMA </b><br /><br />
                </p>
            </div>
            <a href="materi.php">
                <input type="button" class="btn btn-block btn-custom-green" value="Materi" />

                <a href="nilai.php">
                    <input type="button" class="btn btn-block btn-custom-green" value="Nilai" />

                    <a href="../logout.php"><input type="cancel" class="btn btn-block btn-custom-green" value="Logout" /></a>
                    </form>
        </div>
    </div>

    <!-- <script src="assets/js/jquery.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>