<?php
require_once 'models/public.model.php';
require_once 'models/admin.model.php';
require_once 'api/api-view.php';

class CategoriesApiController{

    private $model;
    private $modelAdmin;
    private $view;
    

    public function __construct(){
        $this->model = new PublicModel;  
        $this->modelAdmin = new AdminModel;
        $this->view = new APIview;     
    }

    public function getCategories($params = []){
        $categories=$this->model->getAllCategories();

        if (!empty($categories)){
            return $this->view->response($categories, 200);
        }

        else{
            return $this->view->response('No existen categorias', 404);
        }
         
    }

    public function getCategorie($params = []){
        $idCategorie = $params[':ID'];
        $categorie = $this->modelAdmin->getCategorie($idCategorie);

        if (!empty($categorie)){
             $this->view->response($categorie, 200);
        }

        else{
             $this->view->response("No existe categoria con id {$idCategorie}", 404);
        }
        
    }
    public function deleteCategorie($params = []) {
        $idCategorie = $params[':ID'];
        $categorie = $this->modelAdmin->getCategorie($idCategorie);
        
        
        if (!empty($categorie)) {
            $this->modelAdmin->delete($idCategorie);
            $this->view->response("La categoria con id {$idCategorie} se eliminó correctamente", 200);

        }
        else{
            $this->view->response("No existe categoria para eliminar con id {$idCategorie}", 404);

        }
    }

}