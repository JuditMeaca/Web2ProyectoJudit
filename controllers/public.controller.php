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

    
    public function showDetails($idproduct){
        $detail=$this->model->getDetail($idproduct);
        $this->view->viewDetails($detail);
    }

    public function showFormAdministrator(){

        $this->view->viewFormLogin();
    }
    public function showError(){

        $this->view->viewError();
    }

    


}