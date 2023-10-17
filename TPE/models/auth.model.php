<?php
require_once('model.php');

class AuthModel extends Model {

    function getCategorias() {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    function getUsuario($email) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addUsuario($email, $password) {
        $query = $this->db->prepare('INSERT INTO usuarios (email, password) VALUES (?, ?)');
        $query->execute([$email, $password]);

        return $this->db->lastInsertId();
    }

    
}