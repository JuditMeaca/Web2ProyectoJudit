 <?php 

class AdminModel{

    private function createConection(){
        $host='localhost';
        $userName='root';
        $password='';
        $database= 'db_limpieza';

        try{
            $pdo= new PDO ("mysql:host=$host;dbname=$database;charset=utf8", $userName,$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);    
        }
        catch (Exception $e){
            var_dump($e);
        }
        return $pdo;
    }

    public function insertCategorie($categorie){
        $db = $this->createConection();
    
        $sentencia = $db->prepare("INSERT INTO categories (categories) VALUES (?)");
        $sentencia->execute([$categorie]);

    }
 
    public function delete($idcategorie){
        $db = $this->createConection();
    
        $sentencia = $db->prepare("DELETE FROM categories WHERE categories.id_categories = ?");
        $sentencia->execute([$idcategorie]);
    }

    public function getCategorie($id){
            $db = $this->createConection();
        
            $sentencia = $db->prepare("SELECT id_categories, categories FROM categories WHERE id_categories = ?");
            $sentencia->execute([$id]);
            $categories = $sentencia->fetch(PDO::FETCH_OBJ); 
            
            return $categories;
    
        }
    public function edit($categories, $id){
            $db = $this->createConection();
        
            $sentencia=$db->prepare("UPDATE categories SET categories = ? WHERE categories.id_categories = ?");
            $sentencia->execute([$categories, $id]);
        }    

    public function insertItem($item, $description, $idcategorie){
        $db = $this->createConection();
    
        $sentencia = $db->prepare("INSERT INTO items (product, description, id_categories_fk) VALUES (?,?,?)");
        $sentencia->execute([$item, $description, $idcategorie]);
    }

    public function deleteItem($iditem){
        $db = $this->createConection();
    
        $sentencia = $db->prepare("DELETE FROM items WHERE items.id_items = ?");
        $sentencia->execute([$iditem]);
    }
    public function editProduct($id,$item, $description, $idcategorie){
        $db = $this->createConection();
    
        $sentencia=$db->prepare("UPDATE items SET product = ?, description = ?, id_categories_fk = ?, WHERE id_items = ?");
        $sentencia->execute([$item, $description, $id, $idcategorie]);
        
        }  
    }  

    
/*
    public function deleteProduct($idproduct){
        $db = $this->createConection();
    
        $sentencia = $db->prepare("DELETE FROM items WHERE id_items = ?");
        $sentencia->execute([$idproduct]);
    }*/
