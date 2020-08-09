<?php
//puxando a classe
include 'contato.class.php';
//insataciando a classe
$contato = new Contato();

//pegando email na url senão estiver vazio 
if (!empty($_POST['email'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    //executando função da classe
    $contato->adicionar($nome, $email);

    //redirecionando para pg inicial
    header("Location: index.php");

}
?>