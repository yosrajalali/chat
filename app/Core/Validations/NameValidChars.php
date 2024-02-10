<?php 

namespace App\Core\Validations;

use App\Core\Validations\Contracts\RuleInterface;
use App\Core\Validations\BaseRule;


class NameValidChars extends BaseRule implements RuleInterface {

  public function validate(string $key, $value): bool
  {
    if(preg_match('/^[a-z\s]+$/', $value)){
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