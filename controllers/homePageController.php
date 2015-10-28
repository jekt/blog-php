<?php
  $posts = Post::fetchAll();
  include_once(Conf::$DIR_VIEWS . 'homePage.php');
?>