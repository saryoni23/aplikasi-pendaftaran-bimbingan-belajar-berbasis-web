<?php
session_start();
include "../../../config/keneksi1.php";

$page=$_GET['page'];
$act=$_GET['act'];

// Hapus admin
if ($page=='admin' AND $act=='hapus'){
  mysqli_query($db,"DELETE FROM users WHERE id='$_GET[id]'");
  header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Dihapus !');
}

// Input admin
elseif ($page=='admin' AND $act=='input'){
$pass = $_POST['password'];
  $input=mysqli_query($db,"INSERT INTO users(id,
                                 username,
								 password,
								 level) 
	                       VALUES('',
                                '$_POST[username]',
								'$pass',
								'admin')");
	if($input){
	header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Disimpan !');
	}
	else {
	//echo mysql_error();
	header('location:../../main.php?page='.$page.'&pesan=Data Gagal Disimpan !');
	}
}

// Update admin
elseif ($page=='admin' AND $act=='update'){

    mysqli_query($db,"UPDATE users SET 
                                  username  = '$_POST[username]'
                           WHERE  id       = '$_POST[id]'");
 
  header('location:../../main.php?page='.$page.'&pesan=Data Berhasil Diubah !');
}

?>
