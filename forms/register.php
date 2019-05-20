<?php session_start(); ?>
<?php include("../functions/connectDB.php"); ?>

<?php 
if($_SESSION['type'] == "a") {
    include("../functions/header-adm.php");
} elseif($_SESSION['type'] == "u") {
    include("../functions/header-user.php");
} else {
    header("location: /hello/error.php?id=0");
} 

$params = $_GET['p'];

switch($params) {

    case 'u': 

//Checking if session has started -->
if($_SESSION['status'] == "1") {
    echo "<h2><i> Novo Usuário  </i></h2><br><br>";
} else {
    header("location: /hello/error.php?id=0");
} 
?>

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="/hello/css/rms.css" rel="stylesheet">
        <link href="/hello/css/bootstrap.css" rel="stylesheet">
        <title>Hello 0.1</title>
    </head>
    <body>
        <div align="center">
            <form role="form" action="form-functions/register.php?p=u" method="post" id="login-form">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="E-mail:">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="org" placeholder="Organização">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="dep" placeholder="Departamento">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Senha">
                </div>
                <br>
                <div class="form-group">
                    <p>Selecione</p><br>
                    <select name="type" form="login-form">
                        <option value="a">Administrador</option>
                        <option value="u">Usuário</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <input class="m-btn" type="submit" name="save" value="Registrar">
                </div>
            </form>
        </div>
    </body>
</html>


<?php include("../functions/footer.php");

break;

case 'f': 
//Checking if session has started -->
if($_SESSION['status'] == "1") {
    echo "<h2><i> Novo Funcionário  </i></h2><br><br>";
} else {
    header("location: /hello/error.php?id=0");
} 
?>

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="/hello/css/rms.css" rel="stylesheet">
        <link href="/hello/css/bootstrap.css" rel="stylesheet">
        <title>Hello 0.1</title>
    </head>
    <body>
        <div align="center">
            <form role="form" action="form-functions/register.php?p=f" method="post" id="login-form">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="E-mail:">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="org" placeholder="Organização">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="dep" placeholder="Departamento:">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pos" placeholder="Posição:">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="man" placeholder="Gerente:">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="tel" placeholder="Telefone:">
                </div>
                <br>
                <br>
                <div class="form-group">
                    <input class="m-btn" type="submit" name="save" value="Registrar">
                </div>
            </form>
        </div>
    </body>
</html>


<?php
}
?>



