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

$buku = tampil("SELECT * FROM buku");



$kode = $_GET['kode'];
$denda = $_GET['denda'];
$row1 = tampil("SELECT * FROM peminjam WHERE kode_pinjam = '$kode'")[0];

$row2 = array(
    'denda' => $denda
    
);
$rows = array_merge($row1,$row2);

//var_dump($rows); die;   
    if (kembali_buku($rows)>0) {
     echo "<script>"
            . "alert('Data Berasil Dikembalikan');"
                    . "document.location.href = '../buku/buku.php';"
                    . "</script>";
}
else{
    echo "ada yang salah";
}

?>
