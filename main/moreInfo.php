<?php include("../functions/connectDB.php"); ?>
<?php session_start(); ?>

<?php

if ($_SESSION['type'] == "a") {

} elseif ($_SESSION['type'] == "u") {

} else {
    header("location: /hello/error.php?id=0");
}

if ($_SESSION['status'] == "1") {

} else {
    header("location: /hello/error.php?id=0");
}

$host = $_GET['host'];

// Get IP from macs
$query = "SELECT ip, processador, ram, SN, AVirus, patrimonio, observacao FROM macs WHERE hostname='$host'";
$result = mysqli_query($connection, $query);
$results = mysqli_fetch_array($result); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mais Informações</title>
    <link rel="stylesheet" href="/hello/css/bootstrap.css">
    <link href="/hello/css/minfo.css" rel="stylesheet">
</head>
<body>
    <h1><?= $host ?></h1>

    <?php

     $hostnameToUpdate = $host;
     $ipToUpdate = $results['ip'];
    //  $resultPing = include("../functions/hostWindows.php");

    $OS = PHP_OS;

    if($OS == "Linux") {
        ?>
        <p class="ip">IP: <?= $results['ip'] ?> | Staus: <?php include("../functions/hostLinux.php"); ?></p>
        <?php
    } else {
        ?>
        <p class="ip">IP: <?= $results['ip'] ?> | Staus: <?php include("../functions/hostWindows.php"); ?></p>
        <?php
    }
    ?>

    <div class="table-infos">
        <table class="table table-striped">
            <tr>
                <td>Processador:</td>
                <td><?=$results['processador']?></td>
            </tr>
            <tr>
                <td>Momoria RAM:</td>
                <td><?=$results['ram']?></td>
            </tr>
            <tr>
                <td>Numero Serial:</td>
                <td><?= $results['SN'] ?></td>
            </tr>
            <tr>
                <td>Patrimônio:</td>
                <td><?=$results['patrimonio']?></td>
            </tr>
            <tr>
                <td>AntiVirus:</td>
                <td><?= $results['AVirus'] ?></td>
            </tr>
        </table>
    </div>
  
    
        <!-- Entrada de informaçao de Observação-->
        <form action="../functions/moreInfoAlterDB.php?" method="GET">
            <textarea class="moreInfo-txtarea" name="values" cols="70" rows="4"placeholder="Observações:<?= $results['observacao'] ?>"></textarea> 
            <!-- <input class="txt-in" type="text" name="values"> -->
            <input type="hidden" name="host" value="<?= $host ?>">
            <input type="hidden" name="param" value="obis">
            <input type="hidden" name="p" value="pc">
            <input class="m-btn" id="btn-txtarea" type="submit" value="Alterar">
        </form>

</body>
</html>





