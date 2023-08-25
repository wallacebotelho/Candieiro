<?php
require_once 'classes/Usuarios.php';

if (isset($_POST['nome'], $_POST['telefone'], $_POST['email'], $_POST['senha'], $_POST['conf_senha'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $conf_senha = $_POST['conf_senha'];

    if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($conf_senha)) {
        $usuario = new Usuarios();
        try {
            $usuario->conectar("candieiros_login", "localhost", "root", "");

            if ($senha === $conf_senha) {
                if ($usuario->cadastrar($nome, $telefone, $email, $senha)) {
                    echo '<div id="msg-sucesso">Cadastrado com Sucesso! <a href="../index.html">Clique aqui para acessar!</a></div>';
                    exit;
                } else {
                    echo '<div class="msg-erro">Email já cadastrado!</div>';
                }
            } else {
                echo '<div class="msg-erro">Senha e Confirmar Senha não correspondem!</div>';
            }
        } catch (Exception $e) {
            echo '<div class="msg-erro">Erro ao conectar: ' . $e->getMessage() . '</div>';
        }
    } else {
        echo '<div class="msg-erro">Preencha Todos os Campos!</div>';
    }
}
?>
