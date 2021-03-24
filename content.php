<?php
include "config/keneksi1.php";
if ($_GET['page'] == "home") {
	$tampil = mysqli_query($db, "SELECT * FROM berita ORDER BY id");
	while ($r = mysqli_fetch_array($tampil)) {
		$isi = substr($r['isi_berita'], 0, 220); // ambil sebanyak 220 karakter
		$isi = substr($r['isi_berita'], 0, strrpos($isi, " ")); // potong per spasi kalimat
		echo '
<div id="cbox1">
				<h2 class="title">' . $r['judul_berita'] . '</h2>
				<p>Tanggal : ' . $r['tanggal_berita'] . '</p>
				<p>' . $isi . '</p>
				<p><a href="berita-' . $r['id'] . '.html" class="link-style">Selengkapnya ...</a></p>
			</div>
';
	}
} elseif ($_GET['page'] == "detailberita") {
	$t = mysqli_query($db, "SELECT * FROM berita where id=" . $_GET['id']);
	$r2 = mysqli_fetch_array($t);
	echo '
<div id="cbox1">
				<h2 class="title">' . $r2['judul_berita'] . '</h2>
				<p>Tanggal : ' . $r2['tanggal_berita'] . '</p>
				<p>' . $r2['isi_berita'] . '</p>
			</div>
';
} elseif ($_GET['page'] == "program") {
	$t = mysqli_query($db, "SELECT * FROM program_bimbel where id=1");
	$r2 = mysqli_fetch_array($t);
	echo '
<div id="cbox1">
				<h2 class="title">Program Bimbingan Belajar PRIMAGAMA</h2>
				<p>' . $r2['program'] . '</p>
			</div>
';
} elseif ($_GET['page'] == "berita") {
	$tampil = mysqli_query($db, "SELECT * FROM berita ORDER BY id");
	while ($r = mysqli_fetch_array($tampil)) {
		$isi = substr($r['isi_berita'], 0, 220); // ambil sebanyak 220 karakter
		$isi = substr($r['isi_berita'], 0, strrpos($isi, " ")); // potong per spasi kalimat
		echo '
<div id="cbox1">
				<h2 class="title">' . $r['judul_berita'] . '</h2>
				<p>Tanggal : ' . $r['tanggal_berita'] . '</p>
				<p>' . $isi . '</p>
				<p><a href="berita-' . $r['id'] . '.html" class="link-style">Selengkapnya ...</a></p>
			</div>
';
	}
}
