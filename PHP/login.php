<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../Img/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Erro 403 - Acesso Proibido</title>
    <!-- Importação Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>

<?php

require_once 'classes/Usuarios.php';

if (isset($_POST['email'], $_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {
        try {
            $usuario = new Usuarios();
            $usuario->conectar("candieiros_login", "localhost", "root", "");

            if ($usuario->logar($email, $senha)) {
                header("location: home.php");
                exit;
            } else {
                echo '
                <div class="justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div>
                                <div class="card-body text-center">
                                    <h1 class="mb-4">Erro 403</h1>
                                    <p class="lead">Acesso Proibido</p>
                                    <p>Você não tem permissão para acessar esta página.</p>
                                    <a href="../index.html" class="btn btn-primary">Voltar à página inicial</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } catch (Exception $e) {
            echo '<div class="msg-erro">Erro ao conectar: ' . $e->getMessage() . '</div>';
        }
    } else {
        echo '<div class="msg-erro">Preencha Todos os Campos!</div>';
    }
}

?>

</body>
</html>
