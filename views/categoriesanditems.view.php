<?php
require_once 'libs/Smarty.class.php';

class CategoriesAndItemsView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        //$username = HelperAuth::userLogged();
        //$this->smarty->assign('username', $username);
    }


    public function viewCategories($categories){
        //var_dump($categories);
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('showCategories.tpl');
    }

    public function viewItems(){
        echo"Esto muestra los items";
    }

    public function viewItemsByCategories(){
        echo"Esto son items por categorias";
    }

    

    
}