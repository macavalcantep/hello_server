<?php include("../functions/connectDB.php"); ?>
<?php session_start(); ?>

<?php

if($_SESSION['type'] == "a") {
    include("../functions/header-adm.php");
    $lock_in = " ";
    $lock_out = " ";
} elseif($_SESSION['type'] == "u") {
    include("../functions/header-user.php");
    $lock_in = "<!--";
    $lock_out = "-->";
} else {
    header("location: /hello/error.php?id=0");
}

if($_SESSION['status'] == "1") {
    echo "<h2><i><font color='#1a1a1a'> Computadores </i></h2><br><br>";
} else {
    header("location: /hello/error.php?id=0");
} 

?>

<?php
//GET refresh time on DB
$queryRefresh = "SELECT refreshTime FROM config WHERE id='1'";
$resultRefresh = mysqli_query($connection, $queryRefresh);
$time = mysqli_fetch_array($resultRefresh);

?>

<?php header("refresh: " . $time['refreshTime']); ?>

<?php //VARIABLES
$version = "0.1.190213"; //CLIENT VERSION
?>

<?php //Get Time
date_default_timezone_set('America/Sao_Paulo');
$day = date('d'); ?>

<?php
// Checking maxDay on DB
$query = "SELECT maxDay FROM config WHERE id='1'";
$result = mysqli_query ( $connection, $query );
$maxDayFinal = mysqli_fetch_array($result);
?>

<?php

// Verify if a page is seted on get method.
$page = (isset($_GET['page']))? $_GET['page'] : 1;
$query = " select * from macs";
$result = mysqli_query($connection, $query);

// Cont total results
$total_results = mysqli_num_rows($result);


// Set item by page
$query = "SELECT maxPage FROM config WHERE id='1'";
$result = mysqli_query ( $connection, $query );
$qtPage = mysqli_fetch_array($result);
$pageQT = $qtPage['maxPage'];



// Number of pages to show the results
$page_nums = ceil($total_results / $pageQT);
// Check begin page
$begin = ($pageQT * $page) - $pageQT;

// New select with limit
$querL = " select * from macs limit $begin, $pageQT";
$resultL = mysqli_query($connection, $querL);

$total_intem = mysqli_num_rows($resultL);


?>


<?php while ($macs = mysqli_fetch_array($resultL)) { ?>

    <div class="device-box">
        <ul>
            <li><img src="../img/pc-hello.png"></li>
            <li id="hostname" ><a target="_blank" onClick="window.opne('moreInfo.php?host=<?=$macs['hostname']?>&&p=pc','ping',' width=900 height=700')">
            <p><?=$macs['hostname']?></p></a></li>
        </ul>
    </div>

<?php } ?>







<?php //Make pagination page. 
    $next = $page + 1;
    $previous = $page - 1;

        if($total_results == 0 ) {
          echo "Nenhum registro encontrado";
        } else { ?>

          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <?php

                if($previous != 0 ) { ?>
                  <a class="page-link" href="hosts.php?page=<?=$previous?>">Previous</a></li>
                <?php } ?>

              <?php
              // Show pagination
              for($i = 1 ; $i < $page_nums + 1 ; $i++) { ?>
                <li class="page-item"><a class="page-link" href="hosts.php?page=<?=$i?>"><?php echo $i; ?></a></li>
              <?php } ?>

              <li class="page-item">
                <?php
                // previous value is "!="
                if($next != 0 ) { ?>
                  <a class="page-link" href="hosts.php?page=<?=$next?>">Next</a></li>
                <?php } ?>

            </ul>
          </nav>
        <?php }?>
















