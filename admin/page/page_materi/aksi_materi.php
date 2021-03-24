<?php
session_start();
include "../../../config/keneksi1.php";

$page=$_GET['page'];
$act=$_GET['act'];

// Hapus materi
if ($page=='materi' AND $act=='hapus'){
	mysqli_query($db,"DELETE FROM materi WHERE id='$_GET[id]'");
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Dihapus!');
}

// Input materi
elseif ($page=='materi' AND $act=='input'){
$tgl = date("Y-m-d");
$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 
if($name1!="")
{
if(move_uploaded_file ($tmppath, '../../../file_materi/'.$name1))
{
	$input=mysqli_query($db,"INSERT INTO materi
							VALUES('',
                                '$_POST[kd_materi]',
								'$_POST[nm_materi]',
								'$tgl',
								'$name1')");
	if($input){
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Disimpan!');
	}
	else {
	header('location:../../main.php?page='.$page.'&pesan=Data Gagal Disimpan!');
	}
}
}else{
	$input=mysqli_query($db,"INSERT INTO materi
							VALUES('',
                                '$_POST[kd_materi]',
								'$_POST[nm_materi]',
								'$tgl',
								'')");
	if($input){
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Disimpan!');
	}
	else {
	header('location:../../main.php?page='.$page.'&pesan=Data Gagal Disimpan!');
	}
}
}

// Update materi
elseif ($page=='materi' AND $act=='update'){
$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 
if($name1!="")
{
if(move_uploaded_file ($tmppath, '../../../file_materi/'.$name1))
{
    mysqli_query($db,"UPDATE materi SET 
									nm_materi  = '$_POST[nm_materi]',
									file	= '$name1'
							WHERE  id       = '$_POST[id]'");
	
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Diubah!');
}
}else{

mysqli_query($db,"UPDATE materi SET 
									nm_materi  = '$_POST[nm_materi]'
							WHERE  id       = '$_POST[id]'");
	
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Diubah!');

}
}

?>
