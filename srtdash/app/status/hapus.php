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

$no = $_GET['id'];


if (hapusStatus($no) > 0) {
    echo "<script>  
                 alert('Data Berasil dihapus');
                 document.location.href = 'status.php';
                </script>
                ";
            
}
else{
    echo "gagal dihapus";
}

