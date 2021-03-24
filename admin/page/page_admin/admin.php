<html>
<head>
<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
		function ValidateAlpha()
		{
		var keyCode = window.event.keyCode;
		if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
		{
		window.event.returnValue = false;
		//alert("Enter only letters");
		}
		}
function Blank_TextField_Validator()
{
if (text_form.username.value == "")
{
   alert("Username tidak boleh kosong !");
   text_form.username.focus();
   return (false);
}
if (text_form.level.value == "")
{
   alert("Level tidak boleh kosong !");
   text_form.level.focus();
   return (false);
}
return (true);
}
		</script>
</head>
<body>
<?php
include "../../../config/fungsi_alert.php";
$aksi="page/page_admin/aksi_admin.php";

switch($_GET['act']){
  default:
  $offset=$_GET['offset'];
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
$tampil=mysqli_query($db,"SELECT * FROM users  ORDER BY username");
	$baris=mysqli_num_rows($tampil);

		
			if(isset($_GET['pesan'])){
		echo "
		<div class=\"ui-widget\">
			<div class=\"ui-state-highlight ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\">
				<span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span>
				<strong>".$_GET['pesan']."</strong>
			</div>
		</div><br>";
	}
	
	if($baris>0){


echo      "<table>
		<tr>
		<th>No</th>
		<th>Username</th>
		<th>Level</th>
		<th>Aksi</th>
		</tr>"; 
$hasil = mysqli_query($db,"SELECT * FROM users  ORDER BY id limit $offset,$limit");
	$no = 1;
	$no = 1 + $offset;
$warnaGenap = "#B2CCFF";   // warna tua
$warnaGanjil = "#E0EBFF";  // warna muda
$counter = 1;

while($r = mysqli_fetch_array($hasil))
{
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
	echo "<tr bgcolor='".$warna."'>
		<td align=center>$no</td>
		<td>".$r['username']."</td>
		<td>".$r['level']."</td>
		<td align='center'><a href=?page=admin&act=edituser&id=$r[id]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> &nbsp;
	        <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?page=admin&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='images/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
		</td>
		</tr>";
$no++;
$counter++;
}
echo "</table>";

echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?page=admin&offset=$prevoffset>Back</a></span>";
	}
	else {
		echo "<span class=disabled>Back</span>";//cetak halaman tanpa link
	}
	//hitung jumlah halaman
	$halaman = intval($baris/$limit);//Pembulatan

	if ($baris%$limit){
		$halaman++;
	}
	for($i=1;$i<=$halaman;$i++){
		$newoffset = $limit * ($i-1);
		if($offset!=$newoffset){
			echo "<a href=$PHP_SELF?page=admin&offset=$newoffset>$i</a>";
			//cetak halaman
		}
		else {
			echo "<span class=current>".$i."</span>";//cetak halaman tanpa link
		}
	}

	//cek halaman akhir
	if(!(($offset/$limit)+1==$halaman) && $halaman !=1){

		//jika bukan halaman terakhir maka berikan next
		$newoffset = $offset + $limit;
		echo "<span class=prevnext><a href=$PHP_SELF?page=admin&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";

   }else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;


  case "edituser":
    $edit=mysqli_query($db,"SELECT * FROM users WHERE id='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Data User</h2>
          <form method=POST action=$aksi?page=admin&act=update name=text_form onsubmit='return Blank_TextField_Validator()'>
          <input type=hidden name=id value='$r[id]'>
          <table>
           <tr><td>Username</td>     <td> : <input type=text name='username' id='username' maxlength=20 size=30 value='$r[username]'></td></tr>
			";

	echo "<tr><td colspan=2><input type=image src=images/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?page=admin';\" ></td></tr>
          </table></form>";
    break;

}
?>
</body>
</html>