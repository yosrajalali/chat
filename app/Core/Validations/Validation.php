<?php 

namespace App\Core\Validations;

use App\Core\Validations\Contracts\ValidationInterface;

class Validation implements ValidationInterface{

  private static array $errors = [];

  public static function make(array $request, array $rules)
  {
    foreach($request as $key=>$value){
      foreach($rules[$key] as $rule){
        if(!$rule->validate($key, $value)){
          self::$errors[$key][$rule->name()] = $rule->message($key); 
        }
      }
    }
  }

  public static function getErrors(){
    return self::$errors;
  }
}