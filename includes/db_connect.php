<?php
    // Iniciar conexão MySQL
    function connect_todb($db){
        // Dados do banco de dados
        $host = "localhost";
        $user = "root";
        $pass = "";

        try{
            $connection = mysqli_connect($host, $user, $pass, $db);
            if (mysqli_connect_errno())
            {
                die("Erro na conexão com o banco de dados! Código de erro: " . mysqli_connect_errno());
            }

            return $connection;
        } catch (Exception $e){
            die("Exceção capturada: " .  $e->getMessage() . "\n");
        } 
    }

    // Função que irá efetuar o login
    function login($connection, $username, $password){
        // Conectar a base de dados e verificar se o usuário existe
        try {
            $connection_table = mysqli_query($connection, "SELECT accountid, pwd, pv FROM t_account WHERE name='{$username}'");
            if ($connection_table) {
                // Colectar dados da tabela
                $data = mysqli_fetch_assoc($connection_table);
                if (!empty($data)) {
                    // deCriptografar senha
                    if (md5($password) === $data['pwd']){
                        if ($data['pv'] === 9){
                            session_start(); // Iniciar sessão
                            $_SESSION['user_id'] = $data['accountid']; // Definir id do usuário logado

                            mysqli_close($connection); // Encerrar conexão com o banco de dados
                            header("Location: index.php");
                        }else{
                            mysqli_close($connection); // Encerrar conexão com o banco de dados
                            header("Location: login.php?error=noprivilege");
                        }
                    }else{
                        mysqli_close($connection); // Encerrar conexão com o banco de dados
                        header("Location: login.php?error=password");
                    }
                }else{
                    mysqli_close($connection); // Encerrar conexão com o banco de dados
                    header("Location: login.php?error=username");
                }
            }else {
                mysqli_close($connection); // Encerrar conexão com o banco de dados
                header("Location: login.php?error=database");
            }
        } catch (Exception $e) {
            die("Exceção capturada: " .  $e->getMessage() . "\n");
        }
    }

    // Obter dados de todas as contas
    function get_allaccounts($connection){
        // Conectar a base de dados e verificar se o usuário existe
        try {
            $connection_table = mysqli_query($connection, "SELECT * FROM t_account");
            if ($connection_table) {
                // Colectar dados da tabela
                $data = mysqli_fetch_assoc($connection_table);
                if (!empty($data)) {
                    foreach ($data as $result) {
                        echo $result;
                        echo "<br>";
                    }
                }
            }
        } catch (Exception $e) {
            die("Exceção capturada: " .  $e->getMessage() . "\n");
        }
    }

    // Obter total de contas cadastradas
    function get_count_accounts($connection){
        // Conectar a base de dados e verificar se o usuário existe
        try {
            $connection_table = mysqli_query($connection, "SELECT COUNT(*) as Total FROM t_account");
            if ($connection_table) {
                // Colectar dados da tabela
                $data = mysqli_fetch_assoc($connection_table);
                if (!empty($data['Total'])) {
                    echo $data['Total'];
                }
            }
        } catch (Exception $e) {
            die("Exceção capturada: " .  $e->getMessage() . "\n");
        }
    }
?>