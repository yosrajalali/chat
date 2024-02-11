<?php 

namespace App\Core\Database;
use App\Core\Database\DatabaseService;

use PDO;

session_start();

// can I singleton this too? cuz I'm using this anywhere and making lots of objs
class Services extends DatabaseService {

  private static array $errors = [];

  public function __construct()
  {
      parent::builder();
  }

  public function getUsers()
  {
    return $this->builder->table('users')
    ->select()
    ->execute()
    ->fetchAll(PDO::FETCH_OBJ);
    
  }

  public function insertUser($user){

    $this->builder->table('users')
      ->insert($user)
      ->bindExecute(array_values($user));
  }

  public function getMessagesData($roomId){

    return $this->builder
    ->table('messages')
    ->select(['messages.content', 'users.username', 'rooms.name', 'rooms.id as room_id, messages.id as message_id'])
    ->join('users','messages.user_id', '=', 'users.id' )
    ->join('rooms','rooms.id', '=', 'messages.room_id' )
    ->where('rooms.id', $roomId, '=')
    ->execute()
    ->fetchAll(PDO::FETCH_OBJ);
  }


  public function getMessagesById($messageId){

    return $this->builder
    ->table('messages')
    ->select()
    ->where('id', $messageId, '=')
    ->execute()
    ->fetchAll(PDO::FETCH_OBJ);
  }
}