<?php
include "config/keneksi1.php";
$sql = "SELECT * FROM berita";
$tampil = mysqli_query($db, $sql);
while ($berita = mysqli_fetch_array($tampil)) {
    echo '<li class="first"><a href="berita-' . $berita['id'] . '.html">' . $berita['judul_berita'] . '</a></li>';
}
