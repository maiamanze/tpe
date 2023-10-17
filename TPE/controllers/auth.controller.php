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

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
    }

    public function auth() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hasheada = password_hash($password, PASSWORD_BCRYPT);

        if (!empty($email) && !empty($password)) {
            $usuario = $this->model->getUsuario($email);
            if ($usuario && password_verify($password, $usuario->password)) { //si está en la db
                $this->login($usuario);
            } else if ($usuario && !password_verify($password, $usuario->password)) { 
                $this->view->showLogin("Contraseña incorrecta");
                return;
            } else if (!$usuario) { //si no está en la db
                $nuevo = $this->model->addUsuario($email, $hasheada);  
                $this->login($nuevo); 
            }  
            header('Location: ' . BASE_URL . 'home');
        } else {
            $this->view->showLogin("Complete todos los campos");
            return;
        }
    }

    public function login($usuario) {
        session_start();

        if ($usuario->admin == 1) {
            $_SESSION['ADMIN'] = true;
        } else  {
            $_SESSION['ADMIN'] = false;
        }

        $_SESSION['horaLogin'] = date("H:i");
        $_SESSION['ID'] = $usuario->id;
        $_SESSION['EMAIL'] = $usuario->email;
        $_SESSION['logueado'] = true;
    }
}