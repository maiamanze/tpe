<?php
require_once 'controllers/home.controller.php';
require_once 'controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'FiltroCategoria':
        $controller = new HomeController();
        $controller->ShowProductsCategoria($params[1]);
        break;  
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'producto':
        $controller = new HomeController();
        $controller->showProduct($params[1]);
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default: 
        $view = new HomeView();
        $view->showError("Error de conexión");
        break;
}