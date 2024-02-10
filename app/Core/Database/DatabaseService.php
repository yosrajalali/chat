<?php 

namespace App\Core\Database;
use App\Core\Database\QueryBuilder;
use App\Core\Database\Connection;
use PDO;

abstract class DatabaseService{
  
  protected Connection $connection;
  protected QueryBuilder $builder;

  public function builder(){
    
    $this->connection = Connection::getInstance();
    $this->connection->setPdo(new PDO('mysql:host=localhost;dbname=chat', 'root'));
    $this->builder = new QueryBuilder($this->connection);
  }

  public function getBuilder(){

    return $this->builder;
    
  }
}