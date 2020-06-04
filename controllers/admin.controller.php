<?php
require_once 'models/public.model.php';
require_once 'models/admin.model.php';
require_once 'views/admin.view.php';
require_once 'helpers/auth.helper.php';

class AdminController{

    private $model;
    private $modelAdmin;
    private $view;

    public function __construct(){

        $this->view = new Adminview;
        $this->model = new PublicModel; 
        $this->modelAdmin = new AdminModel;
        AuthHelper::checkUserLogged();
             
    }

    public function administration(){
        $categories = $this->model->getAllCategories();
        $items = $this->model->getAllItems();
        $this->view->viewConfiguration($categories, $items);
    }

    public function formNewCategorie(){
        $this->view->viewFormCategorie();
    }

    public function addCategorie(){
        $categorie=$_POST['x'];
        if(!empty($categorie)){
            $this->modelAdmin->insertCategorie($categorie);
        header('Location: ' . BASE_URL . "administrator");
        }
        else {
            $this->view->viewFormCategorie('Campos vacios');
        }
    }
    public function deleteCategorie($idcategorie){
            $this->modelAdmin->delete($idcategorie);
            header('Location: ' . BASE_URL . "administrator");
        }   
        
    public function formEditCategorie($id){
        $categories=$this->modelAdmin->getCategorie($id);
        $this->view->viewFormEditCategorie($categories);

    }
    public function editCategorie(){
        $categorie = $_POST['x'];
        $id = $_POST['id'];
        if (!empty($categorie)){
           $this->modelAdmin->edit($categorie, $id); 
        header('Location: ' . BASE_URL . "administrator"); 
        } 
        else {
            $this->view->viewFormEditCategorie('Campos vacios'); 
        }
    }
}
