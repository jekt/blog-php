<?php
class UserController extends Controller {
  static function getUserLoginPage() {
  	if (Router::get('uri') == '/user/logout') {
      if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
  	    unserialize($_SESSION['user'])->logOut();
      }
  	  header('Location: ' . Conf::$BASE_URL . '/');
    } elseif ($_POST != null) {
  	  extract($_POST);
  	  if (User::logIn($email, $password)) {
  		header('Location: ' . Conf::$BASE_URL . '/');
  	  }
    }
  
    echo self::render('userLoginPage');
  }

  static function getUserListPage() {
  	$users = User::fetchAll();
    echo self::render('userListPage', array('users' => $users));
  }

  static function getUserPage() {
  	$user = new User(Router::get('ids')[0]);
    echo self::render('userPage', array('user' => $user));
  }
}
?>