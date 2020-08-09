<?php 
//puxando a classe contato
include 'contato.class.php';
//instanciando a classe
$contato = new Contato();

//pegando id na url se não estiver vazio
if(!empty($_GET['id'])){
    $id = addslashes($_GET['id']);
    
    //executando função da classe
    $contato->excluir($id);   
}
//redirecionando para pg inicial
header("Location: index.php");
?>