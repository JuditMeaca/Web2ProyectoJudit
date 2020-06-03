 <?php 

class AdminModel{

    private $db;

    public function __construct(){
        $this->db = $this->createConection();
        
    }

    private function createConection() {
        $host = 'localhost'; 
        $userName = 'root'; 
        $password = '';
        $database = 'db_limpieza'; // nombre de la base de datos
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            var_dump($e);
        }
        return $pdo;
    }
 
 
    public function delete($id){
        $db = $this->createConection();
    
        $sentencia = $db->prepare("DELETE FROM categories WHERE id_categories = ?");
        $sentencia->execute([$id]);
    }

    public function deleteProduct($idproduct){
        $db = $this->createConection();
    
        $sentencia = $db->prepare("DELETE FROM items WHERE id_items = ?");
        $sentencia->execute([$idproduct]);
    }
}