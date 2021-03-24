<?php
session_start();
include "../../../config/keneksi1.php";

$page=$_GET['page'];
$act=$_GET['act'];

// Hapus kelas
if ($page=='kelas' AND $act=='hapus'){
	mysqli_query($db,"DELETE FROM kelas WHERE id='$_GET[id]'");
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Dihapus !');
}

// Input kelas
elseif ($page=='kelas' AND $act=='input'){
	$input=mysqli_query($db,"INSERT INTO kelas(id,
									kd_kelas,
									nm_kelas,
									kd_jurusan) 
							VALUES('',
									'$_POST[kd_kelas]',
									'$_POST[nm_kelas]',
									'$_POST[kd_jurusan]')");
	if($input){
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Disimpan !');
	}
	else {
	header('location:../../main.php?page='.$page.'&pesan=Data Gagal Disimpan !');
	}
}

// Update kelas
elseif ($page=='kelas' AND $act=='update'){

	mysqli_query($db,"UPDATE kelas SET 
									nm_kelas	= '$_POST[nm_kelas]',
									kd_jurusan	= '$_POST[kd_jurusan]'
							WHERE  id       = '$_POST[id]'");
	
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Diubah!');
}

?>
