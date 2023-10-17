<?php

class adminView {
    public function showAdmin($categorias, $items){
        require_once ('./templates/base.phtml');
        require_once ('./templates/header.phtml');
        require_once('./templates/adminCategorias.phtml');
        require_once('./templates/adminItems.phtml');
        require_once('./templates/footer.phtml');
    }

    public function showFormEditar($idproducto) {
        require_once ('./templates/base.phtml');
        require_once ('./templates/header.phtml');
        require_once('./templates/editarItem.phtml');
        require_once('./templates/footer.phtml');
    }

    public function showError($error) {
        require_once ('./templates/base.phtml');
        require('./templates/header.phtml');
        require('./templates/error.phtml');
    }
}