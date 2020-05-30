<?php

require_once 'views/categoriesanditems.view.php';
require_once 'models/categoriesanditems.model.php';

class CategoriesAndItemsController{

    private $model;
    private $view;

    public function __construct(){

        $this->view = new CategoriesAndItemsView;
        $this->model = new CategoriesAndItemsModel;
      
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