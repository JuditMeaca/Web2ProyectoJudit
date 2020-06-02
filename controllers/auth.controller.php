<?php

require_once 'views/auth.view.php';
require_once 'models/auth.model.php';

class AuthController{

    private $model;
    private $view;

    public function __construct(){

        $this->view = new PublicView;
        $this->model = new PublicModel;       
    }

    public function login(){

    }

    public function logout(){

    }

    public function verification(){
        
    }
}