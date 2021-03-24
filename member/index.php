<?php
session_start();

//mengecek user sudah login atau tidak
if ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != '' ) {
    $halaman = $_SESSION['user_login'];
    //jika sudah 
    header('location:on-'. $halaman);
    exit();
} else {
	//jika belum maka akan di bawa ke halaman login
    header('location:login.php');
    exit();
}