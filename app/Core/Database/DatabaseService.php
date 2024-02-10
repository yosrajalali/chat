<?php 

namespace App\Core\Database;
use App\Core\Database\QueryBuilder;
use App\Core\Database\Connection;
use PDO;

class DatabaseService{
  
  protected Connection $connection;
  protected QueryBuilder $builder;

  // change the name to builder
  public function builder(){
    
    $this->connection = Connection::getInstance();
    $this->connection->setPdo(new PDO('mysql:host=localhost;dbname=chat', 'root'));
    $this->builder = new QueryBuilder($this->connection);
  }

}