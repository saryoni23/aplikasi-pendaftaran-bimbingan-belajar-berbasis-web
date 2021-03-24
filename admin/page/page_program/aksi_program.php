<?php
session_start();
include "../../../config/keneksi1.php";

$page=$_GET['page'];
$act=$_GET['act'];

if ($page=='program' AND $act=='update'){

    mysqli_query($db, "UPDATE program_bimbel SET program = '$_POST[isi]'
                            WHERE id       = '$_POST[id]'");
  
  header('location:../../main.php?page='.$page);
}
?>
