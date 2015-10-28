<?php

  require_once(Conf::$DIR_MODELS . 'DBConnection.php');
  $dbc = new DBConnection();
  $user = $dbc->select('SELECT id, pseudo, avatar FROM user WHERE id=' . $this->ids[0]);
  $user = $user[0];

  include_once(Conf::$DIR_VIEWS . 'userPage.php');
?>