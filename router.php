<?php

require_once 'controllers/public.controller.php';
require_once 'controllers/categoriesanditems.controller.php';

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
        $controller -> showItemsByCategories();
    break;
    case 'details':
        $controller = new PublicController();
        $controller -> showDetails();
    break;
    
    //Acciones de autentificacion de usuarios

    case 'login':
    break;
    case 'logout':
    break;
    case 'verify':
    break;
    
    //Acciones de ABM (Administrador)

    case 'administrator':
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