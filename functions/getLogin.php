<?php

include 'connectDB.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

//cripto
$passwordC = md5($pass);

$query = "SELECT * FROM login WHERE email = '{$email}' and password = '{$passwordC}'";
$result = mysqli_query ( $connection, $query );
$string = mysqli_fetch_array($result);

if (mysqli_num_rows ( $result ) > 0) {
	session_start ();
	$_SESSION ['status'] = "1"; 
    $_SESSION ['type'] = $string['type'];
    

	header ( "LOCATION: /hello/main/adm.php" );
	die ();
} else {
	header ( "LOCATION: /hello/error.php?id=0" );
}

?>
