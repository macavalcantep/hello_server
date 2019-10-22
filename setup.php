<!DOCTYPE html>
<html>
    <head>
        <title>Hello 0.1 - Server</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Server to client application.">
        <meta name="author" content="Marco Antonio">
        <meta charset="utf-8">
        <link href="css/rms.css" rel="stylesheet">
        <link rel="icon" href="/hello/img/roboto.png" type="image/x-icon" />
        <link rel="shortcut icon" href="/hello/img/roboto.png" type="image/x-icon" />
    </head>
    <body>
        <center>
            <div id="setup-div-box">
                <div>
                    <center><h1><font color="#5fbed1">Configuração inicial.</font></h1></center>
                </div>
                <center>
                    <div>
                        <form class="forms" action="functions/createDB.php" method="post">
                            <div>
                                <center><font color="#A9A9A9">Por favor insira as informações do seu banco de dados.</font></center>
                            </div>
                            <br>
                            <br>
                            <table>
                                <tr>
                                    <td><input id="setup-boxes" type="text" name="dbuser" placeholder="Usuário BD"></td>
                                </tr>
                                <tr>
                                    <td><input id="setup-boxes" type="password" name="dbpass" placeholder="Senha BD"></td>
                                </tr>
                            </table>
                            <br>
                            <input  id="setup-btn" type="submit" value="Proximo">
                        </form>
                    </div>
                </center>
            </div>
        </center>
    </body>
</html>

