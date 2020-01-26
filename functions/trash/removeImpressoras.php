<?php include("connectDB.php"); ?>

<?php

$id = $_POST['id'];
$query = "DELETE FROM impressoras WHERE id='$id'";
$result = mysqli_query($connection, $query);
if($result) {
        echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
            echo "<html>";
            echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
            echo "<title>Hello 0.1</title>";
            echo "<body>";
            echo "<center><p>Impressora deletada !</p><br>";
            echo "</body>";
            echo "</html>";
} else {
    echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
            echo "<html>";
            echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
            echo "<title>Hello 0.1</title>";
            echo "<body>";
            echo "<center><p>Erro ao deletar</p><br>";
            echo "</body>";
            echo "</html>";
}

?>