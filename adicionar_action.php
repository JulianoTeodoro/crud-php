<?php

require "config.php";
$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($nome && $email) {

    $sql = $pdo->prepare('SELECT * from usuarios WHERE email = :email');
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() == 0) {
        $sql = $pdo->prepare("INSERT INTO usuarios(nome, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $nome);
        $sql->bindValue(':email', $email);
    
        $sql->execute();
    
        header("Location: index.php");
        exit;
    }
    else {
        header("Location: adicionar.php");
        exit;
    }

}

else {
    header("Location: adicionar.php");
    exit;
}