<?php

require_once 'libs/Router/Router.php';
require_once 'api/categories-api.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo - Categorias
$router->addRoute('categories', 'GET', 'CategoriesApiController', 'getCategories');
$router->addRoute('categories/:ID', 'GET', 'CategoriesApiController', 'getCategorie');
$router->addRoute('categories/:ID', 'DELETE', 'CategoriesApiController', 'deleteCategorie');
$router->addRoute('categories', 'POST', 'CategoriesApiController', 'newCategorie');
$router->addRoute('categories/:ID', 'PUT', 'CategoriesApiController', 'editCategorie');

// define la tabla de ruteo - Items

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);