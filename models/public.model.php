<?php

class PublicModel{
    
    private function createConetion(){
        $host='localhost';
        $username='root';
        $password='';
        $database= 'db_limpieza';

        try{
            $pdo= new PDO("mysql:host=$host;dbname=$database;charset=utf8, $username,$password");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);    
        }
        catch (Exception $e){
            var_dump($e);
        }
        return $pdo;
    }

    public function getDetail($iditem){
        $db=$this->createConetion();

        $sentencia= $db->prepare("SELECT categories.categorie AS categorie, items.id_items, categories.categorie, 
        categories.description, FROM items INNER JOIN categories 
        ON id_categories_fk = items.id_items WHERE categories.id_categories = ?");
        $sentencia->execute([$iditem]);
        $detail=$sentencia->fetch(PDO::FETCH_OBJ);

        return $detail;
    }
}