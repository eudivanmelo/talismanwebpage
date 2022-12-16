<?php
if (!isset($_SESSION)){
	ini_set('session.save_path', '/tmp'); 
	session_start();
}

// Number of accepted attempts
define('ACCEPTED_ATTEMPTS', 5);

// Minutes in which the login will
// be blocked when exceeding the number of attempts
define('BLOCKED_TIME', 30);

// Require connection file for connection with database
require_once('../includes/connection.php');

// Check if the source of the request is from the same application domain
if (isset($_SERVER['HTTP_REFERER']) && ($_SERVER['HTTP_REFERER'] != "http://localhost:8000/admin/login.php")){
    $result = array('code' => '0x00', 'message' => 'Unauthorized request source!');
	echo json_encode($result);
	exit();
}

// Get data from post
$email = (isset($_POST['loginEmail'])) ? $_POST['loginEmail'] : '';
$password = (isset($_POST['loginPassword'])) ? $_POST['loginPassword'] : '';

// Verify if data is not empty
if (empty($email)){ // Email
    $result = array('code' => '0x01', 'message' => 'Email cannot be blank, please enter a valid email!');
    echo json_encode($result);
    exit();
}
if (empty($password)){ // Password
    $result = array('code' => '0x02', 'message' => 'Password cannot be blank, please enter a valid password!');
    echo json_encode($result);
    exit();
}

// Verify email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $result = array('code' => '0x03', 'message' => 'Invalid email format, try this format: "name@email.com"');
    echo json_encode($result);
    exit();
}

// Checks if the user has already exceeded the number of wrong attempts for the day
$log_connection = DB_Log::getInstance();
$sql = "SELECT count(*) AS attempts, MINUTE(TIMEDIFF(NOW(), MAX(data_time))) AS min ";
$sql .= "FROM t_panel_log WHERE ip = ? and DATE_FORMAT(data_time,'%Y-%m-%d') = ? AND blocked = ?";
$stm = $log_connection->prepare($sql);
$stm->bindValue(1, $_SERVER['SERVER_ADDR']);
$stm->bindValue(2, date('Y-m-d'));
$stm->bindValue(3, 'YES');
$stm->execute();
$result = $stm->fetch(PDO::FETCH_OBJ);
 
if (!empty($result->attempts) && intval($result->min) <= BLOCKED_TIME){
	$_SESSION['attemps'] = $result->attempts;
    $result = array('code' => '0x04', 'message' => 'You have exceeded the limit of '.ACCEPTED_ATTEMPTS.' attempts, login blocked by '.BLOCKED_TIME.' minutes!');
	echo json_encode($result);
	exit();
}

// Validate user data with the database
// Start connection with database
$connection = DB_Account::getInstance();
$sql = 'SELECT accountid, name, pwd, email FROM t_account WHERE email = ? AND pv >= ? LIMIT 1';
$stm = $connection->prepare($sql);
$stm->bindValue(1, $email);
$stm->bindValue(2, 9);
$stm->execute();
$result = $stm->fetch(PDO::FETCH_OBJ);

// Validate the password using md5
if(!empty($result) && ($result->pwd == md5($password))){
	$_SESSION['id'] = $result->id;
	$_SESSION['name'] = $result->name;
	$_SESSION['email'] = $result->email;
	$_SESSION['attempts'] = 0;
	$_SESSION['logged'] = 'YES';
}
else{
	$_SESSION['logged'] = 'NO';
	$_SESSION['attempts'] = (isset($_SESSION['attempts'])) ? $_SESSION['attempts'] += 1 : 1;
	$blocked = ($_SESSION['attempts'] == ACCEPTED_ATTEMPTS) ? 'YES' : 'NOT';
 
	// Records the attempt regardless of failure or not
	$sql = 'INSERT INTO t_panel_log (ip, email, origin, blocked) VALUES (?, ?, ?, ?)';
	$stm = $log_connection->prepare($sql);
	$stm->bindValue(1, $_SERVER['SERVER_ADDR']);
	$stm->bindValue(2, $email);
	$stm->bindValue(3, $_SERVER['HTTP_REFERER']);
	$stm->bindValue(4, $blocked);
	$stm->execute();
}

// If logged in, it sends code 'success', otherwise it returns an error message for login
if ($_SESSION['logged'] == 'YES'){
	$result = array('code' => 'success', 'message' => 'Successfully logged in!');
	echo json_encode($result);
	exit();
}
else{
	if ($_SESSION['attempts'] == ACCEPTED_ATTEMPTS){
        $result = array('code' => '0x04', 'message' => 'You have exceeded the limit of '.ACCEPTED_ATTEMPTS.' attempts, login blocked by '.BLOCKED_TIME.' minutes!');
		echo json_encode($result);
		exit();
    }   
	else{
        $result = array('code' => '0x05', 'message' => 'Unauthorized user, you have more '. (ACCEPTED_ATTEMPTS - $_SESSION['attempts']) .' attempt(s) before blocking!');
		echo json_encode($result);
		exit();
    }
}

?>