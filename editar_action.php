<?php

require 'config.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $nome && $email) {

    $sql = $pdo->prepare('SELECT * from usuarios WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        
        $sql = $pdo->prepare('UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':nome', $nome);
        $sql->execute();

        header('Location: index.php');
        exit;
    }
    else {
        header('Location: adicionar.php');
        exit;
    }

}
