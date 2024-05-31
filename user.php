<?php

require_once ('database.php');

Class User{

  public function get_all_users(){
    $db = db_connect();
    $statment = $db->prepare("select * from users;");
    $statment->execute();
    $rows = $statment->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function create_user($username, $password){
    $db = db_connect();

    if (strlen($password) < 4) {
      return "minimum password length is 4.";
    }
  
    $statement = $db->prepare("SELECT * FROM users WHERE username = $username;"));
    $statement->execute();
    if ($statement->rowCount() > 0) {
      return "Username already exists.";
    }
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES ($username, $hashed_password)");
    $statement->execute();
    return "User created.";
  
  }
}

?>