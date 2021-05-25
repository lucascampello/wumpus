<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mundo do Wumpus</title>
        <link type="text/css" rel="stylesheet" media="screen" href="css/main.css" />
        <script src="js/ajax.js"></script>
    </head>
    <body>
        <div id="content">
            <div id="jogo">
                <?php
                    $mapa = 1;
                    echo "<script>iniciar(".$mapa.")</script>";
                ?>
            </div>
            <br clear="all"/>
            <button type="button" onclick="jogar()">Jogar</button>
        </div>
    </body>
</html>