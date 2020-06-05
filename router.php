<?php

require_once 'controllers/public.controller.php';
require_once 'controllers/auth.controller.php';
require_once 'controllers/admin.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (empty($_GET['action'])) {
    $_GET['action'] = 'home';
}

$action = $_GET['action'];
$parameters = explode('/', $action);

switch ($parameters[0]){
    //Acciones publicas de la pagina

    case 'home':
        $controller = new PublicController();
        $controller -> showHome();
    break;   
    case 'categories':
        $controller = new PublicController();
        $controller -> showCategories();
    break;
    case 'items':
        $controller = new PublicController();
        $controller -> showItems();
    break;
    case 'itemsbycategory':
        $controller = new PublicController();
        $controller -> showItemsByCategories($parameters[1]);
    break;
    case 'details':
        $controller = new PublicController();
        $controller -> showDetails($parameters[1]);
    break;
    
    //Acciones de autentificacion de usuarios

    case 'formlogin':
        $controller = new PublicController();
        $controller -> showFormLogin();
    break;
    case 'logout':
        $controller= new AuthController();
        $controller -> logout();
    break;
    case 'verify':
        $controller= new AuthController();
        $controller -> verification();
    break;
    
    //Acciones de ABM (Administrador)

    case 'administrator':
        $controller = new AdminController();
        $controller -> administration();
    break;    
    case 'newcategorie':
        $controller = new AdminController();
        $controller -> formNewCategorie();
    break;
    case 'addcategorie':
        $controller = new AdminController();
        $controller -> addCategorie();
    break;    
    case 'deletecategorie':
        $controller = new AdminController();
        $controller->deleteCategorie($parameters[1]);
    break;
    case 'formeditcategorie':
        $controller = new AdminController();
        $controller->formEditCategorie($parameters[1]);
    break;
    case 'editcategorie':
        $controller = new AdminController();
        $controller->editCategorie();
    break; 
    case 'newitem':
        $controller = new AdminController();
        $controller -> formNewItem();
    break;
    case 'additem':
        $controller = new AdminController();
        $controller -> addItem();
    break;    
    case 'deleteitem':
        $controller = new AdminController();
        $controller->deleteItem($parameters[1]);
    break;
    case 'formedititem':
        $controller = new AdminController();
        $controller->formEditItem($parameters[1]);
    break;
    case 'edititem':
        $controller = new AdminController();
        $controller->editItem();
    break;                            
    default:
        $controller = new PublicController();
        $controller -> showError();
    break;      
}