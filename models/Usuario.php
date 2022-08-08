<?php

class Usuario {
    private int $id;
    private string $name;
    private string $email;

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = trim($id);
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = ucwords(trim($name));
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = strtolower(trim($email));
    }

}

interface UsuarioDao {
    public function add(Usuario $u);
    public function findAll();
    public function findByID(int $id);
    public function findByEmail(string $email);
    public function update(Usuario $u);
    public function delete(int $id);
}