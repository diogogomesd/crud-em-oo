<?php
class Contato{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=crud-oo;host=localhost", "root", "");

        echo "conexão ok";
    }
}
?>