<?php

  require_once(Conf::$DIR_MODELS . 'DBConnection.php');
  $dbc = new DBConnection();
  $users = $dbc->select('SELECT * FROM user');

  include_once(Conf::$DIR_VIEWS . 'userListPage.php');
?>