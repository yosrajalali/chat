<?php 

namespace App\Http\Controllers;

session_start();


class LoginController {

    public function index(){

    require_once './views/auth/login.php';
  }

}