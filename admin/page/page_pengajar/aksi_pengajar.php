<?php
session_start();
include "../../../config/keneksi1.php";

$page=$_GET['page'];
$act=$_GET['act'];

// Hapus pengajar
if ($page=='pengajar' AND $act=='hapus'){
	mysqli_query($db, "DELETE FROM pengajar WHERE id='$_GET[id]'");
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Dihapus !');
}

// Input pengajar
elseif ($page=='pengajar' AND $act=='input'){

$input=mysqli_query($db, "INSERT INTO pengajar(id,
								kd_pengajar,
								nm_pengajar,
								alamat,
								no_telp) 
						VALUES('',
                                '$_POST[kd_pengajar]',
								'$_POST[nm_pengajar]',
								'$_POST[alamat]',
								'$_POST[no_telp]')");
	if($input){
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Disimpan !');
	}
	else {
	header('location:../../main.php?page='.$page.'&pesan=Data Gagal Disimpan !');
	}
}

// Update pengajar
elseif ($page=='pengajar' AND $act=='update'){

mysqli_query($db, "UPDATE 		pengajar SET 
								kd_pengajar  = '$_POST[kd_pengajar]',
								nm_pengajar	= '$_POST[nm_pengajar]',
								alamat   		= '$_POST[alamat]',
								no_telp	= '$_POST[no_telp]'
						WHERE  id       = '$_POST[id]'");

header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Diubah!');

}

?>