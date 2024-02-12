<?php 

namespace App\Http\Controllers;

session_start();

use App\Core\Database\DatabaseService;
use App\Core\Database\Services;
use PDO;

class ChatController extends DatabaseService{

  public function __construct()
  {
      parent::builder();
  }


  public function index(){

    
    $chatrooms = $this->builder
    ->table('rooms')
    ->select()
    ->execute()
    ->fetchAll();
   
    require './views/chats/index.php';
  }

  public function show(){

    $services = new Services();
    $messages = $services->getMessagesData($_GET['room_id']);
  //  this is messages join with rooms and users

    $chatrooms = $services->getChatrooms();
    $room = $services->getRoomById($_GET['room_id']);
    // dd($room->name);
    require_once './views/chats/show.php';
  }

  public function store(){

    $currentTimestamp = date("Y-m-d H:i:s");

    if(isset($_REQUEST['submit']) && isset($_REQUEST['content']) && !empty($_REQUEST['content'])){

      $this->builder->table('messages')
      ->insert(['user_id'=>'user_id', 'room_id'=>'room_id', 'content'=>'content', 'image'=>'image','created_at'=>'created_at'])
      ->bindExecute([$_SESSION['user']->id,$_GET['room_id'],$_REQUEST['content'],'image address',$currentTimestamp]);
      
        header('Location: /chats/show?room_id=' . $_GET['room_id']);
    }else{

      header('Location: /chats/show?room_id=' . $_GET['room_id']);
    }
   
  }

  public function edit(){

    $services =new Services();
    $messages = $services->getMessagesById($_GET['id']); 

    // dd($messages);
    require_once './views/chats/edit.php';
  
  }

  public function update(){

    $this->builder
    ->table('messages')
    ->update($_POST)
    ->where('id', $_GET['id'], '=')
    ->bindExecute([$_POST['content']]);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public function delete(){

     $this->builder
    ->table('messages')
    ->delete()
    ->where('id', $_GET['id'], '=')
    ->execute();

    // redirect back to the same page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
   
  }
}