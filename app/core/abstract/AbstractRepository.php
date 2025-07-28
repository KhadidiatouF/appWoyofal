<?php

namespace App\Core\Abstract;
use App\Core\App;
use App\Core\Database;
use App\Core\Singleton;
use PDO;

class AbstractRepository extends Singleton
{
   protected PDO $pdo;

   public function __construct(PDO $pdo)
   {
    $this->pdo=$pdo;
   }
}