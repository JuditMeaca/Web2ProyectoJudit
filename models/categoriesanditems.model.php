<?php

class CategoriesAndItemsModel{
    
    private function createConetion(){
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
        $db=$this->createConetion();

        $sentencia= $db->prepare("SELECT * FROM categories ");
        $sentencia->execute();
        $categories=$sentencia->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }

    public function getAllItems(){
        $db=$this->createConetion();

        $sentencia= $db->prepare("SELECT * FROM items");
        $sentencia->execute();
        $items=$sentencia->fetchAll(PDO::FETCH_OBJ);

        return $items;
    }

    public function getItemsByCategories($id){
        $db=$this->createConetion();

        $sentencia= $db->prepare("SELECT categories.categories AS categories, item.items, items.
        product, item.description, items.id_items FROM items INNER JOIN categories ON items.id_categories_fk= categories.id_categories");
        $sentencia->execute([$id]);
        $items=$sentencia->fetchAll(PDO::FETCH_OBJ);

        return $items;
    }

}