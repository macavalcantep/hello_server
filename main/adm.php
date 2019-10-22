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
    //echo "<h2><i><font color='#1a1a1a'></i></h2><br><br>";
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
$num_macs_w81 = mysqli_num_rows($result5);

?>


<!-- <table class="table table-striped table-hover table-condensed table-sm">
  <tr>
    <?php //echo "<td><i>Total de computadores: $num_macs </i></td>"; ?>
  </tr>
  <tr>
    <?php //echo "<td><i>Linux: $num_macs_linux </i></td>"; ?>
  </tr>
  <tr>
    <?php //echo "<td><i>Windows 7: $num_macs_w7 </i></td>"; ?>
  </tr>
  <tr>
    <?php //echo "<td><i>Windows 8: $num_macs_w8 </i></td>"; ?>
  </tr>
  <tr>
    <?php //echo "<td><i>Windows 8.1: $num_macs_w81 </i></td>"; ?>
  </tr>
  <tr>
    <?php //echo "<td><i>Windows 10: $num_macs_w10 </i></td>"; ?>
  </tr>
</table> -->




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="hello/css/rms.css">
  <?php echo "<td><i>Total de computadores: $num_macs </i></td>"; ?>
  <script>
    window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer1", {
      animationEnabled: true,
      title: {
        text: "Computadores"
      },
      data: [{
        type: "pie",
        startAngle: 240,
        yValueFormatString: "##0\"\"",
        indexLabel: "{label} {y}",
        dataPoints: [
          {y: <?=$num_macs_linux?>, label: "Linux - "},
          {y: <?=$num_macs_w7?>, label: "Windows 7 - "},
          {y: <?=$num_macs_w81?>, label: "Windows 8.1 - "},
          {y: <?=$num_macs_w10?>, label: "Windows 10 - "},
          /* {y: 1.26, label: "Others"} */
        ]
      }]
    });
    chart.render();

    }
</script>

</head>
<body>
<div id="chartContainer1" style="height: 400px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <?php include("../functions/footer.php"); ?>
</body>
</html>









