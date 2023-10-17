<?php

class HomeView {
    public function showHome($muebles, $categorias) {
        require_once ('./templates/base.phtml');
        require_once './templates/header.phtml';
        require_once('./templates/productosHome.phtml');
        require_once('./templates/footer.phtml');
    }

    public function showError($error) {
        require('./templates/error.phtml');
    }

    public function ShowForCategoria($muebles,$categorias){
        require_once ('./templates/base.phtml');
        require_once './templates/header.phtml';
        require_once('./templates/productosHome.phtml');
        require_once('./templates/footer.phtml');
    }

    public function showProduct($producto, $categorias,$categoriaProducto) {
        require_once ('./templates/base.phtml');
        require_once ('./templates/header.phtml');
        require_once('./templates/individual.phtml');
        require_once('./templates/footer.phtml');
    }
}