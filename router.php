<?php

require_once 'controllers/public.controller.php';
require_once 'controllers/categoriesanditems.controller.php';
//require_once 'controllers/auth.controller.php';

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
        $controller = new CategoriesAndItemsController();
        $controller -> showCategories();
    break;
    case 'items':
        $controller = new CategoriesAndItemsController();
        $controller -> showItems();
    break;
    case 'itemsbycategory':
        $controller = new CategoriesAndItemsController();
        $controller -> showItemsByCategories($parameters[1]);
    break;
    case 'details':
        $controller = new PublicController();
        $controller -> showDetails($parameters[1]);
    break;
    
    //Acciones de autentificacion de usuarios

    case 'login':
        $controller= new AuthController();
        $controller -> login(); 
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
        $controller = new PublicController();
        $controller -> showFormAdministrator();
    break;
    case 'addcategorie':
    break;
    case 'deletecategorie':
    break;
    case 'editcategorie':
    break;
    case 'additem':
    break;
    case 'deleteitem':
    break;
    case 'edititem':
    break;                           
    default:
        $controller = new PublicController();
        $controller -> showError();
    break; 
      
}