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

    public function getDetail($idproduct){
        $db=$this->createConetion();

        $sentencia= $db->prepare("SELECT categories.categories AS categories, items.id_items, 
        items.product, items.description FROM items INNER JOIN categories ON 
        items.id_categories_fk = categories.id_categories WHERE items.id_items = ?");
        $sentencia->execute([$idproduct]);
        $detail=$sentencia->fetch(PDO::FETCH_OBJ);

        return $detail;
    }
}