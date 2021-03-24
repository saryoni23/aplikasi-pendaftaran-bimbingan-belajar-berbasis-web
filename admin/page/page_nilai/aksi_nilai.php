<?php
session_start();
include "../../../config/keneksi1.php";

$page=$_GET['page'];
$act=$_GET['act'];

// Hapus nilai
if ($page=='nilai' AND $act=='hapus'){
	mysqli_query($db,"DELETE FROM nilai WHERE id='$_GET[id]'");
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Dihapus !');
}

// Input nilai
elseif ($page=='nilai' AND $act=='input'){
	$input=mysqli_query($db,"INSERT INTO nilai(id,
									nis,
									nm_materi,
									nilai) 
							VALUES('',
                                '$_POST[nis]',
								'$_POST[nm_materi]',
								'$_POST[nilai]')");
	if($input){
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Disimpan !');
	}
	else {
	header('location:../../main.php?page='.$page.'&pesan=Data Gagal Disimpan !');
	}
}

// Update nilai
elseif ($page=='nilai' AND $act=='update'){

    mysqli_query($db,"UPDATE nilai SET 
									nis	= '$_POST[nis]',
									nm_materi	= '$_POST[nm_materi]',
									nilai	= '$_POST[nilai]'
							WHERE  id       = '$_POST[id]'");
	
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Diubah!');
}

?>
