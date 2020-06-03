<?php
    require_once 'libs/Smarty.class.php';
    class AdminView{

        private $smarty;

        public function __construct(){
            $this->smarty = new Smarty();
            $this->smarty->assign('base_url', BASE_URL);
            $username = AuthHelper::userLogged();
            $this->smarty->assign('username', $username);
        }

        //Vista administrador
        public function viewConfiguration($categories, $items){
            $this->smarty->assign('arraycategories', $categories);
            $this->smarty->assign('arrayitems', $items);
            $this->smarty->display('admin.configuration.tpl');
        }
    }