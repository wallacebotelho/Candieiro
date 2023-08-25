<!-- Consulta -->
<?php
// Inclua a classe Acessos
include 'classes/Acessos.php';

// Verifique se foi enviada uma consulta via GET
if (isset($_GET['consulta'])) {
    $consulta = $_GET['consulta'];
    $acessos = new Acessos();

    // Faça a conexão com o banco de dados (substitua pelos seus dados de conexão)
    $acessos->conectar('candieiros_login', 'localhost', 'root', '');

    // Realize a consulta e obtenha os resultados como um JSON
    $resultados = $acessos->consultarAcesso($consulta);
    echo json_encode($resultados);
}
?>