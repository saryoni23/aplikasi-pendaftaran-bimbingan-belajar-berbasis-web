<?php
session_start();
include "../../../config/keneksi1.php";

$page=$_GET['page'];
$act=$_GET['act'];

// Hapus pelajaran
if ($page=='pelajaran' AND $act=='hapus'){
	mysqli_query($db, "DELETE FROM pelajaran WHERE id='$_GET[id]'");
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Dihapus !');
}

// Input pelajaran
elseif ($page=='pelajaran' AND $act=='input'){
	$input=mysqli_query($db, "INSERT INTO pelajaran(id,
									kd_pelajaran,
									nm_pelajaran,
									kd_pengajar) 
							VALUES('',
                                '$_POST[kd_pelajaran]',
								'$_POST[nm_pelajaran]',
								'$_POST[kd_pengajar]')");
	if($input){
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Disimpan !');
	}
	else {
	header('location:../../main.php?page='.$page.'&pesan=Data Gagal Disimpan !');
	}
}

// Update pelajaran
elseif ($page=='pelajaran' AND $act=='update'){

    mysqli_query($db, "UPDATE pelajaran SET 
								kd_pelajaran	= '$_POST[kd_pelajaran]',
								nm_pelajaran	= '$_POST[nm_pelajaran]',
								kd_pengajar	= '$_POST[kd_pengajar]'
							WHERE  id       = '$_POST[id]'");
	
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Diubah!');
}

?>
