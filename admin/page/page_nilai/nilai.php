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
function Blank_TextField_Validator()
{
if (text_form.nis.value == "")
{
	alert("Pilih dulu siswa !");
	text_form.nis.focus();
	return (false);
}
if (text_form.nm_materi.value == "")
{
	alert("Pilih dulu materi !");
	text_form.nm_materi.focus();
	return (false);
}
return (true);
}
		</script>
</head>
<body>
<?php
include "../../../config/fungsi_alert.php";
$aksi="page/page_nilai/aksi_nilai.php";

switch($_GET['act']){
	default:
	$offset=$_GET['offset'];
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
$tampil=mysqli_query($db,"SELECT * FROM nilai ORDER BY id");
	$baris=mysqli_num_rows($tampil);
echo "<br>";
if($_SESSION['leveluser']=="admin"){
echo"
		<img src='images/tambahdata.png' width='40' height='40' style='cursor:pointer' title='Tambah Nilai' alt='tambah' onclick=\"window.location.href='?page=nilai&act=tambahnilai';\">
		";
}
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
			<th>NIS Siswa</th>
			<th>Nama Siswa</th>
		
			<th>Nilai</th>";
			if($_SESSION['leveluser']=="admin"){
			echo"
			<th>Aksi</th>";
			}
			echo"
			</tr>";
if($_SESSION['leveluser']=="admin"){
$hasil = mysqli_query($db,"SELECT * FROM nilai ORDER BY id limit $offset,$limit");
}else{
$hasil = mysqli_query($db,"SELECT * FROM nilai where nis='$_SESSION[namauser]'");
}
	$no = 1;
	$no = 1 + $offset;
$warnaGenap = "#B2CCFF";   // warna tua
$warnaGanjil = "#E0EBFF";  // warna muda
$counter = 1;

while($r = mysqli_fetch_array($hasil))
{
	$hasil2 = mysqli_query($db,"SELECT * FROM siswa where nis='".$r['nis']."'");
	$r2 = mysqli_fetch_array($hasil2);
	$hasil3 = mysqli_query($db, "SELECT * FROM materi where nm_materi='".$r['nm_materi']."'");
	$r3 = mysqli_fetch_array($hasil3);
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
	echo "<tr bgcolor='".$warna."'>
		<td align=center>$no</td>
		<td>".$r2['nis']."</td>
		<td>".$r2['nm_siswa']."</td>

		<td>".$r['nilai']."</td>";
		if($_SESSION['leveluser']=="admin"){
		echo"
		<td align='center'><a href=?page=nilai&act=editnilai&id=$r[id]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> &nbsp;
					<a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?page=nilai&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='images/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
		</td>";
		}
		echo"
		</tr>";
$no++;
$counter++;
}
echo "</table>";

echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?page=nilai&offset=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?page=nilai&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?page=nilai&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";

	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;

case "tambahnilai":

	
    echo "<h2>Tambah Data Nilai</h2>
		<form method='POST' action='$aksi?page=nilai&act=input' name=text_form onsubmit='return Blank_TextField_Validator()'>

			<table>
			<tr><td>Siswa</td> <td> : <select name='nis' id='nis'><option value=''>-- Pilih Siswa --</option>";
				$hasil4 = mysqli_query($db, "SELECT * FROM siswa order by nis");
		while($r4=mysqli_fetch_array($hasil4)){
			echo "<option value='$r4[nis]'>$r4[nm_siswa]</option>";
		}
		echo	"</select></td></tr>
			<tr><td>Materi</td> <td> : <select name='nm_materi' id='nm_materi'><option value=''>-- Pilih Materi --</option>";
				$hasil4 = mysqli_query($db, "SELECT * FROM materi order by nm_materi");
		while($r4=mysqli_fetch_array($hasil4)){
			echo "<option value='$r4[nm_materi]'>$r4[nm_materi]</option>";
		}
		echo	"</select></td></tr>
		<tr><td>Nilai</td> <td> : <input type=text name='nilai' id='nilai' size=5 maxlength=3 onkeypress=\"return onlyNumbers();\"></td></tr>
			";
			echo "<tr><td colspan=2><input type=image src=images/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
        </table></form>";
    break;
    
case "editnilai":
    $edit=mysqli_query($db, "SELECT * FROM nilai WHERE id='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Data Nilai</h2>
			<form method=POST action=$aksi?page=nilai&act=update name=text_form onsubmit='return Blank_TextField_Validator()'>
			<input type=hidden name=id value='$r[id]'>
			<table>
			<tr><td>Siswa</td> <td> : <select name='nis' id='nis'><option value=''>-- Pilih Siswa --</option>";
					$hasil4 = mysqli_query($db, "SELECT * FROM siswa order by nis");
		while($r4=mysqli_fetch_array($hasil4)){
			echo "<option value='$r4[nis]'"; if($r['nis']==$r4['nis']) echo "selected";
			echo ">$r4[nm_siswa]</option>";
		}
		echo	"</select></td></tr>
			<tr><td>Materi</td> <td> : <select name='nm_materi' id='nm_materi'><option value=''>-- Pilih Materi --</option>";
				$hasil4 = mysqli_query($db, "SELECT * FROM materi order by nm_materi");
		while($r4=mysqli_fetch_array($hasil4)){
			echo "<option value='$r4[nm_materi]'"; if($r['nm_materi']==$r4['nm_materi']) echo "selected";
			echo ">$r4[nm_materi]</option>";
		}
		echo	"</select></td></tr>
		<tr><td>Nilai</td> <td> : <input type=text name='nilai' id='nilai' size=5 maxlength=3 onkeypress=\"return onlyNumbers();\" value='$r[nilai]'></td></tr>
			";
	echo "<tr><td colspan=2><input type=image src=images/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?page=nilai';\" ></td></tr>
			</table></form>";
    break;

}
?>
</body>
</html>