<?php

require_once 'libs/Smarty.class.php';

class PublicView{

    private $smarty;

    public function __construct(){

        $this->smarty= new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        
    }


    public function viewHome(){

        $this->smarty->display('home.tpl');
    }

    public function viewDetails($detail){
        var_dump($detail);
       //$this->smarty->assign('detalle', $detail);
       //$this->smarty->display('showDetails.tpl');
    }

    public function viewFormLogin($error = null){//parametros opcionales, a este metodo lo puedo llamar con o sin parametro
        $this->smarty->assign('error', $error);
        $this->smarty->display('formlogin.tpl');

    }

    public function viewError(){
        $this->smarty->display('error.tpl');
    }

    
}