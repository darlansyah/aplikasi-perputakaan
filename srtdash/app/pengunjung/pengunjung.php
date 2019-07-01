<?php
error_reporting(0);
// baru
session_start();

$alamat = null;
if (!isset($_SESSION['on'])) {
        header("location:../lihatBuku/lihat-buku.php"); 
        exit;
}

if ($_SESSION['level'] ==1) {
    $alamat = "<li><a href='../petugas/petugas.php'><i class='fa fa-table'></i><span>Petugas</span></a></li>";
}
else if ($_SESSION['level'] ==2) {
    $alamat = null;
}

require '../../function/functions.php';

$tampil = tampil("SELECT pengunjung.id_pengunjung,"
        . "pengunjung.nama,pengunjung.jk,"
        . "pengunjung.noHP,pengunjung.alamat,"
        . "pengunjung.tgl,"
        . "status.status FROM `pengunjung` "
        . "LEFT JOIN status ON pengunjung.id_status = status.id_status");

//var_dump($tampil); die;
?>
    


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Daftar Pengunjung</title>
        
        <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../assets/css/themify-icons.css">
        <link rel="stylesheet" href="../../assets/css/metisMenu.css">
        <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../../assets/css/slicknav.min.css">
        <!-- others css -->
        <link rel="stylesheet" href="../../assets/css/typography.css">
        <link rel="stylesheet" href="../../assets/css/default-css.css">
        <link rel="stylesheet" href="../../assets/css/styles.css">
        <link rel="stylesheet" href="../../assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="../../assets/js/vendor/modernizr-2.8.3.min.js"></script>

        <!-- DataTabel-->
        <script type="text/javascript" src="../../assets/datatabel/jQuery-3.3.1/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../../assets/datatabel/DataTables-1.10.18/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" href="../../assets/datatabel/DataTables-1.10.18/css/jquery.dataTables.css">
        <link rel="stylesheet" href="../../assets/datatabel/DataTables-1.10.18/css/dataTables.bootstrap.css">
    </head>
    <body>
        <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <h3><a href="#"><?=$_SESSION["nama"]?></a></h3>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="../dashbord/dashbord.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li> 
                            <li><a href="../buku/buku.php"><i class="fa fa-table"></i><span>Buku</span></a></li>
                            <li><a href="../anggota/anggota.php"><i class="fa fa-table"></i><span>Anggota</span></a></li> 
                            <?=$alamat;?>
                            <li  class="active" ><a href=""><i class="fa fa-table"></i><span>Pengujung</span></a></li>
                            <li><a href="../status/status.php"><i class="fa fa-table"></i><span>Status</span></a></li>
                            <li><a href="../peminjam/peminjam.php"><i class="fa fa-table"></i><span>Peminjam</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Pengembalian</span></a>
                                <ul class="collapse">
                                    <li><a href="../pengembalian/pengembalian.php">Pengembalian</a></li>
                                    <li><a href="../history_pengembalian/history_pengembalian.php">History Pengembalian</a></li>
                                </ul>
                            </li>
                            <li><a href="../grafik/grafik.php"><i class="fa fa-table"></i><span>Grafik</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav  -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class=" nav-btn pull-left">
                            <h4>Sistem Informasi Perpustakaan</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-4 clearfix">
                            <ul class="notification-area pull-right">
                                <p><a href="../logout/logout.php">Keluar</a></p>
                            </ul>
                        </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- --------------------- -->
        <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                   <div class="card">
                   <div class="card-body">
                   <h4 class="header-title mb-0">Daftar Pengunjung</h4>
                   </div>   
                            <div class="card-body">
                                <a class="btn btn-rounded btn-primary mb-3" href="tambah.php">Tambah</a>
                <table id="myTable" width="100%" >
                <thead  class="bg-success">
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Jenis Kelamanin</td>
                <td>No HP</td>
                <td>Alamat</td>
                <td>Tanggal</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            foreach ($tampil as $row) :
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'];?></td>
                <td><?= $row['jk'];?></td>
                <td><?= $row['noHP'];?></td>
                <td><?= $row['alamat'];?></td>
                <td><?= $row['tgl'];?></td>
                <td><?= $row['status'];?></td>
                <td>
                    <a class="btn btn-rounded btn-warning mb-3"  href="edit.php?id=<?=$row['id_pengunjung']; ?>">Edit</a>
                    <a class="btn btn-rounded btn-danger mb-3" href="hapus.php?id=<?=$row['id_pengunjung']; ?>" onclick="return confirm('Apakah Yakin Dihapus?')">Hapus</a>
                </td>
            </tr>
            <?php
        endforeach;
            ?>
            </tbody>
        </table>
     </div>
                     </div>
                </div>
               <!-- kepala  -->
                <!-- --------------------- -->
    <!-- kali --> 
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018 . All right reserved</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    <!-- bootstrap 4 js -->
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/owl.carousel.min.js"></script>
    <script src="../../assets/js/metisMenu.min.js"></script>
    <script src="../../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../../assets/js/jquery.slicknav.min.js"></script>
    <!-- others plugins -->
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>
<!-- DataTabel-->
<script type="text/javascript">
         $(document).ready( function(){
        $('#myTable').DataTable();
         } );
        </script>