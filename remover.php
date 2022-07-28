<?php

require 'config.php';

$id = filter_input(INPUT_GET, 'id');

if($id) {

    $sql = $pdo->prepare('SELECT * from usuarios WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $sql = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();   
        header('Location: index.php');
        exit;         
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