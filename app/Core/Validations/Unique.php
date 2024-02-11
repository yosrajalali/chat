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
    return "{$key} already exists";
  }

}