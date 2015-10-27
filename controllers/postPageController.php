<?php

  require_once(Conf::$DIR_MODELS . 'DBConnection.php');
  $dbc = new DBConnection();
  $post = $dbc->query('SELECT p.id as post_id, p.title, p.picture, p.content, p.pubDate, u.id as user_id, u.pseudo as author FROM post p INNER JOIN user u ON p.author = u.id WHERE p.id=' . $this->ids[0]);
  $post = $post[0];

  include_once(Conf::$DIR_VIEWS . 'postPage.php');

?>