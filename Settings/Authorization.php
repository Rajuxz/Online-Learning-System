<?php
    session_start();

    if(isset($_SESSION['name'])){
        header("Location: /Dashboard.php");
    }else{
        header("Location: ../Admin/AdminLogin.php");
        exit;
    }
?>