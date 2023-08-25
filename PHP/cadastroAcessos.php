<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os valores do formulário
    $idAcesso = $_POST['id_acesso'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nameLogin = $_POST['nameLogin'];

    // Instancia a classe Acessos
    $acessos = new Acessos();

    // Conecta ao banco de dados (substitua as informações de conexão pelos valores corretos)
    $acessos->conectar('nome_do_banco', 'host', 'usuario', 'senha');

    // Chama a função editarAcesso para atualizar o acesso
    if ($acessos->editarAcesso($idAcesso, $email, $senha, $nameLogin)) {
        echo 'Acesso atualizado com sucesso.';
    } else {
        echo 'Erro ao atualizar o acesso.';
    }
}
?>