<?php
    $con_account = new mysqli('localhost', 'root', '', 'db_account');

    if (!$con_account){
        die("Erro na conexão com o banco de dados! Código de erro: " . mysqli_connect_errno());
    }
?>
