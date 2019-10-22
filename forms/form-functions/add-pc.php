<?php include("../../functions/connectDB.php"); ?>
<?php



$hostname = $_POST['hostname'];
$ip = $_POST['IP'];
$os = $_POST['OS'];
$user = $_POST['user'];
$cpu = $_POST['cpu'];
$ram = $_POST['ram'];
$sn = $_POST['sn'];
$antvirus = $_POST['antvirus'];

$query = "INSERT INTO macs VALUES (null, '$hostname', '$ip', '$os', '$user', null, null, 'manual', '$cpu', '$ram', '$sn', '$antvirus', null, null)";
$result = mysqli_query($connection, $query);

if($result) {
    echo "Computador adicionado.";
} else {
    echo "computador não adicionado";
}
