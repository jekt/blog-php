<?php

  require_once(Conf::$DIR_MODELS . 'DBConnection.php');
  $dbc = new DBConnection();
  $user = $dbc->select('*', 'user', 'id=' . $this->ids[0], 0, 1);

  include_once(Conf::$DIR_VIEWS . 'userPage.php');

?>