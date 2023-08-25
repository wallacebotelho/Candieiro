<?php
class Garantias {

    private $pdo; 
    public $msgERRO = "";

    public function conectar($nome, $host, $usuario, $senha){
        try {
            $this->pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->msgERRO = $e->getMessage();
        }
    }

    public function consultarGarantia($codigo){
        try {
            // Verificar se a conexão com o banco de dados foi estabelecida
            if (!$this->pdo) {
                throw new Exception('Erro de conexão com o banco de dados.');
            }

            // Preparar a consulta SQL
            $consulta = $this->pdo->prepare("SELECT * FROM garantias WHERE codigo = :codigo");

            // Substituir o parâmetro :codigo pelo valor fornecido
            $consulta->bindValue(':codigo', $codigo, PDO::PARAM_INT);

            // Executar a consulta
            $consulta->execute();

            // Obter o resultado da consulta como um array associativo
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

            // Retornar o resultado da consulta
            return $resultado;
        } catch (Exception $e) {
            $this->msgERRO = $e->getMessage();
            return false;
        }
    }

    // Adicionamos a função dentro da classe Garantias
    public function consultarSerialNumber($serialNumber){
        try {
            // Verificar se a conexão com o banco de dados foi estabelecida
            if (!$this->pdo) {
                throw new Exception('Erro de conexão com o banco de dados.');
            }

            // Preparar a consulta SQL
            $consulta = $this->pdo->prepare("SELECT * FROM garantias WHERE serial_number = :serial_number");

            // Substituir o parâmetro :serial_number pelo valor fornecido
            $consulta->bindValue(':serial_number', $serialNumber, PDO::PARAM_STR);

            // Executar a consulta
            $consulta->execute();

            // Obter o resultado da consulta como um array associativo
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

            // Retornar o resultado da consulta
            return $resultado;
        } catch (Exception $e) {
            $this->msgERRO = $e->getMessage();
            return false;
        }
    }
}
?>
