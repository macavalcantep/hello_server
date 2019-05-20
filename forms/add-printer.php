<?php session_start(); ?>

<?php 
if($_SESSION['status'] == "1") {
  
} else {
    header("location: /hello/error.php?id=0");
} 

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="form-styles.css">
    <title>Adicionar Impressora</title>
</head>

<body>

    <div class="add-pc">
        <form action="form-functions/add-printer.php" id="form-add-pc" method="POST">
            <input type="text" name="hostname" placeholder="Hostname:">
            <input type="text" name="IP" placeholder="IP:">
            <input type="text" name="modelo" placeholder="Modelo:">
            <input type="text" name="sn" placeholder="Numero de série:">
            <input type="text" name="toner" placeholder="Toner:">
        </form>
        <button class="m-btn" form="form-add-pc">Adicionar</button>
    </div>


</body>

</html>