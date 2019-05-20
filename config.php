<!-- Writed by MARCO ANTONIO CAVALCANTE | macavalcantep@gmail.com -->

<?php session_start(); ?>
<?php include("functions/connectDB.php"); ?>

<?php
if($_SESSION['type'] == "a") {
    include("functions/header-adm.php");
} elseif($_SESSION['type'] == "u") {
    include("functions/header-user.php");
} else {
    header("location: /hello/error.php?id=0");
}

?>

<!-- Checking if session has started -->
<?php if($_SESSION['status'] == "1") {
    echo "<h2><i><font color='#1a1a1a'> Pagina de configuração  </i></h2><br><br>";
} else {
    header("location: /hello/error.php?id=0");
} 

$queryMaxDay = "SELECT maxDay FROM config WHERE id='1'";
$resultMaxDay = mysqli_query($connection, $queryMaxDay);
$maxDayBD = mysqli_fetch_array($resultMaxDay);

$queryRefresh = "SELECT refreshTime FROM config WHERE id='1'";
$resultRefresh= mysqli_query($connection, $queryRefresh);
$Refresh = mysqli_fetch_array($resultRefresh);

$queryMaxPage = "SELECT maxPage FROM config WHERE id='1'";
$resultMaxPage = mysqli_query($connection, $queryMaxPage);
$MaxPage = mysqli_fetch_array($resultMaxPage);



?>

<center>
    <form action="functions/configMaxDay.php" method="get">
        <div class="maxPageForm">
            <table style="width: 500px">
                <tr>
                    <td>
                        <input style="width: 400px " type="text" title="Quantidade de dias permitido sem atulização." name="maxDay" placeholder="Dias selecionados: <?=$maxDayBD['maxDay']?> dia(s)"> 
                    </td>
                    <td>
                        <input type="submit" class="m-btn" value="Salvar">
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <br>
    <form action="functions/configRefresh.php" method="get">
        <div class="maxPageForm">
            <table style="width: 500px">
                <tr>
                    <td>
                        <input style="width: 400px" type="text" title="Segundos para atualização da pagina host" name="refresh" placeholder="Tempo de refresh <?=$Refresh['refreshTime']?>s "> 
                    </td>
                    <td>
                        <input type="submit" class="m-btn" value="Salvar">
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <br>
    <form action="functions/configMaxPage.php" method="get" id="maxPageForm">
        <table>
            <tr>
                <td>
                    Exibição de paginas: <?=$MaxPage['maxPage']?>
                </td>
            </tr>
            <tr>
                <td><br>
                    <select name="maxPage" form="maxPageForm" title="Quantida de paginas a ser exibida na pagina de computadores">
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                    <input class="m-btn"type="submit" name="salvar" value="salvar">
                </td>
            </tr>
        </table>


    </form>
</center>

<?php include("functions/footer.php"); ?>
