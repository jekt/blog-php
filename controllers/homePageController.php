<?php

  require_once(Conf::$DIR_MODELS . 'DBConnection.php');
  $dbc = new DBConnection();
  $posts = $dbc->fetchAll('post');

  include_once(Conf::$DIR_VIEWS . 'homePage.php');

?>