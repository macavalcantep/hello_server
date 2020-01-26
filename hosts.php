<?php include("functions/connectDB.php"); ?>
<?php session_start(); ?>

<?php
if($_SESSION['type'] == "a") {
    include("functions/header-adm.php");
    $lock_in = " ";
    $lock_out = " ";
} elseif($_SESSION['type'] == "u") {
    include("functions/header-user.php");
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
$version = "1.0.190520"; //CLIENT VERSION
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




<html>
    <body>
    <script src="js/sortable.js"></script>

    <!-- <form action="/hello/main/searchPage.php" method="post">
        <p>Pesquisar por:</p>
        
        <select name="searchSelect" id="searchSelet">
            <option value="user">Nome de usuário</option>
            <option value="ptr">Patrimônio</option>
            <option value="host">Host Name</option>
        </select>

        <input type="text" name="taginput">
        <input type="submit" value="Pesquisar">
    </form> -->


        <table class="table table-striped table-hover table-condensed table-sm sortable tableCos">

        <?php // Verifica se tem permição para adicionar computadores
        if($_SESSION['type'] == "a") { ?>

             <!-- <tr><a title="Adiciona novo computador" class="link-new-pc" onClick="window.open('forms/add-pc.php','ping',' width=600,height=550 ')">
            <img src="img/buttons/add-pc.png" alt="Novo computador"></a></tr> -->
            
        <?php } ?>
            
            <tr>
                <th data-field="id" class="table-header">ID</th>
                <th data-field="ptr" class="table-header">PATRIMÔNIO</th>
                <th data-field="host" class="table-header">HOSTNAME</th>
                <th data-field="so" class="table-header">SO</th>
                <th data-field="ram" class="table-header">RAM</th>
                <th data-field="user" class="table-header">USUÁRIO LOGADO</th>
                <th data-field="dlogin" class="table-header">DATA DE LOGIN</th>
                <th data-field="status" class="table-header">STATUS</th>
                <th data-field="cversion" class="table-header">VERSÃO DO CLIENTE</th>
                <!-- <th class="table-header">On/Off</th> -->
                <?php echo $lock_in ?> <th class="table-header">OPÇÕES</th> <?php echo $lock_out ?>
            </tr>
            <tbody>
            <?php while ($macs = mysqli_fetch_array($resultL)) {
    echo "<tr>";
    echo "<td><center>" . $macs['id'] . "</center></td>";
    echo "<td><center>" . $macs['patrimonio'] . "</center></td>";
    echo "<td><center>" . $macs['hostname'] . "</center></td>";
    echo "<td><center>" . $macs['os'] . "</center></td>";
    echo "<td><center>" . $macs['ram'] . "</center></td>";
    echo "<td><center>" . $macs['user'] . "</center></td>";
    echo "<td><center>" . $macs['date'] . "</center></td>";
    $dOld = $macs['status'];
    $dNow = $day;
    if($dNow < $dOld || ($dNow - $dOld) > $maxDayFinal['maxDay']) {
      echo "<td title='Muitos dias sem utilização' class='table-header'><font color='red'> NOK </font></td>";
    } else {
            echo "<td title='Atualizado recentemente' class='table-header'><font color='green'> OK </font></td>";
    }
    //VERIFY VERSION OF CLIENT INSTALED ON PCS
    $versionInstaled = $macs['vClient'];
    if ($versionInstaled != $version && $versionInstaled != "manual") {
       echo "<td title='Versão desuatalizada, nova versão: $version.' class='table-header'><font color='red'> $versionInstaled </font></td>";
    } else if ($versionInstaled == $version || $versionInstaled == "manual") {
      echo "<td title='Versão mais recente' class='table-header'><font color='green'> $versionInstaled </font></td>";
    }
?>


            <td>
                <center>
                <!-- <?php echo $lock_in ?>
                      <a href="main/hist_s.php?host=<?=$macs['hostname']?>">
                    <img src="img/buttons/historic.png" title="Historico"></a>
                    <?php echo $lock_out ?> -->

                <?php echo $lock_in ?>
                      <a target="_blank" onClick="window.open('main/moreInfo.php?host=<?=$macs['hostname']?>','ping',' width=900 height=700')">
                    <img src="img/buttons/info.png" title="Mais informaçõesr"></a>
                    <?php echo $lock_out ?>

                    <?php echo $lock_in ?>
                      <a target="_blank" onClick="window.open('functions/removeDbRegisters.php?p=dm','ping',' width=600,height=250')">
                    <img src="img/buttons/delete.png" title="Remover computador"></a>
                    <?php echo $lock_out ?>
                    <?php echo $lock_in ?>
                      <a target="_blank" onClick="window.open('hist/hist_index.php?host=<?=$macs['hostname']?>','ping',' width=800,height=600')">
                    <img src="img/buttons/historic.png" title="Histórico"></a>
                    <?php echo $lock_out ?>
                </center>
            </td>
            <?php } echo "</tr>"; ?>
            <tbody>
        </table>





        <?php
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


<?php include("functions/footer.php"); ?>
