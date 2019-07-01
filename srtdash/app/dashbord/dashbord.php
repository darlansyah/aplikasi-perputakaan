<?php
//require '../../function/functions.php';
// echo grafik1yy("Perempuan"); 
// echo "<br/>";
// echo grafik1x();
// die;
////var_dump(jumlahPengunjung1LP1Y("Laki-Laki"));
////$tahuns = tahuns();
////echo $tahuns[0];
////var_dump(dataTahun());
//echo  (grafik1yy("Laki-Laki"));
//echo grafik1x();
////die;


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
///require '../../index.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Perputakaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- grafik -->
    <script src="../../assets/js/grafik.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
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
                            <li class="active">
                                <a href="" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li> 
                            <li><a href="../buku/buku.php"><i class="fa fa-table"></i><span>Buku</span></a></li>
                            <li><a href="../anggota/anggota.php"><i class="fa fa-table"></i><span>Anggota</span></a></li> 
                            <?=$alamat;?>
                            <li><a href="../pengunjung/pengunjung.php"><i class="fa fa-table"></i><span>Pengujung</span></a></li>
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
                        <div class="nav-btn pull-left">
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
           
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                   
                </div>
               <!--  -->
               <div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
         <br/>
         <br/>  
         <div id="myDiv1"><!-- Plotly chart will be drawn inside this DIV --></div>
        
         <script>
         
                var trace1 = {
                  x: <?= bulanx()?>,
                  y: <?= grafik1y(maxTahun(),"Laki-Laki")?>, 
                  name: 'Laki-Laki', 
                  type: 'bar'
                };

                var trace2 = {
                  x: <?= bulanx()?>, 
                  y: <?= grafik1y(maxTahun(),"Perempuan")?>,
                  name: 'Perempuan', 
                  type: 'bar'
                };

                var data = [trace1, trace2];
                var layout = {
                    title: 'Total Pengunjung L/P <br> Tahun 2018',
                    barmode: 'group'};

                Plotly.newPlot('myDiv', data, layout);

   
         
                var trace11 = {
                  x: <?=grafik1x(); ?>,
                  y: <?= grafik1yy("Laki-Laki");?>, 
                  name: 'Laki-Laki', 
                  type: 'bar'
                };

                var trace21 = {
                  x: <?= grafik1x(); ?>,
                  y: <?= grafik1yy("Perempuan");?>, 
                  name: 'Perempuan', 
                  type: 'bar'
                };

                var data1 = [trace11, trace21];
                var layout1 = {
                    title: 'Total Pengunjung L/P<br>Tahun <?= minTahun();?> - <?= maxTahun(); ?>',
                    barmode: 'group'};
                Plotly.newPlot('myDiv1', data1, layout1);

         </script>


               <!-- --> 
               
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
    
   
    <!-- jquery latest version -->
    <script src="../../assets/js/vendor/jquery-2.2.4.min.js"></script>
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