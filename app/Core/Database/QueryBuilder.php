<?php 

namespace App\Core\Database;

use App\Core\Database\Contracts\QueryBuilderInterface;
use App\Core\Database\Connection;
use PDOStatement;
use PDO;

class QueryBuilder implements QueryBuilderInterface{

  private Connection $connection;
  private string $table;
  private string $query;
  private PDOStatement $statement;

  public function __construct(Connection $connection)
  {
    $this->connection = $connection;
  }

  public function table(string $table)
  {
    $this->table = $table;
    return $this;
  }

  public function select(array $columns = ['*'])
  {
    $pattern = 'SELECT %s FROM %s';

    $fields = implode(', ', $columns);

    $this->query = sprintf($pattern, $fields, $this->table);

    return $this;
  }

  public function insert(array $fields)
  {
    // INSERT INTO table_name (column1, column2, column3, ...)
    // VALUES (value1, value2, value3, ...);

    // $stmt = $conn->prepare("INSERT INTO your_table_name (column1, column2, column3) VALUES (?, ?, ?)");
    
    $pattern = 'INSERT INTO %s (%s) VALUES (%s)';

    $columns = implode(', ', array_keys($fields));

    $placeHolders = implode(', ', array_fill(0, count($fields), '?'));

    $this->query = sprintf($pattern, $this->table, $columns, $placeHolders);

    return $this;
  }

  public function delete()
  {
    // DELETE FROM table_name WHERE condition;
    $pattern = 'DELETE FROM %s';
    $this->query = sprintf($pattern, $this->table);
    return $this;
    
  }

  public function update(array $fields)
  {
    // UPDATE table_name
    // SET column1 = value1, column2 = value2, ...
    // WHERE condition;
    $pattern = 'UPDATE %s SET %s ';

    $setClauses = [];

    $cols = array_slice($fields, 0, -1);

    foreach ($cols as $column => $value) {

      $setClauses[] = "$column = ?";

    }

    $setClause = implode(', ', $setClauses);

    $this->query = sprintf($pattern, $this->table, $setClause);

    return $this;
  }

  public function where(string $column, string $value, string $operation)
  {
    if (!str_contains($this->query, 'where')) {
      $this->query .= ' where';
    } else {
        $this->query .= ' and';
    }

    $pattern = " $column $operation '$value'";
    $this->query .= $pattern;
    return $this;
  }

  public function execute()
  {
    // dd($this->query);
    $this->statement = $this->connection->getPdo()->prepare($this->query);
    $this->statement->execute();
    return $this;
  }

  public function bindExecute(array $values)
  {
    // dd($this->query);
    $this->statement = $this->connection->getPdo()->prepare($this->query);
    $this->statement->execute($values);
    return $this;
  }

  public function fetch()
  {
    $record = $this->statement->fetch(PDO::FETCH_OBJ);
    return $record;
  }

  public function fetchAll(): array
  {

    $records = $this->statement->fetchAll(PDO::FETCH_OBJ);
    return $records;
  }

  public function join(string $table, string $first, string $operator, string $second, string $type = 'INNER'){

    $this->query .= " {$type} JOIN {$table} ON {$first} {$operator} {$second}";
    return $this;

  }

}