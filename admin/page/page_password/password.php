<?php
switch($_GET['act']){
default:
echo "<h2>Ubah Password $_SESSION[namauser]</h2>
		<form method='post' action='?page=password&act=updatepassword'>
		<table>
		<tr><td>Masukkan password lama</td><td><input type='password' name='oldPass' /></td></tr>
		<tr><td>Masukkan password baru</td><td><input type='password' name='newPass1' /></td></tr>
		<tr><td>Masukkan kembali password baru</td><td><input type='password' name='newPass2' /></td></tr>
		<tr><td></td><td>
		<input type=image src=images/save.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
		<input type='hidden' name='pass' value='".$_SESSION['passuser']."'>
		<input type='hidden' name='nama' value='".$_SESSION['namauser']."'></td></tr>
		</table>		
		</form>";
break;

case "updatepassword":


$pengacak = $_POST['pass'];
include "../../../config/keneksi1.php";

$user = $_POST['nama'];
$passwordlama = $_POST['oldPass'];
$passwordbaru1 = $_POST['newPass1'];
$passwordbaru2 = $_POST['newPass2'];

$query = "SELECT * FROM users WHERE username = '$user'";
$hasil = mysqli_query($db, $query);
$data  = mysqli_fetch_array($hasil);

//if ($data['password'] ==  md5($passwordlama))
if ($data['password'] ==  $passwordlama)
{
	if ($passwordbaru1 == $passwordbaru2)
	{
		//$passwordbaruenkrip = md5($passwordbaru1);
		$passwordbaruenkrip = $passwordbaru1;
		$query = "UPDATE users SET password = '$passwordbaruenkrip' WHERE username = '$user' ";
		$hasil = mysqli_query($db, $query);
		
		if ($hasil) echo "<br>Ubah password sukses !";
	}
	else echo "<br>Password baru Anda tidak sama !";
}
else echo "<br>Password lama Anda salah !";
break;
}
?>