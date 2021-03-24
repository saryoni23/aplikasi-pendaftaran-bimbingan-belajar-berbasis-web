<?php

$aksi="page/page_program/aksi_program.php";

    $sql  = mysqli_query($db, "SELECT * FROM program_bimbel WHERE id='1'");
    $r    = mysqli_fetch_array($sql);
    echo "
        <form method=POST action=$aksi?page=program&act=update>
        <input type=hidden name=id value=$r[id]>
        <table>
        <tr><td><textarea name='isi' style='width: 600px; height: 350px;'>$r[program]</textarea></td></tr>
        <tr><td><input type=submit value=Update></td></tr>
        </table></form>";

?>
