<?php

class HomeView {
    public function showHome($muebles, $categorias) {
        require_once './templates/header.phtml';
        require('./templates/productosHome.phtml');
        require('./templates/footer.phtml');
    }

    public function showError($error) {
        require('./templates/error.phtml');
    }

    public function ShowForCategoria($muebles){
        require_once './templates/header.phtml';
        require('./templates/productosHome.phtml');
        require('./templates/footer.phtml');
    }

    public function showProduct($producto, $categorias) {
        require_once './templates/header.phtml';
        require('./templates/individual.phtml');
        require('./templates/footer.phtml');
    }
}