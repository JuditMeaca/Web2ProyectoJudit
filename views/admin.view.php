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
            $this->smarty->assign('allcategories', $categories);
            $this->smarty->assign('allitems', $items);
            $this->smarty->display('admin.configuration.tpl');
        }

        public function viewFormCategorie($error = null){
            $this->smarty->assign('error', $error);
            $this->smarty->display('admin.formaddcategorie.tpl');

        }

        public function viewFormEditCategorie($categories, $error = null){
            $this->smarty->assign('categorie', $categories);
            $this->smarty->assign('error', $error);
            $this->smarty->display('admin.formEditCategorie.tpl');
        }

        public function viewFormAddItem($categories){
            $this->smarty->assign('categories', $categories);
            $this->smarty->display('admin.formadditem.tpl');
        }

        public function viewFormEditItem ($categories, $item, $error = null){
            $this->smarty->assign('error', $error);
            $this->smarty->assign('item', $item);
            $this->smarty->assign('allcategories', $categories);
            $this->smarty->display('admin.formEdititem.tpl');
        }
        public function viewErrorEmptyFields(){
            $this->smarty->display('errorEmptyFields.tpl');
        }
    }