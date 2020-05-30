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

    
    public function showDetails(){
        //$detail=$this->model->getDetail();
        $this->view->viewDetails();
    }

    public function showFormAdministrator(){

        $this->view->viewFormLogin();
    }
    public function showError(){

        $this->view->viewError();
    }

    


}