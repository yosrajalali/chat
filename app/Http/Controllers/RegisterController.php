<?php 

namespace App\Http\Controllers;

use App\Core\Database\DatabaseService;
use App\Core\Database\Services;
use App\Core\Validations\Unique;
use App\Core\Validations\Required;
use App\Core\Validations\Length;
use App\Core\Validations\PasswordLength;
use App\Core\Validations\NameValidChars;
use App\Core\Validations\UsernameValidChars;
use App\Core\Validations\ValidEmail;
use App\Core\Validations\Validation;
use DOMCdataSection;

session_start();

class RegisterController extends DatabaseService {

  private static array $errors = [];

  public function __construct()
  {
    parent::builder();
  }
  

  public function index(){
    
    if(isset($_SESSION['signup_errors'])){

      $errors = $_SESSION['signup_errors'];
    }

    require_once './views/auth/register.php';

    unset($_SESSION['signup_errors']);

  }

  public function store(){

    $rules= [

      'name'=>[new Required, new Length, new NameValidChars],
      'username'=>[new Required,new Unique, new Length, new UsernameValidChars],
      'email'=>[new Required, new Unique, new ValidEmail],
      'password'=>[new Required, new PasswordLength]
    ];
     
    Validation::make(array_intersect_key($_REQUEST,$rules), $rules);
    self::$errors = Validation::getErrors();

    

    if(isset($_POST['submit']) && empty(self::$errors)){
     
      $fields = [
        'name' =>$_POST['name'],
        'username' =>$_POST['username'],
        'email' =>$_POST['email'],
        'password' => $_POST['password']
      ];

      $services = new Services;
      $services->insertUser($fields);

      // set session to authenticate the user 
      $_SESSION['user']=[
        'username'=> $_REQUEST['username'],
        'password'=>$_REQUEST['password']
      ];

      header('Location: / ');
    }
    if(isset($_POST['submit']) && !empty(self::$errors)){

      $_SESSION['signup_errors'] = self::$errors;
      header('Location: /register/index ');
    }
  }
}
