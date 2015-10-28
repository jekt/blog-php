<?php
  $users = User::fetchAll();
  include_once(Conf::$DIR_VIEWS . 'userListPage.php');
?>