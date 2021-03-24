<?php
require 'template/header.php' ?>
<form action="check_login.php" class="inner-login" method="post">
    <h3 class="text-center title-halaman">Login Siswa</h3>
    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Username">
    </div>

    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>

    <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />

    <a href="../">
        <input type="cancel" class="btn btn-block btn-custom-green" value="Halaman Utama" /></a>

    <?php require 'template/footer.php' ?>