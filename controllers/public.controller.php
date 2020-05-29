<?php

require_once 'views/public.view.php';

class PublicController{

    //private $model;
    private $view;

    public function __construct(){

        $this->view = new PublicView;

            
    }

    public function showHome(){

        $this->view->viewHome();
    }

    
    public function showDetails(){

        $this->view->viewDetails();
    }

    public function showError(){

        $this->view->viewError();
    }

    


}