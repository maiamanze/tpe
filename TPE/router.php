<?php
require('config.php');
require_once 'controllers/home.controller.php';
require_once 'controllers/auth.controller.php';
require_once 'controllers/admin.controller.php';

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
    case 'administracion':
        $controller= new adminController();
        $controller->showAdmin();
        break;
    case 'eliminarCategoria':
        $controller= new adminController();
        $controller->eliminarCategoria($params[1]);
        break;
    case 'editarCategoria':
        $controller = new adminController();
        $controller->editarCategoria($params[1]);
        break;
    case 'agregarCategoria':
        $controller = new adminController();
        $controller->agregarCategoria(); 
        break;
    case 'agregarItem':
        $controller = new adminController();
        $controller->agregarItem(); 
        break;   
    case 'eliminarItem':
        $controller= new adminController();
        $controller->eliminarItem($params[1]);
        break;  
    case 'showEditarItem':
        $controller = new adminController();
        $controller->showFormEditar($params[1]);
        break;   
    case 'editarItem':
        $controller = new adminController();
        $controller->editarItem($params[1]);
        break;          
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default: 
        $view = new HomeView();
        $view->showError("Error!");
        break;
}