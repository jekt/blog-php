<?php
  if (self::get('uri') == '/user/logout') {
  	unserialize($_SESSION['user'])->logOut();
  	header('Location: ' . Conf::$BASE_URL . '/');
  } elseif ($_POST != null) {
  	extract($_POST);
  	if (User::logIn($email, $password)) {
  		header('Location: ' . Conf::$BASE_URL . '/');
  	}
  }
  
  include_once(Conf::$DIR_VIEWS . 'userLoginPage.php');

?>