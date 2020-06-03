<?php

require_once 'views/admin.view.php';
require_once 'models/admin.model.php';

class AdminController{

    private $model;
    private $view;

    public function __construct(){

        $this->view = new AdminView;
        $this->model = new AdminModel;       
    }

    public function administration(){
        $categories = $this->modelCategories->getAllCategories();
        $items = $this->modelItems->getAllItems();
        $this->view->viewConfiguration($categories, $items); 
    }

    public function showFormAddArea(){
        $this->view->viewFormArea();
    }
