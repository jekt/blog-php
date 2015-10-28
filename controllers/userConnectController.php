<?php
  if ($_POST != null) {
  	extract($_POST);
  	if (User::logIn($email, $password)) {
  		header('Location: /');
  	}
  }
  
  include_once(Conf::$DIR_VIEWS . 'userLoginPage.php');

?>