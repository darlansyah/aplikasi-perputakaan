<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("location:login.php");
?>