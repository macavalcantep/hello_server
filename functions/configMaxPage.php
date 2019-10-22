<?php

  include 'connectDB.php';
  $maxPage = $_GET['maxPage'];

  $query = "UPDATE config SET maxPage='{$maxPage}' WHERE id='1'";
  $result = mysqli_query ( $connection, $query );

    if($result) {  
        header('Location: /hello/config.php');
    } else {
        header('Location: /hello/error.php?id=1');
    }