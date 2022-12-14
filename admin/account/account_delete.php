<?php
    include_once("../connections/db_account.php");

    if (isset($_POST['id'])){
        $sql = "DELETE FROM t_account WHERE accountid='" . $_POST['id'] . "'";
        $result = mysqli_query($con_account, $sql); // Execute
    }

?>