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
    echo "<h2><i><font color='#1a1a1a'> Usuários cadastrados  </i></h2><br><br>";
} else {
    header("location: /hello/error.php?id=0");
}

$query = "SELECT * FROM login";
$result = mysqli_query($connection, $query);
?>

<a title="Adiciona novo usuário" href="/hello/forms/register.php?p=u"><img class="add-user-btn" src="../img/buttons/add-pc.png" alt="Adiciona novo usuário"></a>

  <table class="table table-striped table-hover table-condensed table-sm">

    <tr>
        <th class="table-header">ID</th>
        <th class="table-header">Nome</th>
        <th class="table-header">Email</th>
        <th class="table-header">Organização</th>
        <th class="table-header">Departamento</th>
        <th class="table-header">Tipo de usuário </th>
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
      if($logins['type'] == 'a') {
          echo "<td><center>Administrador</center></td>";
      } elseif($logins['type'] == 'u') {
          echo "<td><center>Usuárior</center></td>";
      } ?>
  <td><center><a title="Remove usuário" target="_blank" onClick="window.open('../functions/removeDbRegisters.php?p=du','ping',' width=600,height=300')">
  <img src="../img/buttons/delete.png"></a></center></td><?php
  echo "</tr>";
}
 ?>


  </table>

<?php include("../functions/footer.php"); ?>
