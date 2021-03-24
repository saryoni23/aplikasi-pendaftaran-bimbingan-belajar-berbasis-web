<?php
echo"
<div id='cssmenu'>
<ul>
   ";
   if($_SESSION['leveluser']=="admin"){
		echo "
		<li class='has-sub'><a href='#'><span>Sistem Informasi</span></a>
		<ul>
			<li><a href='main.php?page=program'><span>Program Bimbel</span></a></li>
			<li><a href='main.php?page=berita'><span>Berita</span></a></li>
		</ul>
		<li class='has-sub'><a href='#'><span>Data Siswa</span></a>
		<ul>
			<li><a href='main.php?page=siswa'><span>Siswa</span></a></li>
			<li><a href='main.php?page=jurusan'><span>Jurusan</span></a></li>
			<li><a href='main.php?page=kelas'><span>Kelas</span></a></li>
		</ul>
		</li>
		<li class='has-sub'><a href='#'><span>Data Pelajaran</span></a>
		<ul>
			<li><a href='main.php?page=pengajar'><span>Pengajar</span></a></li>
			<li><a href='main.php?page=pelajaran'><span>Mata Pelajaran</span></a></li>
		</ul>
		</li>
		<li class='has-sub'><a href='main.php?page=admin'><span>Data User</span></a>
		</li>
		
		";
			}
		echo"
		<li><a href='main.php?page=materi'><span>Materi</span></a></li>
		<li><a href='main.php?page=nilai'><span>Nilai</span></a></li>

		
</ul>
</div>	
";
