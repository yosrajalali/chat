<?php 

namespace App\Core\Validations;

use App\Core\Validations\Contracts\RuleInterface;
use App\Core\Validations\BaseRule;


class UsernameValidChars extends BaseRule implements RuleInterface {

  public function validate(string $key, $value): bool
  {
    if(preg_match('/^[a-zA-Z0-9_]+$/', $value)){
      return true;
    }else{
      return false;
    }
  }

  public function message(string $key): string
  {
    return "{$key} field must contain valid characters";
  }
}