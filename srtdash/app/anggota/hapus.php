<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['on'])) {
         header("location:../lihatBuku/lihat-buku.php");
         exit;
}


require '../../function/functions.php';

$no = $_GET['no'];
$jumlahAnggota = count(tampil("SELECT * FROM peminjam WHERE no_anggota = '$no'"));

if ($jumlahAnggota > 0) {
     echo "<script>  
                 alert('anggota tidak bisa dihapus, karena masih melakukan peminjam buku sebanyak $jumlahAnggota buah');
                 document.location.href = 'anggota.php';
                </script>
                ";
     exit;
}

if (hapusAnggota($no) > 0) {
   
    echo "<script>  
                 alert('Data Berasil dihapus');
                 document.location.href = 'anggota.php';
                </script>
                ";
            
}
else{
    echo "gagal dihapus";
}


