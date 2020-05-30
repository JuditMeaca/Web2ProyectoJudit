<?php
require_once 'libs/Smarty.class.php';

class CategoriesAndItemsView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        
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
        $this->smarty->assign('products', $items);
        $this->smarty->display('showitemsbycategories.tpl');
    }

    public function viewError(){
        $this->smarty->display('error.tpl');
    }

    
}