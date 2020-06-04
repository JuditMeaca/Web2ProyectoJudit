<?php
require_once 'models/public.model.php';
require_once 'views/admin.view.php';
require_once 'helpers/auth.helper.php';

class AdminController{

    private $model;
    private $view;

    public function __construct(){

        $this->view = new Adminview;
        $this->model = new PublicModel; 
        AuthHelper::checkUserLogged();
             
    }

    public function administration(){
        $categories = $this->model->getAllCategories();
        $items = $this->model->getAllItems();
        $this->view->viewConfiguration($categories, $items);
    }

    public function deleteCategorie($id){
        $this->model->delete($id);
        header ('Location: ' . BASE_URL . "administrator");
    }/*

    public function deleteItem($id){
        $this->modelAdmin->deleteProduct($id);
        header ('Location: ' . BASE_URL . "administrator");
    }*/
}