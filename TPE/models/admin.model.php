<?php
require_once('model.php');

class adminModel extends Model {

    function getCategorias() {
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    function getItemsConCategorias(){
        $query = $this->db->prepare('SELECT *
                                    FROM productos 
                                    INNER JOIN categoria 
                                    ON productos.categoria = categoria.id');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_OBJ);
        return $items;
    }

    function eliminarCategoria($categoria){
        $query = $this->db->prepare('DELETE FROM `categoria` WHERE id=?');
        $query->execute([$categoria]);
    }

    function eliminarItem($item){
        $query = $this->db->prepare('DELETE FROM `productos` WHERE id=?');
        $query->execute([$item]);
    }

    function editarCategoria($categoriaId, $nombre) {
        $query = $this->db->prepare('UPDATE `categoria` SET `tipo`=? WHERE id=?');
        $query->execute([$nombre, $categoriaId]);
    }

    function editarItem($id, $nuevo) {
        $query = $this->db->prepare("UPDATE productos SET precio = ? WHERE id = ?");
        $query->execute([$nuevo, $id]); 
    }

    function agregarCategoria($nombreCategoria){
       
        $query= $this->db->prepare('INSERT INTO `categoria`( `tipo`) VALUES (?)');
        $query->execute([$nombreCategoria]);
    }

    function agregarItem($nombre, $material, $precio, $imagen, $categoria){
        $query= $this->db->prepare('INSERT INTO `productos`(nombre, material, precio, imagen, categoria) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$nombre, $material, $precio, $imagen, $categoria]);
    }

    
}