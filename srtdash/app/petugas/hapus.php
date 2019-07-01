<?php
error_reporting(0);
// baru
session_start();


if (!isset($_SESSION['on'])) {
        header("location:../lihatBuku/lihat-buku.php"); 
        exit;
}

require '../../function/functions.php';
error_reporting(0);
$kode = $_GET['kode'];
//var_dump($kode); die;
$jumlahPetugas = count(tampil("SELECT * FROM peminjam WHERE kode_petugas = '$kode'"));
//var_dump($jumlahPetugas); die;

if ($jumlahPetugas > 0) {
     echo "<script>  
                 alert('petugas tidak bisa dihapus, karena masih melakukan peminjam buku sebanyak $jumlahPetugas buah');
                 document.location.href = 'petugas.php';
                </script>
                ";
     exit;
}

if (hapusPetugas($kode) > 0) {
    echo "<script>"
            . "alert('Data Berasil Dihapus');"
                    . "document.location.href = 'petugas.php';"
                    . "</script>";
}
else{
    echo "gagal dihapus";
}
