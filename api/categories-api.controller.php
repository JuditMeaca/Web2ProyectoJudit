<?php
require_once 'models/public.model.php';
require_once 'models/admin.model.php';
require_once 'api/api-view.php';

class CategoriesApiController{

    private $model;
    private $modelAdmin;
    private $view;
    private $data;

    public function __construct(){
        $this->model = new PublicModel;  
        $this->modelAdmin = new AdminModel;
        $this->view = new APIview;
        $this->data = file_get_contents("php://input");     
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
        public function getData() {

            return json_decode($this->data);
    }

    public function newCategorie() {
            
        $data = $this->getData();
        
        
        $categories = $data->categories;
        
        $id_categories = $this->modelAdmin->insertCategorie($categories);

        if ($id_categories) {
            $this->view->response("Se agrego la categoria con id: {$id_categories}", 200);
        }

        else {
            $this->view->response("La categoria no pudo ser agregada", 500);
        }
    }

    public function editCategorie($params = []){
        $idCategorie = $params[':ID'];
        $data = $this->getData();
        $categorie = $this->modelAdmin->getCategorie($idCategorie);

        if ($categorie) {
            $this->modelAdmin->edit($idCategorie, $data->categories);
            $this->view->response("La categoria fue modificada con exito.", 200);
        } else
            $this->view->response("La categoria con id: {$idCategorie} no existe", 404);
    }

}
