<?php
require_once './views/home.view.php';
require_once './models/home.model.php';

class HomeController {
    private $view;
    private $model;

    function __construct() {
        $this->view = new HomeView();
        $this->model = new HomeModel();
    }

    public function showHome() {
        $muebles = $this->model->getMuebles();
        $categorias = $this->model->getCategorias();
        $this->view->showHome($muebles, $categorias);
    }

    public function ShowProductsCategoria($categoria){
        $muebles = $this->model->getMueblesCategoria($categoria);
        $categorias = $this->model->getCategorias();
        $this->view->ShowForCategoria($muebles,$categorias);
    }

    public function showProduct($id) {
        $categorias = $this->model->getCategorias();
        $product = $this->model->getProducto($id);
        $categoriaProducto= $this->model->GetCategoriaIndividual($product->categoria);
        $this->view->showProduct($product, $categorias,$categoriaProducto);
    }
}