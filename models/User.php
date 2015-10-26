<?php
class User {
  private $id, 
          $pseudo, 
          $email,  
          $avatar,
          $isLoggedIn = false,
          $token;

  public function __construct($id) {
  	$this->retrieve($id);
  }

  public function create() {

  }

  public function retrieve($id) {
  	$this->id = $id;
  	$this->pseudo = "";
  	$this->email = "";
  	$this->avatar = "";
  }

  public function update($properties) {
  	foreach($properties as $key => $value) {
      $this[$key] = $value;
    }
  }

  public function delete() {

  }

  public function logIn() {
    $this->token = '';
    $this->isLoggedIn = true;
  }

  public function logOut() {
    $this->token = null;
    $this->isLoggedIn = false;
  }

  public function isLoggedIn() {
    return $this->isLoggedIn;
  }
}
?>