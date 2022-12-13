<?php
    include_once("../connections/db_account.php");

    if (isset($_POST['id'])){
        $sql = "SELECT * FROM t_account WHERE accountid='" . $_POST['id'] . "'";
        $result = mysqli_query($con_account, $sql); // Execute

        $response = array();
        while($row=mysqli_fetch_assoc($result)){
            $response = $row;
        }

        echo json_encode($response);
    }else{
        $response['status'] = 200;
        $response['message'] = "Invalid or data not found.";
    }

?>