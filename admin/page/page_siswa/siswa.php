<html>

<head>
	<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/style1.css">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$("#tanggal_lahir").datepicker({
				changeMonth: true,
				changeYear: true,
				maxDate: '0',
				dateFormat: "yy-mm-dd"
			});
		});

		function onlyNumbers(evt) {
			var e = event || evt;
			var charCode = e.which || e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}

		function ValidateAlpha() {
			var keyCode = window.event.keyCode;
			if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32) {
				window.event.returnValue = false;
				//alert("Enter only letters");
			}
		}

		function Blank_TextField_Validator() {
			if (text_form.nis.value == "") {
				alert("berhasil di ubah !");
				text_form.nis.focus();
				return (false);
			}
			return (true);
		}
	</script>

</head>

<body>
	<?php
	include "../../../config/fungsi_alert.php";
	$aksi = "page/page_siswa/aksi_siswa.php";

	switch ($_GET['act']) {
		default:
			$offset = $_GET['offset'];
			$limit = 10;
			if (empty($offset)) {
				$offset = 0;
			}
			$tampil = mysqli_query($db, "SELECT * FROM siswa ORDER BY nis");
			$baris = mysqli_num_rows($tampil);
			echo "<br>
	
		";

			if (isset($_GET['pesan'])) {
				echo "
		<div class=\"ui-widget\">
			<div class=\"ui-state-highlight ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\">
				<span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span>
				<strong>" . $_GET['pesan'] . "</strong>
			</div>
		</div><br>";
			}

			if ($baris > 0) {


				echo      "<table>
		<tr>
		<th>No</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Tgl Lahir </th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>Asal Sekolah</th>
		<th>No Telepon</th>
		<th>Jurusan</th>
		<th>Photo</th>
		<th>Kelas</th>
		<th>Aksi</th>
		</tr>";
				$hasil = mysqli_query($db, "SELECT * FROM siswa ORDER BY nis limit $offset,$limit");
				$no = 1;
				$no = 1 + $offset;
				$warnaGenap = "#B2CCFF";   // warna tua
				$warnaGanjil = "#E0EBFF";  // warna muda
				$counter = 1;

				while ($r = mysqli_fetch_array($hasil)) {
					$hasil2 = mysqli_query($db, "SELECT * FROM kelas where kd_kelas='" . $r['kd_kelas'] . "'");
					$r2 = mysqli_fetch_array($hasil2);
					if ($counter % 2 == 0) $warna = $warnaGenap;
					else $warna = $warnaGanjil;
					echo "<tr bgcolor='" . $warna . "'>
		<td align=center>$no</td>
		<td align=center>" . $r['nis'] . "</td>
		<td>" . $r['nm_siswa'] . "</td>
		<td align=center>" . $r['tahun'] . "-" . $r['bulan'] . "-" . $r['tanggal'] . "</td>
		<td align=center>" . $r['jk'] . "</td>
		<td>" . $r['alamat'] . "</td>
		<td>" . $r['asal_sekolah'] . "</td>
		<td align=center>" . $r['no_telp'] . "</td>
		<td align=center>" . $r['jurusan'] . "</td>
		<td align=center><img src=../member/".$r['photo'] ."></td>
		<td align=center>" . $r2['nm_kelas'] . "</td>
		<td align='center'><a href=?page=siswa&act=editsiswa&nis=$r[nis]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> &nbsp;
	            <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?page=siswa&act=hapus&nis=$r[nis]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='images/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
		</td>
		</tr>";
					$no++;
					$counter++;
				}
				echo "</table>";

				echo "<div class=paging>";

				if ($offset != 0) {
					$prevoffset = $offset - 10;
					echo "<span class=prevnext> <a href=$PHP_SELF?page=siswa&offset=$prevoffset>Back</a></span>";
				} else {
					echo "<span class=disabled>Back</span>"; //cetak halaman tanpa link
				}
				//hitung jumlah halaman
				$halaman = intval($baris / $limit); //Pembulatan

				if ($baris % $limit) {
					$halaman++;
				}
				for ($i = 1; $i <= $halaman; $i++) {
					$newoffset = $limit * ($i - 1);
					if ($offset != $newoffset) {
						echo "<a href=$PHP_SELF?page=siswa&offset=$newoffset>$i</a>";
						//cetak halaman
					} else {
						echo "<span class=current>" . $i . "</span>"; //cetak halaman tanpa link
					}
				}

				//cek halaman akhir
				if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {

					//jika bukan halaman terakhir maka berikan next
					$newoffset = $offset + $limit;
					echo "<span class=prevnext><a href=$PHP_SELF?page=siswa&offset=$newoffset>Next</a>";
				} else {
					echo "<span class=disabled>Next</span>"; //cetak halaman tanpa link
				}

				echo "</div>";
			} else {
				echo "<br><b>Data Kosong !</b>";
			}
			break;


		case "editsiswa":
			$edit = mysqli_query($db, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
			$r = mysqli_fetch_array($edit);

			echo "	<h2>Edit Data siswa</h2>
				<form method=POST action=$aksi?page=siswa&act=update name=text_form onsubmit='return Blank_TextField_Validator()' >
				<input type=hidden name=nis value='$r[nis]'>
				<table>
				<tr><td>NIS</td>  
            <td> : $r[nis]</td>
            </tr>
				<tr><td>Nama Siswa</td> 
				<td> : <input type=text name='nm_siswa' id='nm_siswa' size=30 onkeypress=\"ValidateAlpha();\" value='$r[nm_siswa]'></td>
				</tr>
			<tr><td>Tahun</td> 
			<td> : <input type=text name='tahun' id='tahun' size=30 value='$r[tahun]'></td>
			</tr>
			<tr><td>Bulan</td> 
			<td> : <input type=text name='bulan' id='bulan' size=30 value='$r[bulan]'></td>
			</tr>
			<tr><td>Tanggal Lahir</td> 
			<td> : <input type=text name='tanggal' id='tanggal' size=30 value='$r[tanggal]'></td>
			</tr>

			<tr><td>Jenis Kelamin</td>
			<td> : <select name=jk id=jk>";
			$arr = array(
				"Laki-Laki",
				"Perempuan"
			);
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'";
				if ($r['jk'] == $arrdata) echo "selected";
				echo ">$arrdata</option>";
			}
			echo "</select></td>
			</tr>
			<tr><td>Alamat</td>
			<td> : <input type=text name='alamat' id='alamat' size=30 value='$r[alamat]'></td>
			</tr>
			<tr><td>Asal Sekolah</td>
			<td> : <input type=text name='asal_sekolah' id='asal_sekolah' size=30 value='$r[asal_sekolah]'></td>
			</tr>
			<tr><td>Jurusan</td>
			<td> : <input type=text name='jurusan' id='jurusan' size=30 value='$r[jurusan]'></td>
			</tr>
			<tr><td>Photo</td>  
            <td> : $r[photo]</td>
			<tr><td>No Telepon</td>
			<td> : <input type=text name='no_telp' id='no_telp' size=30 maxlength=12 value='$r[no_telp]' onkeypress=\"return onlyNumbers();\"></td></tr>
			<tr><td>Kelas</td> <td> : <select name='kd_kelas' id='kd_kelas'>";
			$hasil4 = mysqli_query($db, "SELECT * FROM kelas order by kd_kelas");
			while ($r4 = mysqli_fetch_array($hasil4)) {
				echo "<option value='$r4[kd_kelas]'";
				if ($r['kd_kelas'] == $r4['kd_kelas']) echo "selected";
				echo ">$r4[nm_kelas]</option>";
			}
			echo	"</select></td>
		</tr>
			";



			echo "<tr><td colspan=2><input type=image src=images/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=images/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?page=siswa';\" ></td></tr>
        </table></form>";
			break;
	}
	?>
</body>

</html>