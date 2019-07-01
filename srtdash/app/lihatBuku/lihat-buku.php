<?php
require '../../function/functions.php';
    //$buku = tampil("SELECT buku.*,rak_buku.nama_rak FROM `buku` LEFT JOIN rak_buku ON buku.kode_register = rak_buku.kode_register ");
  // var_dump($buku); die;
$buku = tampil("SELECT * FROM buku");
$no = 1;
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
                    <h3><a href="#">Pengunjung</a></h3>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href=""   class="active"  aria-expanded="true"><i class="fa fa-table"></i><span>Buku</span></a>
                            </li> 
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
                </div>
            </div>
            <!-- header area end -->
            <!-- --------------------- -->
        <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                   <div class="card">
                   <div class="card-body">
                   <h4 class="header-title mb-0">Daftar Buku</h4>
                   </div>   
                            <div class="card-body">
                               
                <table id="myTable" width="100%" >
                <thead  class="bg-success">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Jumlah</th>
            </tr>
                </thead>
                <tbody>
            <?php
            foreach ($buku as $row) :
            ?>
            <tr>
                <td><?= $no++;?></td>
                <td><?= $row['judul'];?></td>
                <td><?= $row['pengarang'];?></td>
                <td><?= $row['penerbit'];?></td>
                <td><?= $row['thn_terbit'];?></td>
                <td><?= $row['jumlah'];?></td>
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