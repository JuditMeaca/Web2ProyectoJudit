<?php

require_once 'views/public.view.php';

class CategoriesAndItemsController{

    //private $model;
    private $view;

    public function __construct(){

            
    }

    public function showCategories(){

        $this->view->viewCategories();
    }

    public function showItems(){

        $this->view->viewItems();
    }

    public function showItemsByCategories(){

        $this->view->viewItemsByCategories();
    }

}