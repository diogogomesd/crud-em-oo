<?php
//puxando a clsse
include 'contato.class.php';
//instanciando a classe
$contato = new Contato();

//verificando o id na url e transferindo para variaveis
if(!empty($_POST['id'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $id = addslashes($_POST['id']);

    //verificando se o email não está vazio
    if(!empty($email)){
        $contato->editar($nome, $email, $id);
    }
    //redirecionando para pg inicial
    header("Location: index.php");
}
?>