<?php

require_once 'models/user.model.php';
require_once 'views/public.view.php';

class AuthController{

    private $model;
    private $view;

    public function __construct(){

        $this->model = new UserModel;
        $this->view = new PublicView;
    }

    public function verification(){
        $user = $_POST['user'];
        $password = $_POST['password'];


        //busco el usuario 

        $user = $this->model->getUser($user);

        if ($user && password_verify($password, $user->password)){

            //abro sesion y guardo al usuario
            session_start();
            $_SESSION['IS_LOGGED'] = true;
            $_SESSION['ID_USER'] = $user->id_user;
            $_SESSION['USERNAME'] = $user->username;


            header("Location: " . BASE_URL . "administrator");
        } else {
            $this->view->viewFormLogin('Datos invalidos');
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'home');
    }
}
