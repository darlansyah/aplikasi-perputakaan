<?php
error_reporting(0);
// baru
session_start();

$alamat = null;
if (!isset($_SESSION['on'])) {
        header("location:../lihatBuku/lihat-buku.php"); 
        exit;
}


require '../../function/functions.php';
$id = $_GET['id'];

if (hapusPengunjung($id)>0) {
    echo "<script>"
            . "alert('Data Berasil Dihapus');"
                    . "document.location.href = 'pengunjung.php';"
                    . "</script>";
}
else{
    echo "gagal dihapus";
}
