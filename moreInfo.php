<?php include("functions/connectDB.php"); ?>
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
$query = "SELECT ip, processador, RAM, SN, AVirus FROM macs WHERE hostname='$host'";
$result = mysqli_query($connection, $query);
$results = mysqli_fetch_array($result); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
        , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/hello/css/bootstrap.css">
    <link href="/hello/css/minfo.css" rel="stylesheet">
</head>
<body>
    <h1><?= $host ?></h1>
    
    <p class="ip">IP: <?= $results['ip'] ?></p>

    <div class="card">

        <div class="labels">
            <p>Processador: <?= $results['processador'] ?></p>
            <p>RAM: <?= $results['RAM'] ?></p>
            <p>S/N: <?= $results['SN'] ?></p>
            <p>Anti-virus: <?= $results['AVirus'] ?></p>
        </div>

 

        <div class="inputs">
            <form class="form-info" action="functions/moreInfoAlterDB.php" method="GET">
                        <input type="text" name="values">
                        <input type="hidden" name="host" value="<?= $host ?>">
                        <input type="hidden" name="param" value="p">
                        <input class="m-btn" type="submit" value="Alterar">
            </form>
        <form action="functions/moreInfoAlterDB.php" method="GET">
                <input class="txt-in" type="text" name="values">
                <input type="hidden" name="host" value="<?= $host ?>">
                <input type="hidden" name="param" value="r">
                <input class="m-btn" type="submit" value="Alterar">
            </form>
            <form action="functions/moreInfoAlterDB.php" method="GET">
                    <input class="txt-in" type="text" name="values">
                    <input type="hidden" name="host" value="<?= $host ?>">
                    <input type="hidden" name="param" value="sn">
                    <input class="m-btn" type="submit" value="Alterar">
                </form>
                <form action="functions/moreInfoAlterDB.php" method="GET">    
                    <input class="txt-in" type="text" name="values">
                    <input type="hidden" name="host" value="<?= $host ?>">
                    <input type="hidden" name="param" value="av">
                    <input class="m-btn" type="submit" value="Alterar">
                </form>
            </div>


    </div>    

</body>
</html>