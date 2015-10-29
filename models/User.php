<?php
class User {
  private $id, 
          $pseudo, 
          $email,  
          $isLoggedIn = false,
          $token;

  public function __construct($id, $pseudo = null, $fetch = true) {
    $this->id = $id;

    if ($fetch) {
      DBConnection::connect();
      $user = DBConnection::select('SELECT id, pseudo FROM user WHERE id=' . DBConnection::getCleanVar($id));
      $user = $user[0];
      $this->pseudo = $user->pseudo;
    } else {
      $this->pseudo = $pseudo;
    }
  }

  static function logIn($email, $password) {
    DBConnection::connect();
    $match = DBConnection::select('SELECT id, pseudo FROM user WHERE email="' . DBConnection::getCleanVar($email) . '" AND password="' . sha1($password) . '"');
    if ($match) {
      $user = new User($match[0]->id, $match[0]->pseudo, false);
      $user->setToken();
      return true;
    } else {
      return false;
    }
  }

  public function logOut() {
    $this->token = null;
    $this->isLoggedIn = false;
    unset($_SESSION['user']);
  }

  public function isLoggedIn() {
    return $this->isLoggedIn;
  }

  public function get($prop) {
    return $this->$prop;
  }

  static function fetchAll() {
    DBConnection::connect();
    $result = DBConnection::select('SELECT * FROM user');
    $users = [];
    foreach ($result as $user) {
      array_push($users, new User($user->id, $user->pseudo, false));
    }
    return $users;
  }

  public function setToken() {
    $this->token = serialize($this);
    $this->isLoggedIn = true;
    $_SESSION['user'] = $this->token;
  }
}
?>