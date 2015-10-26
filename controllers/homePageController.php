<?php

  if ($route !== '/' && $route !== '') {
  	http_response_code(404);
  }

  require_once(Conf::$DIR_MODELS . 'DBConnection.php');
  $dbc = new DBConnection();
  $posts = $dbc->fetchAll('post');

  include_once(Conf::$DIR_VIEWS . 'homePage.php');

?>