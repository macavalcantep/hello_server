<?php

  include 'connectDB.php';
  $maxDay = $_GET['maxDay'];

  $query = "UPDATE config SET maxDay='{$maxDay}' WHERE id='1'";
  $result = mysqli_query ( $connection, $query );

    if($result) {  
        header('Location: /hello/config.php');
    } else {
        header('Location: /hello/error.php?id=1');
    }
  