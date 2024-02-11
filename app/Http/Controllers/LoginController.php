<?php 

namespace App\Http\Controllers;

use App\Core\Database\DatabaseService;
use App\Core\Database\Services;

session_start();


class LoginController extends DatabaseService {

  public function __construct()
  {
    parent::builder();
  }


  public function index(){


    if(isset($_SESSION['login_errors'])){

       $errors = $_SESSION['login_errors'];
      
    }

    require_once './views/auth/login.php';

    unset($_SESSION['login_errors']);
  }



  public function store(){

    if (isset($_COOKIE['user_id'])) {

      $_SESSION['user'] = $this->builder
          ->table('users')
          ->select()
          ->where('id', $_COOKIE['user_id'], '=')
          ->execute()
          ->fetch();
    }
  
    if (@$_SESSION['user']) {
      header('location: /chats/index');
    }

    // user exist in database but not loged in
    if(isset($_REQUEST['submit'])){
      $user = $this->builder->table('users')
      ->select()
      ->where('username', $_REQUEST['username'], '=')
      ->where('password', $_REQUEST['password'], '=')
      ->execute()
      ->fetch();

      if($user){
        $_SESSION['user'] = $user;
        setcookie('user_id', $user->id, time() + 3600);
        header('location: /chats/index');

      }else{

        $_SESSION['login_errors'] = 'invalid username or password';

        header('Location: ' . $_SERVER['HTTP_REFERER']);
      }
    }

  }

}