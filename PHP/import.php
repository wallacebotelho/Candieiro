<?php

// Configurações do banco de dados
$db_host = 'sql107.infinityfree.com';
$db_name = 'if0_34433024_candieiro';
$db_user = 'if0_34433024';
$db_pass = '5NdTNA2FuW64w8';

// Arquivo CSV
$csv_file = '../garantias.csv';

// Conexão com o banco de dados via PDO
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Função para inserir os dados no banco de dados
function inserirDados($codigo, $serial_number, $nota_compra, $data_emissao, $data_expira, $pdo)
{
    try {
        $stmt = $pdo->prepare("INSERT INTO garantias (codigo, serial_number, nota_compra, data_emissao, data_expira) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$codigo, $serial_number, $nota_compra, $data_emissao, $data_expira]);
    } catch (PDOException $e) {
        echo "Erro ao inserir os dados: " . $e->getMessage() . "\n";
    }
}

// Abrir o arquivo CSV e ler a primeira linha (cabeçalho)
$handle = fopen($csv_file, "r");
if (($data = fgetcsv($handle, 1000, ",")) !== false) {
    // Ignore a primeira linha (cabeçalho)
}

// Importar dados do CSV e inserir no banco de dados
while (($data = fgetcsv($handle, 1000, ",")) !== false) {
    $codigo = $data[0];
    $serial_number = $data[1];
    $nota_compra = $data[2];
    $data_emissao = $data[3];
    $data_expira = $data[4];
    
    // Chame a função para inserir os dados no banco de dados
    inserirDados($codigo, $serial_number, $nota_compra, $data_emissao, $data_expira, $pdo);
}

fclose($handle);

echo "Importação concluída com sucesso!";
?>
