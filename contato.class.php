<?php
class Contato{
    //variavel privada que contem a conexao ao bd
    private $pdo;

    //função construtora da classe
    public function __construct(){
        //definir dentro dos parenteses nome do banco local usuário e senha
        $this->pdo = new PDO("mysql:dbname=crud-oo;host=localhost", "root", "");
    }

    //função que adiciona dados na tabela contatos
    public function adicionar($nome, $email){
        if($this->existeEmail($email) == false){
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql= $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return true;
        }
        else{
            return false;

        }
    }
    //função que busca um contao
    public function getNome($email){
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $info = $sql->fetch();
            return $info['nome'];
        }
        else{
            return '';
        }
       
    }
    //função que pega id de um contato
    public function getId($id){
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();           
        }
        else{
            return array();
        }
       
    }
    //função que busca todos os contatos
    public function getAll(){
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }
    //função que altera informação de um contato
    public function editar($nome, $email, $id){
        if($this->existeEmail($email) == false){
            $sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':id', $id);
            $sql->execute();
            
            return true;            
        }
        else{
            return false;
        }
    }
    //função que deleta um contato
    public function excluir($id){
        
            $sql = "DELETE FROM contatos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();           
        
        }
        //função que verifica se o email ja existe
    public function existeEmail($email){
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() >0){
        
            return true;
        }
        else{
            return false;
        }
    }
}
?>