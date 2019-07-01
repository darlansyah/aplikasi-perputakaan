<?php
session_start();
if (!(!isset($_SESSION["admin"]) || (!isset($_SESSION["petugas"]))) ) {
    header("location:login.php");
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
        <title>index admin</title>
    </head>
    <body>
    <center>
        <h1>Masuk Pak Eko</h1>
        <h2>Selamat Datang <?= $_SESSION["nama"]; ?></h2>
        <a href="logout.php">Logout</a>
    </center>   
    
    </body>
</html>
