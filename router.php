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
    default:
        $controller = new PublicController();
        $controller -> showError();
    break; 
      
}