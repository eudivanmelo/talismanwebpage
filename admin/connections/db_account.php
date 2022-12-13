<?php
    $con_account = new mysqli('54.233.140.224', 'eudivan', '11031997', 'db_account');

    if (!$con_account){
        die("Erro na conexão com o banco de dados! Código de erro: " . mysqli_connect_errno());
    }
?>