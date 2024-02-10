<?php 

namespace App\Http\Controllers;

session_start();

use App\Core\Database\DatabaseService;

class LoginController {

    public function create(){

      // echo 'hi';

    require_once './views/auth/login.php';
  }

}