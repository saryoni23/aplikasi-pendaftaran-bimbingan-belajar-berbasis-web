<?php
include "../config/keneksi1.php";

if ($_GET['page'] == 'home') {
  echo '<h1>Welcome ' . $_SESSION['namasite'] . '</h1>';
  echo '<p>Selamat datang di Website Pusat Bimbingan Belajar PRIMAGAMA. Pilih menu untuk melakukan pengolahan data.</p>';
} elseif ($_GET['page'] == 'jurusan') {
  echo '<h1>Jurusan</h1>';
  include "page/page_jurusan/jurusan.php";
} elseif ($_GET['page'] == 'kelas') {
  echo '<h1>Kelas</h1>';
  include "page/page_kelas/kelas.php";
} elseif ($_GET['page'] == 'siswa') {
  echo '<h1>Siswa</h1>';
  include "page/page_siswa/siswa.php";
} elseif ($_GET['page'] == 'pengajar') {
  echo '<h1>Pengajar</h1>';
  include "page/page_pengajar/pengajar.php";
} elseif ($_GET['page'] == 'pelajaran') {
  echo '<h1>Mata Pelajaran</h1>';
  include "page/page_pelajaran/pelajaran.php";
} elseif ($_GET['page'] == 'materi') {
  echo '<h1>Materi</h1>';
  include "page/page_materi/materi.php";
} elseif ($_GET['page'] == 'nilai') {
  echo '<h1>Nilai</h1>';
  include "page/page_nilai/nilai.php";
} elseif ($_GET['page'] == 'program') {
  echo '<h1>Program Bimbingan Belajar</h1>';
  include "page/page_program/program.php";
} elseif ($_GET['page'] == 'admin') {
  echo '<h1>Data User</h1>';
  include "page/page_admin/admin.php";
} elseif ($_GET['page'] == 'berita') {
  echo '<h1>Berita</h1>';
  include "page/page_berita/berita.php";
} elseif ($_GET['page'] == 'password') {
  echo '<h1>Ubah Password User</h1>';
  include "page/page_password/password.php";
}
