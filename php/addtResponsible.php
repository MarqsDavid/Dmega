<?php
if (isset($_POST['submit'])) {
    include_once('conexao.php');


    $responsible = mysqli_real_escape_string($conexao, $_POST['responsible']);


    $query = "INSERT INTO responsible (responsible) VALUES ('$responsible')";


    if (mysqli_query($conexao, $query)) {

        header('Location: ../pages/home.php');
        exit();
    } else {

        echo "Error: " . mysqli_error($conexao);
    }
}
?>