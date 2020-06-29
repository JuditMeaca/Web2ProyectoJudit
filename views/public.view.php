<?php

require_once 'libs/Smarty/Smarty.class.php';

class PublicView{

    private $smarty;

    public function __construct(){

        $this->smarty= new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $username = AuthHelper::userLogged();
        $this->smarty->assign('username', $username);
        
    }


    public function viewHome(){

        $this->smarty->display('home.tpl');
    }

    public function viewCategories($categories){
        //var_dump($categories);
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('showCategories.tpl');
    }

    public function viewItems($items){
        $this->smarty->assign('items', $items);
        $this->smarty->display('showItems.tpl');
    }

    public function viewItemsByCategories($items){
        $this->smarty->assign('items', $items);
        $this->smarty->display('showitemsbycategories.tpl');
    }

    public function viewDetails($detail){
        
       $this->smarty->assign('detail', $detail);
       $this->smarty->display('showDetails.tpl');
    }

    public function viewFormLogin($error = null){//parametros opcionales, a este metodo lo puedo llamar con o sin parametro
        $this->smarty->assign('error', $error);
        $this->smarty->display('formlogin.tpl');

    }

    public function viewError(){
        $this->smarty->display('error.tpl');
    }

    
}