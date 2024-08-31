<?php
session_start();

include_once('conexao.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['emailPassword']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['emailPassword']);
    header('Location: ../login.php');
}

$nameUser = $_SESSION['nameUser'];
$lastName = $_SESSION['lastName'];
$phone = $_SESSION['phone'];

$sql = "SELECT *
FROM V_ASSETS;
";

$result = $conexao->query($sql);
