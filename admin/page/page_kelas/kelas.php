<html>
<head>
<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
function Blank_TextField_Validator()
{
if (text_form.nm_kelas.value == "")
{
	alert("Nama kelas tidak boleh kosong !");
	text_form.nm_kelas.focus();
	return (false);
}
if (text_form.kd_jurusan.value == "")
{
	alert("Pilih dulu jurusan !");
	text_form.kd_jurusan.focus();
	return (false);
}
return (true);
}
		</script>
</head>
<body>
<?php
include "../config/fungsi_alert.php";
$aksi="page/page_kelas/aksi_kelas.php";

switch($_GET['act']){
	default:
	$offset=$_GET['offset'];
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
$tampil=mysqli_query($db,"SELECT * FROM kelas ORDER BY id");
	$baris=mysqli_num_rows($tampil);
echo "<br>
		<img src='images/tambahdata.png' width='40' height='40' style='cursor:pointer' title='Tambah kelas' alt='tambah' onclick=\"window.location.href='?page=kelas&act=tambahkelas';\">
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
			<th>Kode Kelas</th>
			<th>Nama Kelas</th>
			<th>Jurusan</th>
			<th>Aksi</th>
			</tr>"; 
$hasil = mysqli_query($db,"SELECT * FROM kelas ORDER BY id limit $offset,$limit");
	$no = 1;
	$no = 1 + $offset;
$warnaGenap = "#B2CCFF";   // warna tua
$warnaGanjil = "#E0EBFF";  // warna muda
$counter = 1;

while($r = mysqli_fetch_array($hasil))
{
	$hasil2 = mysqli_query($db,"SELECT * FROM jurusan where kd_jurusan='".$r['kd_jurusan']."'");
	$r2 = mysqli_fetch_array($hasil2);
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
	echo "<tr bgcolor='".$warna."'>
		<td align=center>$no</td>
		<td>".$r['kd_kelas']."</td>
		<td>".$r['nm_kelas']."</td>
		<td>".$r2['nm_jurusan']."</td>
		<td align='center'><a href=?page=kelas&act=editkelas&id=$r[id]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> &nbsp;
	            <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?page=kelas&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='images/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
		</td>
		</tr>";
$no++;
$counter++;
}
echo "</table>";

echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?page=kelas&offset=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?page=kelas&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?page=kelas&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";

	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;

case "tambahkelas":
	$ceknomor=mysqli_fetch_array(mysqli_query($db,"SELECT kd_kelas FROM kelas ORDER BY kd_kelas DESC LIMIT 1"));
	$cekQ=$ceknomor['kd_kelas'];
	$awalQ=substr($cekQ,2-3);
	$next=$awalQ+1;
	$jnim=strlen($next);

	if($jnim==1)
	{ $no='K0'; }
	elseif($jnim==2)
	{ $no='K'; }
	$idpr=$no.$next;
	
    echo "<h2>Tambah Data Kelas</h2>
		<form method='POST' action='$aksi?page=kelas&act=input' name=text_form onsubmit='return Blank_TextField_Validator()'>

			<table>
			<tr><td>Kode Kelas</td>     <td> : <input type=text name='kd_kelas' id='kd_kelas' maxlength=5 size=5 readonly value='$idpr'></td></tr>
			<tr><td>Nama Kelas</td> <td> : <input type=text name='nm_kelas' id='nm_kelas' size=30></td></tr>
			<tr><td>Jurusan</td> <td> : <select name='kd_jurusan' id='kd_jurusan'><option value=''>-- Pilih Jurusan --</option>";
				$hasil4 = mysqli_query($db,"SELECT * FROM jurusan order by kd_jurusan");
		while($r4=mysqli_fetch_array($hasil4)){
			echo "<option value='$r4[kd_jurusan]'>$r4[nm_jurusan]</option>";
		}
		echo	"</select></td></tr>
			";
        echo "<tr><td colspan=2><input type=image src=images/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
        </table></form>";
    break;
    
case "editkelas":
    $edit=mysqli_query($db,"SELECT * FROM kelas WHERE id='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Data Kelas</h2>
			<form method=POST action=$aksi?page=kelas&act=update name=text_form onsubmit='return Blank_TextField_Validator()'>
			<input type=hidden name=id value='$r[id]'>
			<table>
			<tr><td>Kode Kelas</td>     <td> : <input type=text name='kd_kelas' id='kd_kelas' maxlength=5 size=5 readonly value='$r[kd_kelas]'></td></tr>
			<tr><td>Nama Kelas</td> <td> : <input type=text name='nm_kelas' id='nm_kelas' size=30 value='$r[nm_kelas]'></td></tr>
			<tr><td>Jurusan</td> <td> : <select name='kd_jurusan' id='kd_jurusan'>";
				$hasil4 = mysqli_query($db,"SELECT * FROM jurusan order by kd_jurusan");
		while($r4=mysqli_fetch_array($hasil4)){
			echo "<option value='$r4[kd_jurusan]'"; if($r['kd_jurusan']==$r4['kd_jurusan']) echo "selected";
			echo ">$r4[nm_jurusan]</option>";
		}
		echo	"</select></td></tr>
			";
	echo "<tr><td colspan=2><input type=image src=images/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?page=kelas';\" ></td></tr>
        </table></form>";
    break;

}
?>
</body>
</html>