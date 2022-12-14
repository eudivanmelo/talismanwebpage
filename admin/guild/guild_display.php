<?php 
include_once("../connections/db_account.php");

// Display account
if (isset($_POST['displaySend'])){
    // pagination
    $limit = 5;
    $page = $_POST['page'];
    $start = (($page - 1) * $limit);

    // Verificar banco de dados
    $sql = "SELECT * FROM t_account LIMIT $start, $limit";
    $result = mysqli_query($con_account, $sql);

    $table =    '<table class="table table-striped caption-top align-middle table-sm">
                    <!-- columns -->
                    </thead>
                        <tr class="table-dark text-white text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Privilege</th>
                            <th scope="col">T-Points</th>
                            <th scope="col-sm-3">Operations</th>
                        </tr>
                    </thead>

                    <!-- data -->
                    <tbody class="text-center">';

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
        $table = $table . '<tr>
                    <th scope="row">' . $row['accountid'] . '</th>
                    <td>' . $row['name'] . '</th>
                    <td>' . $privilege . '</th>
                    <td>' . $row['gd'] . '</th>
                    <td>
                        <button type="button" class="btn btn-sm btn-success" onclick="editAccount(' . $row['accountid'] . ')">
                            Edit
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteAccount(' . $row['accountid'] . ')">
                            Delete
                        </button>
                    </td>
                </tr>';
    }

    // quantidade de contas
    $sql = "SELECT COUNT('id') AS TOTAL FROM t_account";
    $result = mysqli_query($con_account, $sql);

    $count = mysqli_fetch_assoc($result)['TOTAL'];

    if ($count < 1){
        $table = $table .  '<tr>
                                <td colspan="5">There is no registered account</td>
                            </tr>';
    }

    // final table
    $table = $table . '</tbody></table>';

    // start pagination
    $table = $table . '<!-- pagination -->
                        <div class="row m-0 p-0"> 
                            <div class="col-sm-6" >
                                <small class=" text-secondary">Total of ' . $count . ' registered guilds</small>
                            </div>
                            <div class="col-sm-6">
                                <ul class="pagination pagination-sm justify-content-end">';
    // Page list
    if ($count > 0){
        for($i = 1; $i < (($count / $limit) +1); $i++){
            if ($i == $page){
                $table = $table . '<li class="page-item active" aria-current="page"><span class="px-1">' . $i . '</span></li>';
            }else{
                $table = $table . '<li class="page-item"><a class="link-secondary px-1 text-decoration-none" href="#" onclick="displayData(' . $i . ')">' . $i . '</a></li>';
            }                          
        }
    }else{
        $table = $table . '<li class="page-item active" aria-current="page"><span class="px-1">1</span></li>';
    }
    
    
    $table = $table . '</ul>
                    </div>
                </div>';
                                
    echo $table;
}
?>