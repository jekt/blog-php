<?php
class User {
  private $id, 
          $pseudo, 
          $email,  
          $isLoggedIn = false,
          $token;

  public function __construct($id, $pseudo = null) {
    $this->id = $id;

    if (!$pseudo) {
      $dbc = self::setDB();
      $user = $dbc->select('SELECT id, pseudo FROM user WHERE id=' . $id);
      $user = $user[0];
      $this->pseudo = $user->pseudo;
    } else {
      $this->pseudo = $pseudo;
    }
  }

  static function logIn($email, $password) {
    $dbc = self::setDB();
    $match = $dbc->select('SELECT id, pseudo FROM user WHERE email="' . $email . '" AND password="' . sha1($assword) . '"');
    if ($match) {
      $user = new User($match[0]->id, $match[0]->pseudo);
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
    $dbc = self::setDB();
    $result = $dbc->select('SELECT * FROM user');
    $users = [];
    foreach ($result as $user) {
      array_push($users, new User($user->id, $user->pseudo));
    }
    return $users;
  }

  static function setDB() {
    require_once(Conf::$DIR_MODELS . 'DBConnection.php');
    return new DBConnection();
  }

  public function setToken($user) {
    $this->token = serialize($this);
    $this->isLoggedIn = true;
    $_SESSION['user'] = $this->token;
  }
}
?>