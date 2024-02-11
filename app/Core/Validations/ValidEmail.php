<?php 

namespace App\Core\Validations;

use App\Core\Validations\Contracts\RuleInterface;
use App\Core\Validations\BaseRule;

class ValidEmail extends BaseRule implements RuleInterface {

  public function validate(string $key, $value): bool
  {
    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
      return true;
    } else {
        return false;
    }
    
  }

  public function message(string $key): string
  {
    return "{$key} is not valid";
  }
}