<?php

include "config.php";

$sql = $pdo->prepare('SELECT * from usuarios');
$sql->execute();
$dados = $sql->fetchAll( PDO::FETCH_ASSOC );

?>

<a href="adicionar.php">Adicionar usuario</a>

<table border="1" width="100%">

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    
    <?php foreach($dados as $dado): ?>
        <tr>
            <td>  <?= $dado['id'] ?> </td>
            <td>  <?= $dado['nome'] ?> </td>
            <td>  <?= $dado['email'] ?>  </td>
            <td>  <a href="editar.php?id=<?=$dado['id']?>">Editar</a> | <a href="remover.php?id=<?=$dado['id']?>">Remover</a> </td>

        </tr>
    <?php endforeach ?>

</table>