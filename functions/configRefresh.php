  <?php

  include 'connectDB.php';
  $refresh = $_GET['refresh'];

  $query = "UPDATE config SET refreshTime='{$refresh}' WHERE id='1'";
  $result = mysqli_query ( $connection, $query );

    if($result) {  
        header('Location: /hello/config.php');
    } else {
        header('Location: /hello/error.php?id=1');
    }