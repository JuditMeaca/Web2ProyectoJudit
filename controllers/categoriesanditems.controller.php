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
        
        $categories=$this->model->getAllCategories();
        $this->view->viewCategories($categories);
    }

    public function showItems(){
        $items=$this->model->getAllItems();
        $this->view->viewItems($items);
    }

    public function showItemsByCategories(){

        $this->view->viewItemsByCategories();
    }

}