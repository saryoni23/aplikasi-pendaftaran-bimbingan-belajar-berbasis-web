<html>
<head>
<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
function Blank_TextField_Validator()
{
if (text_form.kd_pelajaran.value == "")
{
	alert("Kode pelajaran tidak boleh kosong !");
	text_form.kd_pelajaran.focus();
	return (false);
}
if (text_form.nm_pelajaran.value == "")
{
	alert("Nama pelajaran tidak boleh kosong !");
	text_form.nm_pelajaran.focus();
	return (false);
}
if (text_form.kd_pengajar.value == "")
{
	alert("Pilih dulu pengajar !");
	text_form.kd_pengajar.focus();
	return (false);
}
return (true);
}
		</script>
</head>
<body>
<?php
include "../../../config/fungsi_alert.php";
$aksi="page/page_pelajaran/aksi_pelajaran.php";

switch($_GET['act']){
	default:
	$offset=$_GET['offset'];
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
$tampil=mysqli_query($db, "SELECT * FROM pelajaran ORDER BY id");
	$baris=mysqli_num_rows($tampil);
echo "<br>
		<img src='images/tambahdata.png' width='40' height='40' style='cursor:pointer' title='Tambah pelajaran' alt='tambah' onclick=\"window.location.href='?page=pelajaran&act=tambahpelajaran';\">
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
			<th>Kode Pelajaran</th>
			<th>Nama Pelajaran</th>
			<th>Pengajar</th>
			<th>Aksi</th>
			</tr>"; 
$hasil = mysqli_query($db, "SELECT * FROM pelajaran ORDER BY id limit $offset,$limit");
	$no = 1;
	$no = 1 + $offset;
$warnaGenap = "#B2CCFF";   // warna tua
$warnaGanjil = "#E0EBFF";  // warna muda
$counter = 1;

while($r = mysqli_fetch_array($hasil))
{
	$hasil2 = mysqli_query($db, "SELECT * FROM pengajar where kd_pengajar='".$r['kd_pengajar']."'");
	$r2 = mysqli_fetch_array($hasil2);
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
	echo "<tr bgcolor='".$warna."'>
		<td align=center>$no</td>
		<td>".$r['kd_pelajaran']."</td>
		<td>".$r['nm_pelajaran']."</td>
		<td>".$r2['nm_pengajar']."</td>
		<td align='center'><a href=?page=pelajaran&act=editpelajaran&id=$r[id]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> &nbsp;
	            <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?page=pelajaran&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='images/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
		</td>
		</tr>";
$no++;
$counter++;
}
echo "</table>";

echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?page=pelajaran&offset=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?page=pelajaran&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?page=pelajaran&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";

}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;

case "tambahpelajaran":

    echo "<h2>Tambah Data Pelajaran</h2>
		<form method='POST' action='$aksi?page=pelajaran&act=input' name=text_form onsubmit='return Blank_TextField_Validator()'>

		<table>
		<tr><td>Kode Pelajaran</td>     <td> : <input type=text name='kd_pelajaran' id='kd_pelajaran' maxlength=6 size=10 ></td></tr>
		<tr><td>Nama Pelajaran</td> <td> : <input type=text name='nm_pelajaran' id='nm_pelajaran' size=30></td></tr>
		<tr><td>Pengajar</td> <td> : <select name='kd_pengajar' id='kd_pengajar'><option value=''>-- Pilih Pengajar --</option>";
				$hasil4 = mysqli_query($db, "SELECT * FROM pengajar order by kd_pengajar");
		while($r4=mysqli_fetch_array($hasil4)){
			echo "<option value='$r4[kd_pengajar]'>$r4[nm_pengajar]</option>";
		}
		echo	"</select></td></tr>
			";
        echo "<tr><td colspan=2><input type=image src=images/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
        </table></form>";
    break;
    
case "editpelajaran":
    $edit=mysqli_query($db,"SELECT * FROM pelajaran WHERE id='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Data Pelajaran</h2>
			<form method=POST action=$aksi?page=pelajaran&act=update name=text_form onsubmit='return Blank_TextField_Validator()'>
			<input type=hidden name=id value='$r[id]'>
			<table>
			<tr><td>Kode Pelajaran</td>     <td> : <input type=text name='kd_pelajaran' id='kd_pelajaran' maxlength=6 size=10  value='$r[kd_pelajaran]'></td></tr>
			<tr><td>Nama Pelajaran</td> <td> : <input type=text name='nm_pelajaran' id='nm_pelajaran' size=30 value='$r[nm_pelajaran]'></td></tr>
			<tr><td>Pengajar</td> <td> : <select name='kd_pengajar' id='kd_pengajar'>";
				$hasil4 = mysqli_query($db, "SELECT * FROM pengajar order by kd_pengajar");
		while($r4=mysqli_fetch_array($hasil4)){
			echo "<option value='$r4[kd_pengajar]'"; if($r['kd_pengajar']==$r4['kd_pengajar']) echo "selected";
			echo ">$r4[nm_pengajar]</option>";
		}
		echo	"</select></td></tr>
			";
	echo "<tr><td colspan=2><input type=image src=images/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?page=pelajaran';\" ></td></tr>
        </table></form>";
    break;

}
?>
</body>
</html>