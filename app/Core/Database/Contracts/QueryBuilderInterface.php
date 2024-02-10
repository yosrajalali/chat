<?php 

namespace App\Core\Database\Contracts;

interface QueryBuilderInterface{

  public function table(string $table);

  public function select(array $columns = ['*']);

  public function where(string $column  , string $value , string $operation);

  public function insert(array $fields);

  public function update(array $fields);

  public function delete();

  public function execute();

  public function fetch();

  public function fetchAll(): array;

}