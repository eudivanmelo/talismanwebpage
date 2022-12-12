<?php
    $con_account = new mysqli('localhost', 'root', 'rl0o2f2mt', 'db_account');

    if (!$con_account){
        die("Erro na conexão com o banco de dados! Código de erro: " . mysqli_connect_errno());
    }
?>