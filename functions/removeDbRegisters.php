<?php session_start(); ?>

<?php if ($_SESSION['status'] == "1") {
    echo "";
} else {
    header("location: /hello/error.php?id=0");
} ?>

<?php
echo "<link href='/hello/css/rms.css' rel='stylesheet'>";
echo "<link href='/hello/css/bootstrap.css' rel='stylesheet'>";
echo "<link rel='icon' href='/hello/img/roboto.png' type='image/x-icon' />";
$param = $_GET['p'];


switch ($param) {
    case "du": ?>

<html>

<body>
    <br>
    <br>
    <center>
        <font color="red">Por segurança, por favor entre com o numero ID a ser removido.</font>
    </center><br><br>
    <div align="center">
        <form action="removeUser.php" method="post">
            <input type="text" name="id" placeholder="ID do usuário"><br><br>
            <input class="btn btn-danger" type="submit" name="del" value="Delete">
        </form>
    </div>
</body>

</html>



<?php
break;

case "dm": ?>

<html>

<body>
    <br>
    <br>
    <center>
        <font color="red">Por segurança, por favor entre com o numero ID a ser removido.</font>
    </center><br><br>
    <div align="center">
        <form action="removeMacs.php" method="post">
            <input type="text" name="id" placeholder="ID do computador"><br><br>
            <input class="btn btn-danger" type="submit" name="del" value="Delete">
        </form>
    </div>
</body>

</html>

<?php break;

case "dp": ?>

<html>

<body>
    <br>
    <br>
    <center>
        <font color="red">Por segurança, por favor entre com o numero ID a ser removido.</font>
    </center><br><br>
    <div align="center">
        <form action="removeImpressoras.php" method="post">
            <input type="text" name="id" placeholder="ID do computador"><br><br>
            <input class="btn btn-danger" type="submit" name="del" value="Delete">
        </form>
    </div>
</body>

</html>

<?php break;
case "df": ?>
<html>

<body>
    <br>
    <br>
    <center>
        <font color="red">Por segurança, por favor entre com o numero ID a ser removido.</font>
    </center><br><br>
    <div align="center">
        <form action="removeFuncs.php" method="post">
            <input type="text" name="id" placeholder="ID do computador"><br><br>
            <input class="btn btn-danger" type="submit" name="del" value="Delete">
        </form>
    </div>
</body>

</html>
<?php

} ?> 