<?php include("../functions/connectDB.php"); ?>
<?php session_start(); ?>

<?php
if($_SESSION['type'] == "a") {
    include("../functions/header-adm.php");
    $lock_in = " ";
    $lock_out = " ";
} elseif($_SESSION['type'] == "u") {
    include("../functions/header-user.php");
    $lock_in = "<!--";
    $lock_out = "-->";
} else {
    header("location: /hello/error.php?id=0");
}
if($_SESSION['status'] == "1") {
    echo "<h2><i><font color='#1a1a1a'> Histórico  </i></h2><br><br>";
} else {
    header("location: /hello/error.php?id=0");
}

$host = $_GET['host'];
echo $host;
?>

<button>Incluir</button>

