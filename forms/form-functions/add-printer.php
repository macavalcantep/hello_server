<?php include("../../functions/connectDB.php"); ?>
<?php



$hostname = $_POST['hostname'];
$ip = $_POST['IP'];
$model = $_POST['modelo'];
$sn = $_POST['sn'];
$toner = $_POST['toner'];

$query = "INSERT INTO impressoras VALUES (null, '$model', '$sn', '$toner', '$hostname', '$ip', null, null)";
$result = mysqli_query($connection, $query);

if($result) {
    echo "Impressora adicionado.";
} else {
    echo "Impressora não adicionado";
}