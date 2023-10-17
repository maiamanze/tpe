<?php

class AuthView {
    public function showLogin($error = null) {
        require_once ('./templates/base.phtml');
        require('./templates/login.phtml');
    }

    public function showError($error) {
        require('./templates/error.phtml');
    }

    public function showHome() {
        require_once ('./templates/base.phtml');
        require_once './templates/header.phtml';
        require_once('./templates/productosHome.phtml');
        require_once('./templates/footer.phtml');
    }
}