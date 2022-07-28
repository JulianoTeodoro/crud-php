<?php 

require 'config.php';
$info = [];
$id = filter_input(INPUT_GET, 'id');

if($id) {
    $sql = $pdo->prepare("SELECT * from usuarios where id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0 ){
        $info = $sql->fetch( PDO::FETCH_ASSOC );
    }
    else {
        header('Location: index.php');
        exit;
    }
}
else {
    header('Location: index.php');
    exit;
}

?>

<h1>Editar</h1>

<form action="editar_action.php" method="POST">

    <input type="hidden" name="id" value="<?= $info['id'] ?>">
    <label for="name">Nome: 
        <input type="text" name="name" value="<?= $info['nome'] ?>">
    </label>
    <label for="email">Email: 
        <input type="Email" name="email" value="<?= $info['email'] ?>">
    </label>
    <input type="submit" value="Enviar">
</form>