<?php
include_once('conf.php');

if (Conf::$DEBUG_MODE) {
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
}

$route = $_GET['route'];

if (preg_match('#^\/post\/create\/?$#i', $route)) {

  include_once(Conf::$DIR_CONTROLLERS . 'postCreateController.php');

} elseif (preg_match('#^\/post\/[a-z0-9-_]{3,}\/?$#i', $route)) {
	
  include_once(Conf::$DIR_CONTROLLERS . 'postPageController.php');

} elseif (preg_match('#^\/post\/[a-z0-9-_]{3,}\/update\/?$#i', $route)) {
	
  include_once(Conf::$DIR_CONTROLLERS . 'postUpdateController.php');

} elseif (preg_match('#^\/users\/?$#i', $route)) {
	
  include_once(Conf::$DIR_CONTROLLERS . 'userListController.php');

} elseif (preg_match('#^\/user\/create\/?$#i', $route)) {
	
  include_once(Conf::$DIR_CONTROLLERS . 'userCreateController.php');

} elseif (preg_match('#^\/user\/[a-z0-9-_]{3,}\/?$#i', $route)) {
	
  include_once(Conf::$DIR_CONTROLLERS . 'userPageController.php');

} elseif (preg_match('#^\/user\/[a-z0-9-_]{3,}\/update\/?$#i', $route)) {
	
  include_once(Conf::$DIR_CONTROLLERS . 'userUpdateController.php');

} else {
  
  include_once(Conf::$DIR_CONTROLLERS . 'homePageController.php');

}
?>