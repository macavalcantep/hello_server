<?php

include 'connectDB.php';

$name = $_POST['name'];
$email = $_POST['email'];
$org = $_POST['org'];
$dep = $_POST['dep'];
$pass = $_POST['pass'];
$type = $_POST['type'];

//cripto
$passwordC = md5($pass);

//Verify if user has been registered.
$query0 = "SELECT email FROM login WHERE email='$email'";
$result0 = mysqli_query($connection, $query0);

if(mysqli_num_rows($result0) > 0) {
           echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
            echo "<html>";
            echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
            echo "<title>Hello 0.1</title>";
            echo "<body>";
            echo "<center><p>Usuário ja registrado</p><br>";
            echo "<a href='/hello/register.php'>Voltar</a></center>";
            echo "</body>";
            echo "</html>";;
} else {

  $query = "INSERT INTO login VALUES (null,'$name','$email', '$org', '$dep', '$passwordC', '$type')";
  $result = mysqli_query($connection, $query);

  if($result) {
            echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
            echo "<html>";
            echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
            echo "<title>Hello 0.1</title>";
            echo "<body>";
            echo "<center><p>Usuário registrado com sucesso</p><br>";
            echo "<a href='/hello/users.php'>Voltar</a></center>";
            echo "</body>";
            echo "</html>";
  } else {
    echo "<center><p>Erro ao registrar usuário.</p></center>";
    echo "<a href='/hello/register.php'>Voltar</a>";
  }
}
