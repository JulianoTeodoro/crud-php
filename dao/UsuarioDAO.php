<?php

require_once 'models/Usuario.php';

class UsuarioDaoMySql implements UsuarioDao {

    private $pdo;

    public function __construct(PDO $engine)
    {
        $this->pdo = $engine;
    }

    public function add(Usuario $u) {

        $sql = $this->pdo->prepare("INSERT INTO usuarios(nome, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
            
        $sql->execute();
        $u->setId($this->pdo->lastInsertId());
        return $u;


    }

    public function findAll() {
        $sql = $this->pdo->prepare('SELECT * from usuarios');
        $sql->execute();
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setEmail($item['email']);
                $u->setName($item['nome']);

                $array[] = $u;
            }
        }

        return $array;
    }

    public function findByID(int $id) {
        $sql = $this->pdo->prepare('SELECT * from usuarios WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        }
        else { 
            return false;
        }
    }

    public function update(Usuario $u) {
        $sql = $this->pdo->prepare('SELECT * from usuarios WHERE id = :id');
        $sql->bindValue(':id', $u->getId());
        $sql->execute();
        if($sql->rowCount() > 0) {
        
            $sql = $this->pdo->prepare('UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id');
            $sql->bindValue(':id', $u->getId());
            $sql->bindValue(':email', $u->getEmail());
            $sql->bindValue(':nome', $u->getName());
            $sql->execute();
            return $u;
        }

    }

    public function delete(int $id) {
        $sql = $this->pdo->prepare('SELECT * from usuarios WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $sql = $this->pdo->prepare('DELETE FROM usuarios WHERE id = :id');
            $sql->bindValue(':id', $id);
            $sql->execute();   
  
        }

    } 

    public function findByEmail(string $email)
    {
        $sql = $this->pdo->prepare('SELECT * from usuarios WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    
    }
}