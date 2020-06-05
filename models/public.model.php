<?php

class PublicModel{
    
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

    public function getAllCategories(){
        $db=$this->createConection();

        $sentencia= $db->prepare("SELECT * FROM categories ");
        $sentencia->execute();
        $categories=$sentencia->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }

    public function getAllItems(){
        $db=$this->createConection();

        $sentencia= $db->prepare("SELECT * FROM items");
        $sentencia->execute();
        $items=$sentencia->fetchAll(PDO::FETCH_OBJ);

        return $items;
    }

    

    public function getItemsByCategories($id){
        $db=$this->createConection();

        $sentencia= $db->prepare("SELECT categories.categories AS categories, items.product, items.description, items.id_items FROM items 
        INNER JOIN categories ON items.id_categories_fk= categories.id_categories WHERE categories.id_categories = ?");
        $sentencia->execute([$id]);
        $items=$sentencia->fetchAll(PDO::FETCH_OBJ);

        return $items;
    }

    public function getDetail($id){
        $db=$this->createConection();

        $sentencia= $db->prepare("SELECT categories.categories AS categories, items.id_items, 
        items.product, items.description FROM items INNER JOIN categories ON 
        items.id_categories_fk = categories.id_categories WHERE items.id_items = ?");
        $sentencia->execute([$id]);
        $detail=$sentencia->fetch(PDO::FETCH_OBJ);

        return $detail;
    }
}