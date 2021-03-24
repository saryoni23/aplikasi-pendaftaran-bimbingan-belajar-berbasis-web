<?php
include "../config/keneksi1.php";

$username = $_POST['username'];
$pass     = $_POST['password'];
//$pass     = anti_injection(md5($_POST['password']));

$login = mysqli_query($db,"SELECT * FROM users WHERE username='$username' AND password='$pass'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

if ($ketemu > 0) {
  session_start();

  $_SESSION['namauser']     = $r['username'];
  $_SESSION['passuser']     = $r['password'];
  $_SESSION['leveluser']    = $r['level'];

  header('location:main.php?page=home');
} else {
  include "error-login.php";
}
?>