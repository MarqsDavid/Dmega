<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['passwordUsers']);
    
    header('Location: ../login.php');
?>