<?php
    $server = "localhost";
    $name = "root";
    $password = "";
    $database = "onlinelearning";
    $conn = new mysqli($server,$name,$password,$database);

    if($conn->connect_error){
        die("Connection Error.");
     }

     /*else{
          //Check if connection is success or failed.
          echo'<script>alert("Connection success");</script>';
      }*/
?>