<?php
    session_unset($_SESSION['name']);
    session_destroy();
    header('Location: ../../Landing.php');
?>