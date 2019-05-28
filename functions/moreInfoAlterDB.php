<?php include("connectDB.php"); ?>
<?php

    $param = $_GET['param'];
    $hostname = $_GET['host'];
    $values = $_GET['values'];

    switch($param) {

        case "p":
        $query = "UPDATE macs SET processador = '$values' WHERE hostname='$hostname'";
        $result = mysqli_query($connection, $query);
        header("LOCATION: /hello/main/moreInfo.php?host=$hostname&p=pc");
        break;
    
        case "r":
        $query = "UPDATE macs SET ram = '$values' WHERE hostname='$hostname'";
        $result = mysqli_query($connection, $query);
        header("LOCATION: /hello/main/moreInfo.php?host=$hostname&p=pc");
        break;
    
        case "sn":
        $query = "UPDATE macs SET SN = '$values' WHERE hostname='$hostname'";
        $result = mysqli_query($connection, $query);
        header("LOCATION: /hello/main/moreInfo.php?host=$hostname&p=pc");
        break;
    
        case "av":
        $query = "UPDATE macs SET AVirus = '$values' WHERE hostname='$hostname'";
        $result = mysqli_query($connection, $query);
        header("LOCATION: /hello/main/moreInfo.php?host=$hostname&p=pc");
        break;

        case "ptr":
        $query = "UPDATE macs SET patrimonio = '$values' WHERE hostname='$hostname'";
        $result = mysqli_query($connection, $query);
        header("LOCATION: /hello/main/moreInfo.php?host=$hostname&p=pc");
        break;

        case "obis":
        $query = "UPDATE macs SET observacao = '$values' WHERE hostname='$hostname'";
        $result = mysqli_query($connection, $query);
        header("LOCATION: /hello/main/moreInfo.php?host=$hostname&p=pc");
        break;

    }
 





