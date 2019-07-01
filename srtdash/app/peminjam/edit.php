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
      $kode = $_GET['kode'];
      $row = tampil("SELECT * FROM peminjam WHERE kode_pinjam = '$kode'")[0];
        
       $petugas = tampil("SELECT kode_petugas,nama FROM petugas");
       $anggota = tampil("SELECT no_anggota,nama FROM anggota");
       $buku = tampil("SELECT kode_register, judul FROM buku");  
      //var_dump($row); die;
       
       
      if (isset($_POST['update'])) {
       
          //var_dump($row['kode_register'],$_POST['buku']); die;
          if ( !(edit_penjam_buku($row['kode_register'], $_POST['buku']) > 0)) {
             echo "<script>"
            . "alert('Data Buku Kosong');"
                    . "document.location.href = 'peminjam.php';"
                    . "</script>";
                    exit();
          }
           
          
          if (editPeminjam($kode,$_POST) > 0) {
              echo "<script>"
            . "alert('Data Berasil DiUpdate');"
                    . "document.location.href = 'peminjam.php';"
                    . "</script>";
          }
          else{
              echo "<script>"
            . "alert('Tidak Terjadi Update');"
                    . "document.location.href = 'peminjam.php';"
                    . "</script>";
            exit();
          }
}
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
        <title>Edit Peminjam</title>
        
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
                            <li><a href="../pengunjung/pengunjung.php"><i class="fa fa-table"></i><span>Pengunjung</span></a></li>
                            <li><a href="../status/status.php"><i class="fa fa-table"></i><span>Status</span></a></li>
                            <li class="active"><a href="../peminjam/peminjam.php"><i class="fa fa-table"></i><span>Peminjam</span></a></li>
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
                </div>
            </div>
            <!-- header area end -->
           
            <!-- --------------------- -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                   <div class="card">
                   <div class="card-body">
                   <h6 class="header-title mb-0">Edit Peminjaman</h6>
                   </div>   
                            <div class="card-body">
       <form action="" method="POST"> 
           <div class="form-group">
                <label for="kode" class="col-form-label">Kode Peminjam</label>
                <input class="form-control" type="text" name="kode" value="<?= $row['kode_pinjam'];?>" id="kode" required>
            </div>
            <div class="form-group">
                                            <label class="col-form-label">Petugas</label>
                                            <select class="custom-select" name="petugas">
                                                <option></option>
                                                <?php
                                                 foreach ($petugas as $pet):
                                                     ?>
                                                <option value="<?=$pet['kode_petugas'];?>"
                                                        <?php if ($pet['kode_petugas'] == $row['kode_petugas'])
                                                            {echo "selected";}?>>
                                                            <?=$pet['nama'];?></option>
                                                 <?php    
                                                 endforeach;
                                                ?>
                                            </select>
            </div>
            <div class="form-group">
                                            <label class="col-form-label">Anggota</label>
                                            <select class="custom-select" name="anggota">
                                                    <option></option>
                                                    <?php                                
                                                    foreach ($anggota as $ang):
                                                        ?>
                                                    <option value="<?= $ang['no_anggota'];?>"
                                                            <?php if ($ang['no_anggota'] == $row['no_anggota']) {
                                                            echo "selected";
                                                        }?>> <?= $ang['nama'];?></option>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </select>
            </div>
            <div class="form-group">
                                            <label class="col-form-label">Buku</label>
                                            <select class="custom-select" name="buku">
                                                <option></option>
                                                    <?php
                                                    foreach ($buku as $buk):
                                                    ?>
                                                    <option value="<?= $buk['kode_register'];?>"
                                                            <?php if ($buk['kode_register'] == $row['kode_register']) {
                                                                echo "selected";}?>> <?= $buk['judul'];?></option>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </select>
            </div>
            <div class="form-group">
                <label for="tgl_pinjam" class="col-form-label">Tanggal Pinjam</label>
                <input class="form-control" type="date" name="tgl_pinjam" value="<?= $row['tgl_pinjam']; ?>" id="tgl_pinjam" required>
            </div>
            <div class="form-group">
                <label for="tgl_kembali" class="col-form-label">Tanggal Kembali</label>
                <input class="form-control" type="date" name="tgl_kembali" value="<?= $row['tgl_kembali']; ?>" id="tgl_kembali" required>
            </div>
            <button type="submit" name="update" class="btn btn-warning btn-lg btn-block">Update</button>
       </form>
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

