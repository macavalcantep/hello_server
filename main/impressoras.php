<?php include("../functions/connectDB.php"); ?>
<?php session_start(); ?>

<?php
// Verifica o tipo de usuário logado
if ($_SESSION['type'] == "a") {
    include("../functions/header-adm.php");
    $lock_in = " ";
    $lock_out = " ";
} elseif ($_SESSION['type'] == "u") {
    include("../functions/header-user.php");
    $lock_in = "<!--";
    $lock_out = "-->";
} else {
    header("location: /hello/error.php?id=0");
}

// Verifica se o usuário esta logado
if ($_SESSION['status'] == "1") {
    echo "<h2><i><font color='#1a1a1a'> Impressoras </i></h2><br><br>";
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



<?php

// Verify if a page is seted on get method.
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$query = " select * from impressoras";
$result = mysqli_query($connection, $query);

// Cont total results
$total_results = mysqli_num_rows($result);


// Set item by page
$query = "SELECT maxPage FROM config WHERE id='1'";
$result = mysqli_query($connection, $query);
$qtPage = mysqli_fetch_array($result);
$pageQT = $qtPage['maxPage'];



// Number of pages to show the results
$page_nums = ceil($total_results / $pageQT);
// Check begin page
$begin = ($pageQT * $page) - $pageQT;

// New select with limit
$querL = " select * from impressoras limit $begin, $pageQT";
$resultL = mysqli_query($connection, $querL);

$total_intem = mysqli_num_rows($resultL);

?>


<html>
    <body>
        <table class="table table-striped table-hover table-condensed table-sm">

        <?php // Verifica se tem permição para adicionar impressora
        if ($_SESSION['type'] == "a") { ?>

             <tr><a title="Adiciona nova impressora" class="link-new-pc" onClick="window.open('../forms/add-printer.php','ping',' width=600,height=550 ')">
            <img src="../img/buttons/add-pc.png" alt="Nova impressora"></a></tr>
            
        <?php 
    } ?>
            
            <tr>
                <th class="table-header">ID</th>
                <th class="table-header">Modelo</th>
                <th class="table-header">Numero de serie</th>
                <th class="table-header">Troca do toner</th>
                <th class="table-header">Hostname</th>
                <th class="table-header">IP</th>
                <th class="table-header">On/Off</th>
                <?php echo $lock_in ?> <th class="table-header">Opções</th> <?php echo $lock_out ?>
            </tr>
            <?php while ($prints = mysqli_fetch_array($resultL)) {
                echo "<tr>";
                echo "<td><center>" . $prints['id'] . "</center></td>";
                echo "<td><center>" . $prints['Model'] . "</center></td>";
                echo "<td><center>" . $prints['SN'] . "</center></td>";
                echo "<td><center>" . $prints['tonner'] . "</center></td>";
                echo "<td><center>" . $prints['hostname'] . "</center></td>";
                echo "<td><center><a target='_blank' href='//" . $prints['ip'] . "'>". $prints['ip'] ."</a></center></td>";



                $hostnameToUpdate = $prints['hostname'];
                $ipToUpdate = $prints['ip'];

                if (PHP_OS == "Linux") {
                    include("../functions/hostLinux.php");
                } elseif (PHP_OS == "WINNT") {
                    include("../functions/hostWindows.php");
                }

                ?>

            <td>
                <center>
                <?php echo $lock_in ?>
                      <a target="_blank" onClick="window.open('moreInfo.php?host=<?=$prints['hostname']?>&p=pt','ping',' width=900,height=720')">
                    <img src="../img/buttons/info.png" title="Mais informaçõesr"></a>
                    <?php echo $lock_out ?>

                    <?php echo $lock_in ?>
                      <a target="_blank" onClick="window.open('../functions/removeDbRegisters.php?p=dp','ping',' width=600,height=250')">
                    <img src="../img/buttons/delete.png" title="Remover computador"></a>
                    <?php echo $lock_out ?>

                </center>
            </td>
            <?php 
        }
        echo "</tr>"; ?>

        </table>
        <?php
        $next = $page + 1;
        $previous = $page - 1;


        if ($total_results == 0) {
            echo "Nenhum registro encontrado";
        } else { ?>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <?php
                if ($previous != 0) { ?>
                  <a class="page-link" href="hosts.php?page=<?= $previous ?>">Previous</a></li>
                <?php 
            } ?>


              <?php
              // Show pagination
                for ($i = 1; $i < $page_nums + 1; $i++) { ?>
                <li class="page-item"><a class="page-link" href="hosts.php?page=<?= $i ?>"><?php echo $i; ?></a></li>
              <?php 
            } ?>
              <li class="page-item">
                <?php
                // previous value is "!="
                if ($next != 0) { ?>
                  <a class="page-link" href="hosts.php?page=<?= $next ?>">Next</a></li>
                <?php 
            } ?>

            </ul>
          </nav>
        <?php 
    } ?>


<?php include("../functions/footer.php"); ?>