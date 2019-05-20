<?php
session_start();

$sessao = $_SESSION['status'];
$id =$_GET['id'];

if ($sessao == 1) {
	$_SESSION['status'] = 0;
	echo "Your out";
	header("LOCATION: index.html");
} else {
    
    switch($id) {
        case 0:
            echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
            echo "<html>";
            echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
            echo "<title>Hello 0.1</title>";
            echo "<body>";
            echo "<center><p>Email ou senha incorretos</p><br>";
            echo "<a href='index.html'>Voltar</a></center>";
            echo "</body>";
            echo "</html>";
        break;
        
        case 1:
            echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
            echo "<html>";
            echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
            echo "<title>Hello 0.1</title>";
            echo "<body>";
            echo "<center><p>Erro ao gravar configuração</p><br>";
            echo "<a href='config.php'>Voltar</a></center>";
            echo "</body>";
            echo "</html>";
        break;

        case 2:
        echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
        echo "<html>";
        echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
        echo "<title>Hello 0.1</title>";
        echo "<body>";
        echo "<center><p>Tempo de login excedido</p><br>";
        echo "<a href='config.php'>Voltar</a></center>";
        echo "</body>";
        echo "</html>";
    break;
    }
}
