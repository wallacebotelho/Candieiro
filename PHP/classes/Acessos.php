<?php

class Acessos{

    private $pdo; 
    public $msgERRO = "";

    public function conectar($nome, $host, $usuario, $senha){

        global $pdo;
        global $msgERRO;

        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);

        }
        catch (PDOException $e){
            $msgERRO = $e->getMessage();

        }
    }

    public function cadastrar($nomeA, $email, $senha, $nameLogin, $link){
        
        global $pdo;
        $sql = $pdo->prepare("SELECT id_acesso FROM acessos WHERE nomeA = :n");
        $sql->bindValue(":n", $nomeA);
        $sql->execute();

        if ($sql->rowCount() > 0){
            return false; 
        }
        else{
            $sql = $pdo->prepare("INSERT INTO acessos (nomeA, email, senha, nameLogin, link) VALUES (:n, :e, :s, :l, :h)");
            $sql->bindValue(":n", $nomeA);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", $senha);
            $sql->bindValue(":l", $nameLogin);
            $sql->bindValue(":h", $link);

            $sql->execute();
            return true;
        }
    }

    public function editarAcesso($email, $senha, $nameLogin){
        
        global $pdo;
        $sql = $pdo->prepare("UPDATE acessos SET senha = :s, nameLogin = :l WHERE email = :e");
        $sql->bindValue(":s", $senha);
        $sql->bindValue(":l", $nameLogin);
        $sql->bindValue(":e", $email);

        $sql->execute();
        return true;
    }

    public function deletarAcesso($idAcesso){
        
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM acessos WHERE id_acesso = :id");
        $sql->bindValue(":id", $idAcesso);

        $sql->execute();
        return true;
    }
    public function consultarAcesso($idAcesso){
        
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM acessos WHERE id_acesso = :id");
        $sql->bindValue(":id", $idAcesso);
        $sql->execute();

        $acesso = $sql->fetch(PDO::FETCH_ASSOC);
        return $acesso;
    }
}

?>
