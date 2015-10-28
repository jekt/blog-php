<?php
session_start();

include_once('conf.php');

if (Conf::$DEBUG_MODE) {
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
}

include_once(Conf::$DIR_MODELS . 'Router.php');
include_once(Conf::$DIR_MODELS . 'Post.php');
include_once(Conf::$DIR_MODELS . 'User.php');

Router::r('/post/create', 'postUpdateController.php');
Router::r('/post/(:id)', 'postPageController.php');
Router::r('/post/(:id)/update', 'postUpdateController.php');
Router::r('/users', 'userListController.php');
Router::r('/user/login', 'userConnectController.php');
Router::r('/user/logout', 'userConnectController.php');
Router::r('/user/(:id)', 'userPageController.php');
Router::r('/', 'homePageController.php');
Router::error('homePageController.php');
?>