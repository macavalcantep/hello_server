<?php
include("../functions/connectDB.php"); 
session_start(); 


if($_SESSION['type'] == "a") {
echo "teste";
} else {
    header("location: /hello/error.php?id=0");
}
if($_SESSION['status'] == "1") {
    echo "<h2><i><font color='#1a1a1a'> HISTORICO </i></h2><br><br>";
} else {
    header("location: /hello/error.php?id=0");
} 


$HOST = $_GET['host'];

echo "<center>Oi o hostname que eup peguei foi" . $HOST . "</center>";