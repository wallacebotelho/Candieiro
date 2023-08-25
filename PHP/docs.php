<?php

    session_start();

    if(!isset($_SESSION['id_usuario'])):

        header("location: ../login.html");
        exit;
    endif;


?>
<!-- Consulta -->
<?php
require_once 'classes/Acessos.php';

$acessoEncontrado = false;
$acesso = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o ID de acesso foi enviado pelo formulário
    if (isset($_POST['idAcesso'])) {
        $idAcesso = $_POST['idAcesso'];

        // Cria uma instância da classe Acessos
        $acessos = new Acessos();

        // Conecta ao banco de dados
        $acessos->conectar('candieiros_login', 'localhost', 'root', '');

        // Consulta o acesso com base no ID
        $acesso = $acessos->consultarAcesso($idAcesso);

        if ($acesso) {
            $acessoEncontrado = true;
        }
    }
}
?>
<!--Cadastro  -->
<?php
require_once 'classes/Acessos.php';

$resultadoCadastro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos obrigatórios do formulário foram preenchidos
    if (isset($_POST['senha'])) {
        $nomeA = isset($_POST['nomeA']) ? $_POST['nomeA'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $senha = $_POST['senha'];
        $nameLogin = isset($_POST['nameLogin']) ? $_POST['nameLogin'] : null;
        $link = isset($_POST['link']) ? $_POST['link'] : null;

        // Cria uma instância da classe Acessos
        $acessos = new Acessos();

        // Conecta ao banco de dados
        $acessos->conectar("if0_34433024_candieiro", "sql107.infinityfree.com", "if0_34433024", "5NdTNA2FuW64w8");

        // Realiza o cadastro do acesso
        $resultado = $acessos->cadastrar($nomeA, $email, $senha, $nameLogin, $link);


        // Verifica se o formulário de cadastro foi submetido
    if (isset($_POST['submitCadastro'])) {
        // Processar o formulário de cadastro
        // ...

        // Exibir resultado do cadastro
        if ($resultadoCadastro) {
            echo "<h3>Resultado do Cadastro:</h3>";
            echo "<p>$resultadoCadastro</p>";
        }
    }

        if ($resultado) {
            $resultadoCadastro = "Cadastro realizado com sucesso!";
        } else {
            $resultadoCadastro = "Erro ao cadastrar o acesso. Verifique se o email já está em uso.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Candieiro - DOCS</title>
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

<div class="col py-3 px-lg-5 border bg-light">
                    
<h2>Consulta de Acesso</h2>
                    <form method="POST">
                        <label>ID de Acesso:</label>
                        <select name="idAcesso">
                            <option value="1">Braspag</option>
                            <option value="2">Grupo Paschal</option>
                            <option value="3">Cielo</option>
                            <option value="4">Shipay</option>
                            <option value="5">Fiserv</option>
                            <option value="6">Mega</option>
                            <option value="7">PicPay</option>
                            <?php for ($i = 2; $i <= $totalAcessos; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        <br>
                        <input type="submit" value="Consultar">
                    </form>

                    <?php if ($acessoEncontrado): ?>
                        <h3>Detalhes do Acesso:</h3>
                        <p>Email: <?php echo $acesso['email']; ?></p>
                        <p>Senha: <?php echo $acesso['senha']; ?></p>
                        <p>Nome de Login: <?php echo $acesso['nameLogin']; ?></p>
                        <p>Link: <?php echo $acesso['link']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<footer>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/loading.js"></script>
<script src="../js/responsivo.js"></script>
</body>
</html>