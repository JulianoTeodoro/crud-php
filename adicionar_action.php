<?php

require "config.php";
require 'dao/UsuarioDAO.php';

$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$usuarioDao = new UsuarioDaoMySql($pdo);

if ($nome && $email) {

    if($usuarioDao->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setName($nome);
        $novoUsuario->setEmail($email);

        $usuarioDao->add($novoUsuario);
        header("Location: index.php");
        exit;
    }
    else {
        header("Location: index.php");
        exit;        
    }
}
