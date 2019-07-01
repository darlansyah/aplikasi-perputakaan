<?php
session_start();
if (isset($_SESSION["admin"])) {
    header("location:index.php");
}
require '../../../function/functions.php';
$pesan = null;

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    
//    $tampi = tampil("SELECT * FROM admin WHERE user = '$user'"); 
// var_dump($tampi); die;
    $result = mysqli_query($link,"SELECT * FROM admin WHERE user = '$user'");
    
    
    if (mysqli_num_rows($result)===1) {
        $row = mysqli_fetch_assoc($result);
        if (($row['pass']) === ($pass)) {
            $_SESSION["on"] = true;
            $_SESSION["nama"] = $row['nama'];
            $_SESSION['level'] = 1;
            header("location:../../dashbord/dashbord.php");
        }
        else{
            $pesan = "password yang salah!";
        }
         
    }
    else{
        $pesan = "user yang salah!";
    }
}


?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../../../assets/css/typography.css">
    <link rel="stylesheet" href="../../../assets/css/default-css.css">
    <link rel="stylesheet" href="../../../assets/css/styles.css">
    <link rel="stylesheet" href="../../../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../../../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="" method="POST">
                    <div class="login-form-head">
                        <h4>Login</h4>
                        <h4>Admin</h4>
                    </div>
                    <div class="login-form-body">
                         
                                <div class="form-gp">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" name="user" id="exampleInputEmail1" required>
                                    <i class="ti-email"></i>
                                </div>
                                <div class="form-gp">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="pass" id="exampleInputPassword1" required>
                                    <i class="ti-lock"></i>
                                </div>
                                <div class="row mb-4 rmber-area">

                                </div>
                                <div class="submit-btn-area">
                                    <button id="form_submit" type="submit" name="login">Login<i class="ti-arrow-right"></i></button>
                                    <div class="login-other row mt-4">

                                    </div>
                                </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted"><?= $pesan;?></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="../../../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../../../assets/js/popper.min.js"></script>
    <script src="../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/owl.carousel.min.js"></script>
    <script src="../../../assets/js/metisMenu.min.js"></script>
    <script src="../../../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../../../assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="../../../assets/js/plugins.js"></script>
    <script src="../../../assets/js/scripts.js"></script>
</body>

</html>