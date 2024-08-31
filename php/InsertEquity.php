<?php
if (isset($_POST['submit'])) {

    include_once('conexao.php');

    $ddescription = $_POST['description'];
    $assetNumber = $_POST['patrimony'];
    $numberLocation = $_POST['location'];
    $responsible = $_POST['responsible'];
    $dateCreation = $_POST['creation-date'];
    $sstatus = 1;
    $reasons = 1;


    $result = mysqli_query($conexao, "INSERT INTO assets(ddescription,assetNumber,numberLocation,responsible_id,dateCreation,sstatus,reasons) VALUES
       ('$ddescription','$assetNumber','$numberLocation','$responsible','$dateCreation', $sstatus, $reasons)");

    header('Location: ../pages/home.php');
}
