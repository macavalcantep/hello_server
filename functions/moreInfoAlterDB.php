<?php include("connectDB.php"); ?>
<?php

$paramInit = $_GET['p'];

switch($paramInit) {
    case 'pc':

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
        $query = "UPDATE macs SET RAM = '$values' WHERE hostname='$hostname'";
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
 
    case 'pt':

    $param = $_GET['param'];
    $hostname = $_GET['host'];
    $values = $_GET['values'];
    
    switch($param) {
        case "m":
        $query = "UPDATE impressoras SET Model= '$values' WHERE hostname='$hostname'";
        $result = mysqli_query($connection, $query);
        header("LOCATION: /hello/main/moreInfo.php?host=$hostname&p=pt");
        break;
    
        case "t":
        $query = "UPDATE impressoras SET tonner = '$values' WHERE hostname='$hostname'";
        $result = mysqli_query($connection, $query);
        header("LOCATION: /hello/main/moreInfo.php?host=$hostname&p=pt");
        break;

        case "patr":
        $query = "UPDATE impressoras SET patrimonio = '$values' WHERE hostname='$hostname'";
        $result = mysqli_query($connection, $query);
        header("LOCATION: /hello/main/moreInfo.php?host=$hostname&p=pt");
        break;

        case "obs":
        $query = "UPDATE impressoras SET observacao = '$values' WHERE hostname='$hostname'";
        $result = mysqli_query($connection, $query);
        header("LOCATION: /hello/main/moreInfo.php?host=$hostname&p=pt");
        break;
    
    }
}



