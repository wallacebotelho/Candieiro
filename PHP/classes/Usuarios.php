<?php 
class Usuarios {
    private $pdo;
    private $msgERRO;

    public function conectar($nome, $host, $usuario, $senha) {
        try {
            $this->pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Erro de conexão: " . $e->getMessage());
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha) {
        try {
            $sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
            $sql->bindValue(":e", $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return false;
            } else {
                $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
                $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
                $sql->bindValue(":n", $nome);
                $sql->bindValue(":t", $telefone);
                $sql->bindValue(":e", $email);
                $sql->bindValue(":s", $hashedSenha);
                $sql->execute();
                return true;
            }
        } catch (PDOException $e) {
            throw new Exception("Erro ao cadastrar: " . $e->getMessage());
        }
    }

    public function logar($email, $senha) {
        try {
            $sql = $this->pdo->prepare("SELECT id_usuario, senha FROM usuarios WHERE email = :e");
            $sql->bindValue(":e", $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $dado = $sql->fetch();
                if (password_verify($senha, $dado['senha'])) {
                    session_start();
                    $_SESSION['id_usuario'] = $dado['id_usuario'];
                    return true; // Logado com sucesso
                } else {
                    // Pode adicionar um registro de tentativa de login mal-sucedido aqui
                    return false; // Credenciais inválidas
                }
            } else {
                // Pode adicionar um registro de tentativa de login mal-sucedido aqui
                return false; // Credenciais inválidas
            }
        } catch (PDOException $e) {
            throw new Exception("Erro ao tentar fazer login: " . $e->getMessage());
        }
    }

    // adicionar outras funções aqui

    public function setMsgErro($message) {
        $this->msgERRO = $message;
    }
}

?>