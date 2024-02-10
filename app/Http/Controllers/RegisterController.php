<?php 

namespace App\Http\Controllers;

session_start();

class RegisterController {

    public function index(){

    require_once './views/auth/register.php';
  }

}