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
        $lastId= $db->lastInsertId();
        return $lastId;

    }
 
    public function delete($idcategorie){
        $db = $this->createConection();
    
        $sentencia = $db->prepare("DELETE FROM categories WHERE categories.id_categories = ?");
        $sentencia->execute([$idcategorie]);
    }

    public function getCategorie($id){
            $db = $this->createConection();
        
            $sentencia = $db->prepare("SELECT * FROM categories WHERE id_categories = ?");
            $sentencia->execute([$id]);
            $categories = $sentencia->fetch(PDO::FETCH_OBJ); 
            
            return $categories;
    
        }
    public function edit($id, $categories){
            $db = $this->createConection();
        
            $sentencia=$db->prepare("UPDATE categories SET categories = ? WHERE categories.id_categories = ?");
            $result = $sentencia->execute([$categories, $id]);
            return $result;
        }    

    public function insertItem($item, $description, $idcategorie, $image = null){

        $pathImg=null; 

        if ($image)
            $pathImg = $this->uploadImage($image);
            
        
        $sentencia = $this->createConection()->prepare("INSERT INTO items (product, description, id_categories_fk, image) VALUES (?,?,?,?)");
        return $sentencia->execute([$item, $description, $idcategorie, $pathImg]);
    }

    private function uploadImage($image){
        $target = 'upload/items/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target); 
        return $target;
    }

    public function deleteItem($iditem){
        $db = $this->createConection();
    
        $sentencia = $db->prepare("DELETE FROM items WHERE items.id_items = ?");
        $sentencia->execute([$iditem]);
    }
    public function editProduct($id,$item, $description, $idcategorie, $image = null){
        $pathImg=null;
        if ($image)
            $pathImg = $this->uploadImage($image);
        
    
        $sentencia=$this->createConection()->prepare("UPDATE items SET product = ?, description = ?, id_categories_fk = ? , image = ? WHERE id_items = $id");
        return $sentencia->execute([$item, $description, $idcategorie, $pathImg]);
        
        }
        
        
    }  

