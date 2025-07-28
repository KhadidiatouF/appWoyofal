<?php

namespace App\Core;
use PDO;
use PDOException;
use App\Core\Singleton;

class Database extends Singleton{
    public PDO $pdo;

    private function __construct(){
        try{
            $this->pdo = new PDO(DSN, USER, PASSWORD);
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}