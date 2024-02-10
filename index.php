<?php 

require_once __DIR__ . '/vendor/autoload.php';

require './routes.php';

use App\Core\Routing\Route;

Route::find(
  $_SERVER['PATH_INFO'] ?? '/',
  strtolower($_SERVER['REQUEST_METHOD'])
);