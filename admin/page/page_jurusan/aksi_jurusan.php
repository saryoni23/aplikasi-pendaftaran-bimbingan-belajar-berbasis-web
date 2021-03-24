<?php
session_start();
include "../../../config/keneksi1.php";

$page=$_GET['page'];
$act=$_GET['act'];

// Hapus jurusan
if ($page=='jurusan' AND $act=='hapus'){
	mysqli_query($db,"DELETE FROM jurusan WHERE id='$_GET[id]'");
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Dihapus !');
}

// Input jurusan
elseif ($page=='jurusan' AND $act=='input'){
	$input=mysqli_query($db,"INSERT INTO jurusan(id,
									kd_jurusan,
									nm_jurusan) 
							VALUES('',
                                '$_POST[kd_jurusan]',
								'$_POST[nm_jurusan]')");
	if($input){
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Disimpan !');
	}
	else {
	header('location:../../main.php?page='.$page.'&pesan=Data Gagal Disimpan !');
	}
}

// Update jurusan
elseif ($page=='jurusan' AND $act=='update'){

		mysqli_query($db,"UPDATE jurusan SET nm_jurusan	= '$_POST[nm_jurusan]'
							WHERE  id       = '$_POST[id]'");
	
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Diubah!');
}

?>
