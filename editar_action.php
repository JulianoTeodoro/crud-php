<?php

require 'config.php';
require 'dao/UsuarioDAO.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$usuarioDao = new UsuarioDaoMySql($pdo);


if ($id && $nome && $email) {

    if($usuarioDao->findByID($id) === true) {
        $u = new Usuario();
        $u->setId($id);
        $u->setName($nome);
        $u->setEmail($email);
    
        $usuarioDao->update($u);
        header('Location: index.php');
        exit;             
    }
}
