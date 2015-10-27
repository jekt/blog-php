<?php

  require_once(Conf::$DIR_MODELS . 'DBConnection.php');
  $dbc = new DBConnection();
  $post = $dbc->select('*', 'post', 'id=' . $this->ids[0], 0, 1);

  include_once(Conf::$DIR_VIEWS . 'postPage.php');

?>