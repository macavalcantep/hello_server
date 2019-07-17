<?php
include("../functions/connectDB.php");

$query = "SELECT hostname FROM macs";
$result = mysqli_query($connection, $query);

while ($hosts = mysqli_fetch_array($result)) {
    
    foreach($hosts as $host) {
        $query0 = "CREATE TABLE hist_$host ( host varchar(30), h_data varchar(10), note varchar(256), PRIMARY KEY(host));";
        $result = mysqli_query($connection, $query0);
    
        if($result) {
            echo "<p>Sincronização do host $host concluida com sucesso.</p>";
        } else {
            echo "<p>Erro ao sincronizar.</p>";
        }
    }
}