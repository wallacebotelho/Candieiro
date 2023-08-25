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
    <title>Candieiro - Garantias</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" /> <!--Melhoria 01-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="../Img/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../CSS/nav.css" />
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
<div class="conteiner-fluid">
        <h1 style="text-align: center;">Consulta de Garantias</h1>
        <form class="search-container" action="garantias.php" method="post">
        <input class="form-control" type="text" name="codigo" placeholder="Digite o código" id="search-bar">
        </form>
</div>
    </form>
    <br>

    <table id="dataTable" class="table table-striped">
        <thead>
            <tr>
                <th class="table-primary">Código</th>
                <th class="table-primary">Serial Number</th>
                <th class="table-primary">Nota de Compra</th>
                <th class="table-primary">Data da Emissão</th>
                <th class="table-primary">Data de Expiração</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // garantias.php
            if (isset($_POST['codigo'])) {
                require_once 'classes/Garantias.php'; // Inclua o arquivo com a classe Garantias

                $codigo = $_POST['codigo'];

                $garantias = new Garantias();
                $garantias->conectar('candieiros_login', 'localhost', 'root', '');

                $resultado = $garantias->consultarGarantia($codigo);

                if ($resultado) {
                    echo '<tr>';
                    echo '<td>' . $resultado['codigo'] . '</td>';
                    echo '<td>' . $resultado['serial_number'] . '</td>';
                    echo '<td>' . $resultado['nota_compra'] . '</td>';
                    echo '<td>' . $resultado['data_emissao'] . '</td>';
                    echo '<td>' . $resultado['data_expira'] . '</td>';
                    echo '</tr>';
                } else {
                    echo '<tr><td colspan="5">Nenhum resultado encontrado.</td></tr>';
                }
            }
            ?>
        </tbody>
    </table>
	</div>


<footer>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/loading.js"></script>
<script src="../js/responsivo.js"></script>
<script src="../js/consultagarantia.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>