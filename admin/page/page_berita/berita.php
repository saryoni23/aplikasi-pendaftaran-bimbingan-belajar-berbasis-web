<html>
<head>
<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
		$(function() {
		$( "#tanggal_berita" ).datepicker({
				changeMonth: true,
				changeYear: true,
				maxDate: 0,
				dateFormat: "yy-mm-dd"
			});
		});
function Blank_TextField_Validator()
{
if (text_form.judul_berita.value == "")
{
	alert("Judul Berita tidak boleh kosong !");
	text_form.judul_berita.focus();
	return (false);
}
return (true);
}
		</script>
</head>
<body>
<?php
include "../../../config/fungsi_alert.php";
$aksi="page/page_berita/aksi_berita.php";

switch($_GET['act']){
	default:
	$offset=$_GET['offset'];
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}

$tampil=mysqli_query($db,"SELECT * FROM berita ORDER BY id");

	$baris=mysqli_num_rows($tampil);
echo "<br>
		<img src='images/tambahdata.png' width='40' height='40' style='cursor:pointer' title='Tambah Berita' alt='tambah' onclick=\"window.location.href='?page=berita&act=tambahberita';\">
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


	echo      "<table>
			<tr>
			<th>No</th>
			<th>Judul Berita</th>
			<th>Tanggal Berita</th>
			<th>Aksi</th>
			</tr>";

$hasil = mysqli_query($db,"SELECT * FROM berita ORDER BY id limit $offset,$limit");

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
		<td>".$r['judul_berita']."</td>
		<td>".$r['tanggal_berita']."</td>
		<td align='center'><a href=?page=berita&act=editberita&id=$r[id]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> &nbsp;
					<a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?page=berita&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='images/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
		</td>
		</tr>";
$no++;
$counter++;
}
echo "</table>";

echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?page=berita&offset=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?page=berita&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?page=berita&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";

	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;

case "tambahberita":
	
    echo "<h2>Tambah Berita</h2>
		<form method='POST' action='$aksi?page=berita&act=input' name=text_form onsubmit='return Blank_TextField_Validator()'>

			<table>
			<tr><td>Judul Berita</td>     <td> : <input type=text name='judul_berita' id='judul_berita' size=30></td></tr>
			<tr><td>Tanggal Berita</td> <td> : <input type=text name='tanggal_berita' id='tanggal_berita' size=30></td></tr>
			<tr><td>Isi Berita</td> <td><textarea name='isi_berita' id='isi_berita' rows=5 cols=70></textarea></td></tr>
				";
			echo "<tr><td colspan=2><input type=image src=images/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
								<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?page=berita';\" ></td></tr>
			</table></form>";
		break;
		
	case "editberita":
    $edit=mysqli_query($db,"SELECT * FROM berita WHERE id='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Berita</h2>
			<form method=POST action=$aksi?page=berita&act=update name=text_form onsubmit='return Blank_TextField_Validator()'>
			<input type=hidden name=id value='$r[id]'>
			<table>
			<tr><td>Judul Berita</td>     <td> : <input type=text name='judul_berita' id='judul_berita' size=30 value='$r[judul_berita]'></td></tr>
			<tr><td>Tanggal Berita</td> <td> : <input type=text name='tanggal_berita' id='tanggal_berita' size=30 value='$r[tanggal_berita]'></td></tr>
			<tr><td>Isi Berita</td> <td><textarea name='isi_berita' id='isi_berita' rows=5 cols=70>$r[isi_berita]</textarea></td></tr>
				";
		echo "<tr><td colspan=2><input type=image src=images/update.png name=submit width='40' height='40' title='Update' alt='Update'>
								<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?page=berita';\" ></td></tr>
			</table></form>";
    break;

}
?>
</body>
</html>