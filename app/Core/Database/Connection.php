<?php

namespace App\Core\Database;

use App\Core\Database\Contracts\ConnectionInterface;
use PDO;

class Connection implements ConnectionInterface{

  private static ?Connection $connection = null;
  private PDO $pdo;

  private function __construct()
  {
    
  }

  public static function getInstance(){
    self::$connection = is_null(self::$connection) ? new Connection() : self::$connection;

    return self::$connection;
  }

  public function setPdo(PDO $pdo){
    $this->pdo = $pdo;
  }

  public function getPdo(){
    return $this->pdo;
  }
}