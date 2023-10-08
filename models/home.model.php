<?php

class HomeModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=TPE;charset=utf8', 'root', '');
    }

    function getMuebles() {
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();
        $muebles = $query->fetchAll(PDO::FETCH_OBJ);

        return $muebles;
    }

    function getCategorias() {
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    function getMueblesCategoria($categoria){
        $query = $this->db->prepare('SELECT * FROM productos WHERE categoria=?');
        $query->execute([$categoria]);
        $muebles = $query->fetchAll(PDO::FETCH_OBJ);

        return $muebles;
    }

    function getProducto($id) {
        $query = $this->db->prepare('SELECT * FROM productos WHERE id=?');
        $query->execute([$id]);
        $producto = $query->fetch(PDO::FETCH_OBJ);

        return $producto;
    }
}