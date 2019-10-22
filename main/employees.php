<?php include("../functions/connectDB.php"); ?>
<?php session_start(); ?>


<?php
if($_SESSION['type'] == "a") {
    include("../functions/header-adm.php");
} elseif($_SESSION['type'] == "u") {
    include("../functions/header-user.php");
} else {
    header("location: /hello/error.php?id=0");
}
?>

<?php if($_SESSION['status'] == "1") {
    echo "<h2><i><font color='#1a1a1a'> Funcionarios cadastrados  </i></h2><br><br>";
} else {
    header("location: /hello/error.php?id=0");
}

$query = "SELECT * FROM employees";
$result = mysqli_query($connection, $query);
?>

<a title="Adiciona novo funcionario" href="../forms/register.php?p=f"><img class="add-user-btn" src="../img/buttons/add-pc.png" alt="Adiciona novo Funcionario"></a>

  <table class="table table-striped table-hover table-condensed table-sm">

    <tr>
        <th class="table-header">ID</th>
        <th class="table-header">Nome</th>
        <th class="table-header">Email</th>
        <th class="table-header">Organização</th>
        <th class="table-header">Departamento</th>
        <th class="table-header">Posição</th>
        <th class="table-header">Gerente</th>
        <th class="table-header">Ramal</th>
        <th class="table-header">Opções</th>
    </tr>

<?php
while($logins = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td><center>" . $logins['id'] . "</center></td>";
  echo "<td><center>" . $logins['name'] . "</center></td>";
  echo "<td><center>" . $logins['email'] . "</center></td>";
  echo "<td><center>" . $logins['organization'] . "</center></td>";
  echo "<td><center>" . $logins['departament'] . "</center></td>"; 
  echo "<td><center>" . $logins['position'] . "</center></td>"; 
  echo "<td><center>" . $logins['manager'] . "</center></td>"; 
  echo "<td><center>" . $logins['tel'] . "</center></td>"; 
 ?>
  <td><center><a title="Remove usuário" target="_blank" onClick="window.open('../functions/removeDbRegisters.php?p=du','ping',' width=600,height=300')">
  <img src="../img/buttons/delete.png"></a></center></td><?php
  echo "</tr>";
}

 ?>


  </table>

<?php include("../functions/footer.php"); ?>
