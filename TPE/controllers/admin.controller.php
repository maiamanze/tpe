<?php
require_once './views/admin.view.php';
require_once './models/admin.model.php';

class adminController {
    private $view;
    private $model;
    function __construct() {
        $this->view = new adminView();
        $this->model = new adminModel();
    }
    
    public function showAdmin(){
        session_start();
        if (isset($_SESSION['logueado']) && $_SESSION['logueado'] == true && $_SESSION['ADMIN'] == true) {
            $items = $this->model->getItemsConCategorias();
            $categorias= $this->model->getCategorias();
            $this->view->showAdmin($categorias, $items);
        } else {
            $this->view->showError("Usted no está autorizado para ver el contenido de esta pestaña porque no es administrador.");
        }
    }
    
    public function eliminarCategoria($categoria){
        try {
            $this->model->eliminarCategoria($categoria);
            $this->showAdmin();
        } catch (PDOException) {
            $this->view->showError("No se puede eliminar esta categoría porque hay productos que pertenecen a ella.");
        } 
    }

    public function eliminarItem($id){
        $this->model->eliminarItem($id);
        $this->showAdmin();
    }

    public function editarCategoria($categoriaId){
        $nombre = $_POST['nombre'];

        $this->model->editarCategoria($categoriaId, $nombre);
        $this->showAdmin();
    }

    public function showFormEditar($id) {
        $this->view->showFormEditar($id);
    }

    public function editarItem($idproducto){
        $nuevo = $_POST['nuevaImagen'];

        if(empty($nuevo)) {
            $this->view->showError("No se completaron todos los campos");
        } else {
            $this->view->showFormEditar($idproducto);
            $this->model->editarItem($idproducto, $nuevo);
            header('Location: ' . BASE_URL . 'administracion');
        }
    }   

    public function agregarCategoria(){
        $nombreCategoria = $_POST['nombreCategoria'];
        
        $this->model->agregarCategoria($nombreCategoria);
        $this->showAdmin();
    }

    public function agregarItem(){
        $nombre = $_POST['nombre'];
        $material = $_POST['material'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $categoria = $_POST['categoria'];

        if(empty($nombre) || empty($material) || empty($precio)) {
            $this->view->showError("No se completaron todos los campos");
        }else{
            $this->model->agregarItem($nombre, $material, $precio, $imagen, $categoria);
            $this->showAdmin();
        }  
    }
}