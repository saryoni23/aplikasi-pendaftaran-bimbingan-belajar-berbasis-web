<?php
session_start();
include "../../../config/keneksi1.php";

$page=$_GET['page'];
$act=$_GET['act'];

// Hapus siswa
if ($page=='siswa' AND $act=='hapus'){
  $edit=mysqli_query($db,"SELECT * FROM siswa WHERE nis='$_GET[nis]'");
    $r=mysqli_fetch_array($edit);
  mysqli_query($db, "DELETE FROM users WHERE username='$r[nis]'");
  mysqli_query($db, "DELETE FROM siswa WHERE nis='$_GET[nis]'");
  header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Dihapus !');
}

// Update siswa
elseif ($page=='siswa' AND $act=='update'){

    mysqli_query($db, "UPDATE siswa SET 
                                  
								  nm_siswa	     = '$_POST[nm_siswa]',
								  tahun	   		   = '$_POST[tahun]',
                  bulan          = '$_POST[bulan]',
                  tanggal        = '$_POST[tanggal]',
								  jk   		       = '$_POST[jk]',
								  alamat   		   = '$_POST[alamat]',
								  asal_sekolah   = '$_POST[asal_sekolah]',
								  no_telp	       = '$_POST[no_telp]',
								  kd_kelas	     = '$_POST[kd_kelas]'
                WHERE  nis       = '$_POST[nis]'");
 
  header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Diubah!');

}

?>