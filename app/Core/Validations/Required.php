<?php 

namespace App\Core\Validations;

use App\Core\Validations\Contracts\RuleInterface;
use App\Core\Validations\BaseRule;

class Required extends BaseRule implements RuleInterface {

  public function validate(string $key, $value): bool
  {
    return !empty($value);
  }

  public function message(string $key): string
  {
    return "{$key} field is required";
  }
}