<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Registrasi</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="col-md-4 col-md-offset-4 form-login">

        <?php
        require '../config/keneksi1.php';
        /* handle error */
        if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Warning!</strong> <?= base64_decode($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <?php
        // membaca kode barang terbesar
        $query = "SELECT max(nis) as maxKode FROM siswa";
        $hasil = mysqli_query($db, $query);
        $data  = mysqli_fetch_array($hasil);
        $nis = $data['maxKode'];

        // mengambil angka atau bilangan dalam kode anggota terbesar,
        // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
        // misal 'BRG001', akan diambil '001'
        // setelah substring bilangan diambil lantas dicasting menjadi integer
        $noUrut = (int) substr($nis, 3, 3);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $noUrut++;

        // membentuk kode anggota baru
        // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
        // misal sprintf("%03s", 12); maka akan dihasilkan '012'
        // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
        $char = "011";
        $newID = $char . sprintf("%03s", $noUrut);

        ?>

        <div class="outter-form-login">
            <div class="logo-login">
                <em class="glyphicon glyphicon-user"></em>
            </div>
            <form action="send_register.php" class="inner-login" method="post" enctype="multipart/form-data">
                <h3 class="text-center title-login">Registrasi</h3>

                <div class="form-group">
                    <input type="text" class="form-control" readonly="" name="nis" placeholder="Kode daftar" required value="<?php echo $newID; ?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required maxlength=20>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="nm_siswa" placeholder="Nama Lengkap Siswa" maxlength=20>
                </div>

                <div value=class="form-group"> Tanggal Lahir
                    <select type="select" class="form-control" name="tahun" <tr>
                        <td>
                            <option value=''>Tahun</option>
                            <?php for ($y = 2010; $y >= 1970; $y--) { ?>
                                <option value='<?php echo $y ?>'><?php echo $y ?></option>
                            <?php } ?>
                    </select></td>
                    <select type="select" class="form-control" name="bulan" <td>
                        <option value=''>Bulan</option>
                        <?php for ($m = 1; $m <= 12; $m++) { ?>
                            <option value='<?php echo $m ?>'><?php echo $m ?></option>
                        <?php } ?>
                    </select></td>
                    <select type="select" class="form-control" name="tanggal" <td>
                        <option value=''>Tanggal</option>
                        <?php for ($d = 1; $d <= 31; $d++) { ?>
                            <option value='<?php echo $d ?>'><?php echo $d ?></option>
                        <?php } ?>
                    </select></td>
                </div>
                <div class="form-group">
                </div>

                <div class="form-group">
                    <select type="select" class="form-control" name="jk" <tr>
                        <td>
                            <option value=''>Pilih Jenis Kelamin</option>
                            <option value='Laki-Laki'>Laki-Laki</option>
                            <option value='Perempuan'>Perempuan</option>
                    </select>
                    </td>
                    </tr>
                </div>

                <div class="form-group">
                    <input type="textarea" class="form-control" name="alamat" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="asal_sekolah" placeholder="Asal Sekolah">
                </div>



                <div class="form-group">
                    <input type="text" class="form-control" name="no_telp" placeholder="No Telepon" onkeypress="return hanyaAngka(event)" maxlength=12>


                </div>

                <script>
                    function hanyaAngka(evt) {
                        var charCode = (evt.which) ? evt.which : event.keyCode
                        if (charCode > 31 && (charCode < 48 || charCode > 57))

                            return false;
                        return true;
                    }
                </script>

                <div class="form-group">
                    <select type="select" class="form-control" name="jurusan" <tr>
                        <td>
                            <option value=''>Pilih Jurusan</option>
                            <option value='ipa'>IPA</option>
                            <option value='ips'>IPS</option>
                            <option value='bahasa'>Bahasa</option>
                    </select>
                    </td>
                    </tr>
                </div>

                <div class="form-group">
                    <label for=""> Upload Photo</label>
                    <input type="file" name="photo" class="form-control" />
                </div>

                <input type="submit" class="btn btn-block btn-custom-green" value="REGISTER" />
                <a href="/primagama">
                    <input type="cancel" class="btn btn-block btn-custom-green" value="Halaman Utama" /></a>

                <div class="text-center forget">
                    <p><a href="../member/">Halaman Login Siswa</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>