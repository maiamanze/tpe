<?php
require_once './views/auth.view.php';
require_once './models/auth.model.php';

class AuthController {
    private $view;
    private $model;

    function __construct() {
        $this->view = new AuthView();
        $this->model = new AuthModel();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];


    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
    }
}