<?php 

namespace App\Core\Validations;

use App\Core\Validations\Contracts\RuleInterface;
use App\Core\Validations\BaseRule;


class PasswordLength extends BaseRule implements RuleInterface {

  public function validate(string $key, $value): bool
  {
    if(strlen($value)>= 4 && strlen($value)<= 32){
      return true;
    }else{
      return false;
    }
  }

  public function message(string $key): string
  {
    return "{$key} field must be 4-32 characters long";
  }
}