<?php
require_once "config.php";
class Cliente
{
    private $id;

    private function setId($email)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM cliente WHERE email = ?");
        $sql->bindValue(1, $email);
        $sql->execute();
        // ->execute(array($email));
        if($sql->rowCount() > 0)
        {
            $sql = $sql->fetch();
            $this->id = $sql['id'];
            return true;
        }
    }

    private function checkEmail($email)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT email FROM cliente WHERE email = ?");
        $sql->execute(array($email));
        if($sql->rowCount() > 0)
        {
            return true;
        }
    }

    public function addCliente($nome, $email, $senha)
    {
        global $pdo;
        $sql = 
        $pdo->prepare("INSERT INTO cliente(nome, email, senha) VALUES (?, ?, ?)")
        ->execute(array(addslashes($nome), addslashes($email), md5($senha)));
        return true;
    }

    public function removerCliente($id)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM cliente WHERE id = ?")
        ->execute(array(addslashes($id)));
        return true;
    }

    public function editarPerfil($nome, $email, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE cliente SET nome = ?, email = ?, senha = ?, nascimento = ? 
        WHERE id = ?")
        ->execute(array($nome, $email, $senha, $this->setId()));
        return true;
    }

    public function login($email, $senha)
    {
        if($this->checkEmail($email))
        {            
            global $pdo;
            $sql = $pdo->prepare("SELECT * FROM cliente WHERE email = ? AND senha = ?;");
            $sql->bindValue(1, $email);
            $sql->bindValue(2, md5($senha));
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                $usuario = $sql->fetch(PDO::FETCH_ASSOC);
                $_SESSION['on'] = $usuario['id'];
                $this->setId($usuario['email']);
                return true;
            }
            else
            {
                echo "<h1>Deu merda!</h1>";
                exit;
            }
        }
    }
}