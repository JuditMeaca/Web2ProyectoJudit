<?php 

class UserModel{

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
    
    public function getUser($user){
        $sentencia = $this->db->prepare("SELECT * FROM user WHERE username = ?");
        $sentencia->execute([$user]);
        return $sentencia->fetch(PDO::FETCH_OBJ);

    }


    
}