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
        AuthHelper::checkUserLogged();// antes de ejecutar las funciones de este controlador, va a verificar que el usuario este logueado        
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
        $categ = $_POST['newname'];
        $id = $_POST['id'];
        $categories=$this->modelAdmin->getCategorie($id);
        
        if (!empty($categ)){
           $this->modelAdmin->edit($id, $categ); 
        header('Location: ' . BASE_URL . "administrator"); 
        } 
        else {
            $this->view->viewFormEditCategorie($categories, 'Completar todos los campos');
        }
    }

    public function formNewItem(){
        $categories=$this->model->getAllCategories();
        $this->view->viewFormAddItem($categories);

    }
    public function addItem(){
        $item=$_POST['product']; 
        $description=$_POST['description']; 
        $idcategorie=$_POST['id_categories'];
        $categories=$this->model->getAllCategories();

        if(empty($item) || empty($description)){
            $this->view->viewFormAddItem($categories, 'Completar todos los campos');
        }

        else{

            if($_FILES['input_name']['type'] == "image/jpg" ||
            $_FILES['input_name']['type'] == "image/jpeg" ||
            $_FILES['input_name']['type'] == "image/png"){
                
            $success = $this->modelAdmin->insertItem($item, $description, $idcategorie, $_FILES['input_name']['tmp_name']);
            } 
                else {
                $success = $this->modelAdmin->insertItem($item, $description, $idcategorie);
            }
        
            if($success) {
                header('Location: ' . BASE_URL . "items");
            } else {
                $this->view->viewFormAddItem($categories, 'Completar todos los campos');
            }    
    }
    }
    public function deleteItem($iditem){
        $this->modelAdmin->deleteItem($iditem);
        header('Location: ' . BASE_URL . "administrator");
    }

    public function formEditItem($iditem){
        $item = $this->model->getDetail($iditem);            
        $categories = $this->model->getAllCategories();
        $this->view->viewFormEditItem($categories,$item);

    }
    public function edititem(){
        $id=$_POST['id'];
        $item=$_POST['product'];
        $description=$_POST['description'];
        $idcategorie=$_POST['idcategories'];
        $items = $this->model->getDetail($id);            
        $categories = $this->model->getAllCategories();
        
        
        if (empty($item) || empty($description)){
            $this->view->viewFormEditItem($categories,$items, 'Complete todos los campos');
        }
        else {
            if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || 
                    $_FILES['input_name']['type'] == "image/png"){
                    $success = $this->modelAdmin->editProduct($id,$item, $description, $idcategorie, $_FILES['input_name']['tmp_name']); 
        }
        else{
                $success = $this->modelAdmin->editProduct($id,$item, $description, $idcategorie);

        }
         if ($success){
            header('Location: ' . BASE_URL . "administrator"); 
         }   
         
        else {
            $this->view->viewFormEditItem($categories,$items, 'Complete todos los campos');
        }
    }
}



}