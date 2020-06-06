<?php
class AuthHelper{

    static private function start(){
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    //Verifica que exista un usuario logueado
    static public function checkUserLogged(){
        self::start();
        if (!isset($_SESSION['IS_LOGGED'])) {
            header('Location: ' . BASE_URL . 'formlogin');
            die();
        }
    }

    static public function userLogged(){
        self::start();
        if (isset($_SESSION['USERNAME'])) {
            return $_SESSION['USERNAME'];
        }

        return false;
    }
}
