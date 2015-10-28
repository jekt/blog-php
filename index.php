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

$r = new Router();

$r->get('/post/create', 'postUpdateController.php');
$r->get('/post/(:id)', 'postPageController.php');
$r->get('/post/(:id)/update', 'postUpdateController.php');
$r->get('/users', 'userListController.php');
$r->get('/user/login', 'userConnectController.php');
$r->get('/user/logout', 'userConnectController.php');
$r->get('/user/(:id)', 'userPageController.php');
$r->get('/', 'homePageController.php');
$r->error('homePageController.php');
?>