<?php
    include_once("../connections/db_account.php");

    if (isset($_POST['Username']) && isset($_POST['Email']) &&
        isset($_POST['Password']) && isset($_POST['Privilege']) && isset($_POST['TPoints'])){
            // Extrair dados
            extract($_POST);

            // Verificar nome de usuário
            if($Username != '') {
                $qry = "SELECT * FROM t_account WHERE name='$Username'";
                $result = mysqli_query($con_account, $qry);
                if($result) {
                    if(mysqli_num_rows($result) > 0) {
                        echo 'existname';
                        exit(); // Sair e retornar erro
                    }
                    mysqli_free_result($result);
                }
                else {
                    echo mysqli_error($con_account); // Escrever erro
                    die('An error occurred, please try again later');
                }
            }

            // Verificar email
            if($Email != '') {
                $qry = "SELECT * FROM t_account WHERE email='$Email'";
                $result = mysqli_query($con_account, $qry);
                if($result) {
                    if(mysqli_num_rows($result) > 0) {
                        echo 'existemail';
                        exit(); // Sair e retornar erro
                    }
                    mysqli_free_result($result);
                }
                else {
                    echo mysqli_error($con_account); // Escrever erro
                    die('An error occurred, please try again later');
                }
            }
            
            // Sql script
            $sql = "INSERT INTO t_account (name, pwd, pw2, email, pv, gd) 
            VALUES ('$Username', '" . md5($Password) . "', '$Password', '$Email', '$Privilege', '$TPoints')";

            $result = mysqli_query($con_account, $sql);
            //Check whether the query was successful or not
            if($result) {
                echo "success";
                exit();
            }else {
                echo mysqli_error($con_account);;
            }
        }
    
?>