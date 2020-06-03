<?php

require_once 'views/public.view.php';
require_once 'models/public.model.php';


class PublicController{

    private $model;
    private $view;

    public function __construct(){

        $this->view = new PublicView;
        $this->model = new PublicModel;       
    }

    public function showHome(){

        $this->view->viewHome();
    }

    
    public function showDetails($id){
        $detail=$this->model->getDetail($id);
        $this->view->viewDetails($detail);
    }

    public function showFormLogin(){

        $this->view->viewFormLogin();
    }
    public function showError(){

        $this->view->viewError();
    }

    


}