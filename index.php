<?php
//puxando a classe 
include 'contato.class.php';
//instanciando a classe
 $contato = new Contato();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>
<body>
    <a href="add.html">ADICIONAR CONTATO</a>
    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </tr>
        <?php
            $lista = $contato->getAll();
            foreach($lista as $item):
        ?>
        <tr>
                <td><?php echo $item['id'];?></td>
                <td><?php echo $item['nome'];?></td>
                <td><?php echo $item['email'];?></td>
                <td>
                    <a href="editar.php?id=<?php echo $item['id']; ?>">[ Editar ]</a> - 
                    <a href="excluir.php?id=<?php echo $item['id']; ?>">[ Excluir ]</a>
                </td>
        </tr>
            <?php endforeach; ?>
    
    </table>
</body>
</html>