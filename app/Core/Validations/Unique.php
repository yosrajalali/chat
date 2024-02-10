<?php 

namespace App\Core\Validations;

use App\Core\Validations\BaseRule;
use App\Core\Validations\Contracts\RuleInterface;
use App\Core\Database\QueryBuilder;
use App\Core\Database\Connection;
use App\Core\Database\DatabaseService;
use App\Core\Database\Services;
use PDO;


class Unique extends BaseRule implements RuleInterface{

  private array $users;

  public function validate(string $key, $value): bool
  {
    // key= username, email
    // value = whatever user enters into username and email inputs

    $connection = Connection::getInstance();
    $connection->setPdo(new PDO('mysql:host=localhost;dbname=chat', 'root'));
    $builder = new QueryBuilder($connection);

    // $this->users = $builder->table('users')
    // ->select()
    // ->execute()
    // ->fetchAll(PDO::FETCH_OBJ);

    $services = new Services;
    $this->users = $services->getUsers();

    foreach ($this->users as $user) {
      if ($user->$key === $value) { 
          return false; // not unique
      }
    }

    return true; // unique

  }

  public function message(string $key): string
  {
    return "{$key} must be unique";
  }

  // left off
//  we need values of users aray here
}