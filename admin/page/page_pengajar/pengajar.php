<html>
<head>
<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
		function onlyNumbers(evt)
		{
			var e = event || evt;
			var charCode = e.which || e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
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
if (text_form.nm_pengajar.value == "")
{
	alert("Nama pengajar tidak boleh kosong !");
	text_form.nm_pengajar.focus();
	return (false);
}
return (true);
}
</script>
</head>
<body>
<?php
include "../../../config/fungsi_alert.php";
$aksi="page/page_pengajar/aksi_pengajar.php";

switch($_GET['act']){
	default:
	$offset=$_GET['offset'];
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
$tampil=mysqli_query($db, "SELECT * FROM pengajar ORDER BY id");
	$baris=mysqli_num_rows($tampil);
echo "<br>
		<img src='images/tambahuser.png' width='40' height='40' style='cursor:pointer' title='Tambah Pengajar' alt='tambah' onclick=\"window.location.href='?page=pengajar&act=tambahpengajar';\">
		";
		
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


echo      	"<table>
			<tr>
			<th>No</th>
			<th>Kode Pengajar</th>
			<th>Nama Pengajar</th>
			<th>Alamat</th>
			<th>No Telepon</th>
			<th>Aksi</th>
			</tr>"; 
$hasil = mysqli_query($db, "SELECT * FROM pengajar ORDER BY id limit $offset,$limit");
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
		<td align=center>".$r['kd_pengajar']."</td>
		<td>".$r['nm_pengajar']."</td>
		<td>".$r['alamat']."</td>
		<td align=center>".$r['no_telp']."</td>
		<td align='center'><a href=?page=pengajar&act=editpengajar&id=$r[id]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> &nbsp;
	    	<a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?page=pengajar&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='images/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
		</td>
		</tr>";
$no++;
$counter++;
}
echo "</table>";

echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?page=pengajar&offset=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?page=pengajar&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?page=pengajar&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";

	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;

case "tambahpengajar":
$ceknomor=mysqli_fetch_array(mysqli_query($db, "SELECT kd_pengajar FROM pengajar ORDER BY kd_pengajar DESC LIMIT 1"));
	$cekQ=$ceknomor['kd_pengajar'];
	$awalQ=substr($cekQ,2-3);
	$next=$awalQ+1;
	$jnim=strlen($next);

	if($jnim==1)
	{ $no='P0'; }
	elseif($jnim==2)
	{ $no='P'; }
	$idpr=$no.$next;
	
    echo "<h2>Tambah Data Pengajar</h2>
		<form method='POST' action='$aksi?page=pengajar&act=input' name=text_form onsubmit='return Blank_TextField_Validator()' >
			<table>
			<tr><td>Kode Pengajar</td>     <td> : <input type=text name='kd_pengajar' id='kd_pengajar' size=5  readonly value='$idpr' ></td></tr>
			<tr><td>Nama Pengajar</td> <td> : <input type=text name='nm_pengajar' id='nm_pengajar' size=30 onkeypress=\"ValidateAlpha();\"></td></tr>
			<tr><td>Alamat</td> <td> : <input type=text name='alamat' id='alamat' size=30 ></td></tr>
			<tr><td>No Telepon</td> <td> : <input type=text name='no_telp' id='no_telp' size=30 maxlength=12 onkeypress=\"return onlyNumbers();\"></td></tr>
			";
			echo "<tr><td colspan=2><input type=image src=images/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
			</table></form>";
    break;
    
case "editpengajar":
    $edit=mysqli_query($db, "SELECT * FROM pengajar WHERE id='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Data pengajar</h2>
		<form method=POST action=$aksi?page=pengajar&act=update name=text_form onsubmit='return Blank_TextField_Validator()' >
		<input type=hidden name=id value='$r[id]'>
		<table>
		<tr><td>Kode Pengajar</td> <td> : <input type=text name='kd_pengajar' id='kd_pengajar' size=5  value='$r[kd_pengajar]' readonly></td></tr>
		<tr><td>Nama Pengajar</td> <td> : <input type=text name='nm_pengajar' id='nm_pengajar' size=30 onkeypress=\"ValidateAlpha();\" value='$r[nm_pengajar]'></td></tr>
			<tr><td>Alamat</td> <td> : <input type=text name='alamat' id='alamat' size=30 value='$r[alamat]'></td></tr>
			<tr><td>No Telepon</td> <td> : <input type=text name='no_telp' id='no_telp' size=30 maxlength=12 value='$r[no_telp]' onkeypress=\"return onlyNumbers();\"></td></tr>
			";
	echo "<tr><td colspan=2><input type=image src=images/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?page=pengajar';\" ></td></tr>
		</table></form>";
    break;

}
?>
</body>
</html>