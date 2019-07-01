<?php
session_start();
if ($_SESSION['level'] == 1) {
    header("location:../login/admin/logout.php");
}
else if ($_SESSION['level'] == 2) {
    header("location:../login/petugas/logout.php");
}
else{
   header("location:../lihatBuku/lihat-buku.php"); 
}
?>

