<?php

    session_start();

    if(!isset($_SESSION['id_usuario'])):

        header("location: ../login.html");
        exit;
    endif;


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Candieiro - Home</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" /> <!--Melhoria 01-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="../Img/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../CSS/nav.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/home.css">
    <link rel="stylesheet" type="text/css" href="../CSS/loading.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>

<body>
<div id="loader-wrapper">
		<div id="loader"></div>
</div>	
<header> <!--Melhoria 02 colocar li-->
    <div class="header">
        <div class="logo"><!--Melhoria 03-->
            <img class="logoimg" src="../Img/logo.png" /> <!--Melhoria 04-->
        </div>
        <div class="menu-c">
            <img class="menu-opener" src="../Img/menu.png" />
            <nav>
                <ul> <!--Melhoria 06-->
                    <li><a href="home.php">HOME</a></li> <!--Melhoria 07 colocar li-->
                    <li><a href="garantias.php">GARANTIAS</a></li>
                    <li><a href="chips.php">CHIPS</a></li>
                    <li><a href="cep.php">CEP</a></li>
                    <li><a href="docs.php">DOCS</a></li>
                    <li><a href="gerador.php">GERADOR</a></li>
                    <li><a href="cpf.php">CPF</a></li>
                    <li><a id ="botao" href="../PHP/sair.php">SAIR</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<main>
<div class="main container-fluid">
<iframe allowfullscreen src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTh4kOvKWXFQue-_2pjLZCfIM6e89MtUwnaLwoBkw0Ke8sT9TYloRHOfWoRtTYAyEwSlrWyVKIk7DKo/pubhtml?gid=731423750&amp;single=true&amp;widget=true&amp;;scrolling=no"></iframe>
</div>
</main>

<footer>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/loading.js"></script>
<script src="../js/responsivo.js"></script>
</body>
</html>