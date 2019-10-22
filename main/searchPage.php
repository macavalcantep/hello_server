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
    echo "<h2><i><font color='#1a1a1a'> Computadores </i></h2><br><br>";
} else {
    header("location: /hello/error.php?id=0");
} 
?>

<?php
$option = $_POST['searchSelect'];
$tag = $_POST['taginput']
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/hello/css/minfo.css" rel="stylesheet">
    <title>Procurar</title>
</head>
<body>

<?php
switch($option) {
    case "user":
        $query = "select * from macs where user='$tag'";
        $result = mysqli_query($connection, $query);
        while ($search = mysqli_fetch_array($result)) {

            echo "<div>";
            echo "<p>Usuário: ".$search['user']."</p>";
            echo "<p>Patrimônio: ".$search['patrimonio']."</p>";
            echo "<p>Hostname: ".$search['hostname']."</p>";
            echo "<p>IP: ".$search['ip']."</p>";
            echo "<p>Sistema operacional: ".$search['os']."</p>";
            echo "<p>Memoria ram: ".$search['ram']."</p>";
            echo "<p>Processador: ".$search['processador']."</p>";
            echo "<p>Numero serial: ".$search['sn']."</p>";
            echo "<p>Antivírus: ".$search['aVirus']."</p>";
            echo "<p>Observação: ".$search['observacao']."</p>";
            echo "</div>";

        }
        break;

    case "ptr":
    $query = "select * from macs where patrimonio='$tag'";
    $result = mysqli_query($connection, $query);
    while ($search = mysqli_fetch_array($result)) {

        echo "<div>";
        echo "<p>Usuário: ".$search['user']."</p>";
        echo "<p>Patrimônio: ".$search['patrimonio']."</p>";
        echo "<p>Hostname: ".$search['hostname']."</p>";
        echo "<p>IP: ".$search['ip']."</p>";
        echo "<p>Sistema operacional: ".$search['os']."</p>";
        echo "<p>Memoria ram: ".$search['ram']."</p>";
        echo "<p>Processador: ".$search['processador']."</p>";
        echo "<p>Numero serial: ".$search['sn']."</p>";
        echo "<p>Antivírus: ".$search['aVirus']."</p>";
        echo "<p>Observação: ".$search['observacao']."</p>";
        echo "</div>";

    }
    break;

    case "host":
    $query = "select * from macs where hostname='$tag'";
    $result = mysqli_query($connection, $query);
    while ($search = mysqli_fetch_array($result)) {

        echo "<div>";
        echo "<p>Usuário: ".$search['user']."</p>";
        echo "<p>Patrimônio: ".$search['patrimonio']."</p>";
        echo "<p>Hostname: ".$search['hostname']."</p>";
        echo "<p>IP: ".$search['ip']."</p>";
        echo "<p>Sistema operacional: ".$search['os']."</p>";
        echo "<p>Memoria ram: ".$search['ram']."</p>";
        echo "<p>Processador: ".$search['processador']."</p>";
        echo "<p>Numero serial: ".$search['sn']."</p>";
        echo "<p>Antivírus: ".$search['aVirus']."</p>";
        echo "<p>Observação: ".$search['observacao']."</p>";
        echo "</div>";

    }
    break;

        
}
?>
    
</body>
</html>