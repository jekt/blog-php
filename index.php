<?php
include_once('conf.php');

if (Conf::$DEBUG_MODE) {
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
}

include_once(Conf::$DIR_MODELS . 'Router.php');

$r = new Router();

$r->get('/post/create', 'postCreateController.php');
$r->get('/post/(:id)', 'postPageController.php');
$r->get('/post/(:id)/update', 'postUpdateController.php');
$r->get('/users', 'userListController.php');
$r->get('/user/create', 'userCreateController.php');
$r->get('/user/(:id)', 'userPageController.php');
$r->get('/user/(:id)/update', 'userUpdateController.php');
$r->get('/', 'homePageController.php');
$r->error('homePageController.php');
?>