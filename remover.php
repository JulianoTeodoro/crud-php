<?php

require 'config.php';
require 'dao/UsuarioDAO.php';
$usuarioDao = new UsuarioDaoMySql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id) {

    if($usuarioDao->findByID($id) === true) {
        $usuarioDao->delete($id);
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