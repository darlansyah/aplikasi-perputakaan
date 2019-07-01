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

$jumlahBuku= count(tampil("SELECT * FROM peminjam WHERE kode_register = '$kode' "));


 if ($jumlahBuku > 0) {
    echo "<script>  
                 alert('Buku tidak bisa dihapus,karena buku masih dipinjam  $jumlahBuku buah');
                 document.location.href = 'buku.php';
                </script>
                ";
    exit;
}

if (hapusBuku($kode) > 0) {
    echo "<script>  
                 alert('Data Berasil dihapus');
                 document.location.href = 'buku.php';
                </script>
                ";
            
}
else{
    echo "gagal dihapus";
}
