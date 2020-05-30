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

    public function getDetails(){
        $db=$this->createConetion();
    }
}