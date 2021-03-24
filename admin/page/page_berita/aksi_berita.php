<?php
session_start();
include "../../../config/keneksi1.php";

$page=$_GET['page'];
$act=$_GET['act'];

// Hapus berita
if ($page=='berita' AND $act=='hapus'){
	mysqli_query($db,"DELETE FROM berita WHERE id='$_GET[id]'");
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Dihapus !');
}

// Input berita
elseif ($page=='berita' AND $act=='input'){
	$input=mysqli_query($db,"INSERT INTO berita(id,
									judul_berita,
									tanggal_berita,
									isi_berita) 
							VALUES('',
									'$_POST[judul_berita]',
									'$_POST[tanggal_berita]',
									'$_POST[isi_berita]')");
	if($input){
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Disimpan !');
	}
	else {
	header('location:../../main.php?page='.$page.'&pesan=Data Gagal Disimpan !');
	}
}

// Update berita
elseif ($page=='berita' AND $act=='update'){

    mysqli_query($db,"UPDATE berita SET 
									judul_berita  = '$_POST[judul_berita]',
									tanggal_berita  = '$_POST[tanggal_berita]',
									isi_berita  = '$_POST[isi_berita]'
							WHERE  id       = '$_POST[id]'");
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Diubah !');
}

?>
