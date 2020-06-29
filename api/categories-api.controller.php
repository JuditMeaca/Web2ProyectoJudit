<?php
require_once 'models/public.model.php';
require_once 'api/api-view.php';

class CategoriesApiController{

    private $model;
    private $view;
    

    public function __construct(){
        $this->model = new PublicModel;  
        $this->view = new APIview;     
    }

    public function getCategories(){
        $categories=$this->model->getAllCategories();
        return $this->view->response($categories, 200); 
    }
}