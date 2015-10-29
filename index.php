<?php
session_start();
ini_set('display_errors', '1');
include_once('conf.php');
Conf::init();

if (Conf::$DEBUG_MODE) {
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
}

include_once(Conf::$DIR_MODELS . 'DBConnection.php');
include_once(Conf::$DIR_MODELS . 'Router.php');
include_once(Conf::$DIR_MODELS . 'Post.php');
include_once(Conf::$DIR_MODELS . 'User.php');
include_once(Conf::$DIR_CONTROLLERS . 'Controller.php');
include_once(Conf::$DIR_CONTROLLERS . 'PostController.php');
include_once(Conf::$DIR_CONTROLLERS . 'UserController.php');

Router::r('/post/create', 'PostController', 'getPostUpdatePage');
Router::r('/post/(:id)', 'PostController', 'getPostPage');
Router::r('/post/(:id)/update', 'PostController', 'getPostUpdatePage');
Router::r('/users', 'UserController', 'getUserListPage');
Router::r('/user/login', 'UserController', 'getUserLoginPage');
Router::r('/user/logout', 'UserController', 'getUserLoginPage');
Router::r('/user/(:id)', 'UserController', 'getUserPage');
Router::r('/', 'PostController', 'getHomePage');
Router::error('PostController', 'getHomePage');
?>