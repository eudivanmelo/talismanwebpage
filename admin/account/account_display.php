<?php 
include_once("../connections/db_account.php");

if (isset($_POST['displaySend'])){
    // Verificar banco de dados
    $sql = "SELECT * FROM t_account";
    $result = mysqli_query($con_account, $sql);

    while($row = mysqli_fetch_assoc($result)){
        // Privelege name
        switch ($row['pv']){
            case "1":
                $privilege = "Youtuber";
                break;
            case "2":
                $privilege = "Streamer";
                break;
            case "3":
                $privilege = "MOD";
                break;
            case "4":
                $privilege = "DESIGN";
                break;
            case "5":
                $privilege = "SCRIPTER";
                break;
            case "6":
                $privilege = "DEV";
                break;
            case "7":
                $privilege = "BD";
                break;
            case "8":
                $privilege = "GM";
                break;
            case "9":
                $privilege = "Owner";
                break;
            default:
                $privilege = "Normal Player";
                break;
        }

        // Return row
        echo   '<tr>
                    <th scope="row">' . $row['accountid'] . '</th>
                    <td>' . $row['name'] . '</th>
                    <td>' . $privilege . '</th>
                    <td>' . $row['gd'] . '</th>
                    <td>
                        <button type="button" class="btn btn-sm btn-success" onclick="editAccount(' . $row['accountid'] . ')">
                            Edit
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccount">
                            Delete
                        </button>
                    </td>
                </tr>';
    }
}


?>