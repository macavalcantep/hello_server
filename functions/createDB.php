<link href="/hello/css/bootstrap.css"
      rel="stylesheet">

<?php

$dbuser = $_POST['dbuser'];
$dbpass = $_POST['dbpass'];


$connection = mysqli_connect('localhost', $dbuser, $dbpass, 'mysql');


//Try connect mysql.
if(!$connection) {
    echo "<div class='alert-danger'><center><h1> Erro ao conectar.</h1></center></div>";
} else {
    echo "<div class='alert-success'><center><h1> Conexão OK.</h1></center></div>";
}

//Create database.
$query0 = "CREATE DATABASE hello_client";
$result0 = mysqli_query($connection, $query0);

if($result0) {
    echo "<div class='alert-success'><center><h1>Banco de dados OK.</h1></center></div>";
} else {
    echo "<div class='alert-danger'><center><h1>Erro ao criar banco de dados.</h1></center></div>";
}

$connectionHello = mysqli_connect('localhost', $dbuser, $dbpass, 'hello_client');

//Create table login
$query1 = "CREATE TABLE login (
id int AUTO_INCREMENT,
name varchar(256) NOT NULL,
email varchar(256) NOT NULL,
organization varchar(256),
departament varchar(256),
password varchar(32) NOT NULL,
type varchar(1) NOT NULL,
PRIMARY KEY(id));";

$result1 = mysqli_query($connectionHello, $query1);

//cripto
$passwordC = md5('admin');

//Insert default new user
$query2 = "INSERT INTO login VALUES (null, 'administrator' ,'admin@hello.com', 'hello company', 'IT', '$passwordC', 'a');";
$result2 = mysqli_query($connectionHello, $query2);

if($result1 && $result2) {
    echo "<div class='alert-success'><center><h1>Tabela de login cirada !</h1></center></div>";
} else {
    echo "<div class='alert-danger'><center><h1>Error to create table login.</h1></center></div>";
}

// Cria tabela macs
$query3 = "CREATE TABLE macs (
id int AUTO_INCREMENT,
hostname varchar(100),
ip varchar(16),
os varchar(100),
user varchar(100),
date varchar(10),
status varchar(2),
vClient varchar(10),
processador varchar(100),
ram varchar(10),
sn varchar(32),
aVirus varchar(32),
patrimonio varchar(4),
observacao text,
PRIMARY KEY(id)
);";


$result3 = mysqli_query($connectionHello, $query3);

if($result3) {
    echo "<div class='alert-success'><center><h1>Tabela de maquinas criada !</h1></center></div>";
} else {
    echo "<div class='alert-danger'><center><h1>Erro ao criar tabela ERRO: Table macs.</h1></center></div>";
}

//Create table config
$query4 = "CREATE TABLE config (
id int AUTO_INCREMENT,
maxDay int NOT NULL,
refreshTime int,
maxPage int,
PRIMARY KEY(id));";


$result4 = mysqli_query($connectionHello, $query4);

if($result4) {
    echo "<div class='alert-success'><center><h1>Tabela de configuração criada !</h1></center></div>";
} else {
    echo "<div class='alert-danger'><center><h1>Erro ao criar tabela ERRO: Table config.</h1></center></div>";
}

//Inset maxDay
$query5 = "INSERT INTO config ( id, maxDay, refreshTime, maxPage ) VALUES (1, 1, 40, 10);";
$result5 = mysqli_query($connectionHello, $query5);

if($result5) {
    echo "<div class='alert-success'><center><h1>Configurações definidas com sucesso.</h1></center></div>";
} else {
    echo "<div class='alert-danger'><center><h1>Erro ao definir configurações inicias.</h1></center></div>";
}


?>

<center><a href="/hello/index.html">Home Page</a></center>

















