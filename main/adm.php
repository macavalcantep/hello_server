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



if($_SESSION['status'] == "1") {
    echo "<h2><i><font color='#1a1a1a'> Resumo </i></h2><br><br>";
} else {
    header("location: /hello/error.php?id=0");
} 

$query0 = "SELECT * FROM macs";
$result0 = mysqli_query($connection, $query0);
$num_macs = mysqli_num_rows($result0);

$query1 = "SELECT * FROM macs WHERE os = 'Linux'";
$result1 = mysqli_query($connection, $query1);
$num_macs_linux = mysqli_num_rows($result1);

$query2 = "SELECT * FROM macs WHERE os = 'Windows 7'";
$result2 = mysqli_query($connection, $query2);
$num_macs_w7 = mysqli_num_rows($result2);

$query3 = "SELECT * FROM macs WHERE os = 'Windows 8'";
$result3 = mysqli_query($connection, $query3);
$num_macs_w8 = mysqli_num_rows($result3);

$query4 = "SELECT * FROM macs WHERE os = 'Windows 10'";
$result4 = mysqli_query($connection, $query4);
$num_macs_w10 = mysqli_num_rows($result4);

$query5 = "SELECT * FROM macs WHERE os = 'Windows 8.1'";
$result5 = mysqli_query($connection, $query5);
$num_macs_w81 = mysqli_num_rows($result5);?>


<table class="table table-striped table-hover table-condensed table-sm">
  <tr>
    <?php echo "<td><i>Total de computadores: $num_macs </i></td>"; ?>
  </tr>
  <tr>
    <?php echo "<td><i>Linux: $num_macs_linux </i></td>"; ?>
  </tr>
  <tr>
    <?php echo "<td><i>Windows 7: $num_macs_w7 </i></td>"; ?>
  </tr>
  <tr>
    <?php echo "<td><i>Windows 8: $num_macs_w8 </i></td>"; ?>
  </tr>
  <tr>
    <?php echo "<td><i>Windows 8.1: $num_macs_w81 </i></td>"; ?>
  </tr>
  <tr>
    <?php echo "<td><i>Windows 10: $num_macs_w10 </i></td>"; ?>
  </tr>
</table>






<?php include("../functions/footer.php"); ?>
