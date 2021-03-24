<li <?php if ($_GET['page'] == "home") {
        echo 'class="current_page_item"';
    } ?>><a href="./">Beranda</a></li>
<li <?php if ($_GET['page'] == "program") {
        echo 'class="current_page_item"';
    } ?>><a href="program.html">Program Bimbel</a></li>
<li><a href="./member/register.php">Daftar Siswa</a></li>
<li><a href="./member">Halaman Siswa</a></li>