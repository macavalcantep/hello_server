<?php

include("../../functions/connectDB.php");


$param = $_GET['p']; // Paramentro para o switch
$email = $_POST['email'];
$name = $_POST['name'];
$org = $_POST['org'];
$dep = $_POST['dep'];


  switch($param) {
    case 'u':

//Verify if user has been registered.
$query0 = "SELECT email FROM login WHERE email='$email'";
$result0 = mysqli_query($connection, $query0);

if(mysqli_num_rows($result0) > 0) {
           echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
            echo "<html>";
            echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
            echo "<title>Hello 0.1</title>";
            echo "<body>";
            echo "<center><p>Usuário já registrado</p><br>";
            echo "<a href='/hello/idex.html'>Voltar</a></center>";
            echo "</body>";
            echo "</html>";;
} else {
  $pass = $_POST['pass'];
  $type = $_POST['type'];
  
  //cripto
  $passwordC = md5($pass);
  
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
    break;
    case 'f':

    //Verify if user has been registered.
$query0 = "SELECT email FROM funcionarios WHERE email='$email'";
$result0 = mysqli_query($connection, $query0);

if(mysqli_num_rows($result0) > 0) {
           echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
            echo "<html>";
            echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
            echo "<title>Hello 0.1</title>";
            echo "<body>";
            echo "<center><p>Funcionário já registrado</p><br>";
            echo "<a href='/hello/main/funcionarios.php'>Voltar</a></center>";
            echo "</body>";
            echo "</html>";;
} else {

  $name = $_POST['name'];
  $dep = $_POST['dep'];
  // Para funcionários.
  $position = $_POST['pos'];
  $manager = $_POST['man'];
  $tel = $_POST['tel'];
  
  $query = "INSERT INTO funcionarios VALUES (null,'$name','$email','$org','$dep','$position', '$manager', '$tel')";
  $result = mysqli_query($connection, $query);
  
  if($result) {
            echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
            echo "<html>";
            echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
            echo "<title>Hello 0.1</title>";
            echo "<body>";
            echo "<center><p>Funcionário registrado com sucesso</p><br>";
            echo "<a href='/hello/main/funcionarios.php'>Voltar</a></center>";
            echo "</body>";
            echo "</html>";
  } else {
            echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
            echo "<html>";
            echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
            echo "<title>Hello 0.1</title>";
            echo "<body>";
            echo "<center><p>Erro ao registrar funcionário</p><br>";
            echo "<a href='/hello/main/funcionarios.php'>Voltar</a></center>";
            echo "</body>";
            echo "</html>";
  }
}
 break; 


} //Switch
