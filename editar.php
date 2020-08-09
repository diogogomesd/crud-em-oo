<?php
//puxando a class
include 'contato.class.php';
//insatanciando a classe
$contato = new Contato();

//verificando se veio id na url
if(!empty($_GET['id'])){
    $id = addslashes($_GET['id']);

    //executando função da classe
    $dados  = $contato->getId($id);

    //se o email estiver vazio redireciona para pg inicial
    if(empty($dados['email'])){
        header("Location: index.php");
    }
}
else{
    //depos de executar redireciona para pg inicial
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADICIONAR</title>
</head>
<body>
    <h1>EDITAR</h1>
    <form method="POST" action="edita-ger.php">
        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>" />
        NOME:</br>
        <input type="text" name="nome" value="<?php echo $dados['nome']; ?>" /></br>
        EMAIL:</br>
        <input type="email" name="email" value="<?php echo $dados['email']; ?>" /></br>
        <input type="submit" value="Cadastrar">
    </form>
    
</body>
</html>