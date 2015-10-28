<?php

  if (!(isset($_SESSION['user']) && $_SESSION['user'] != null)) {
    header('Location: ' . Conf::$BASE_URL . '/');
  }
  
  if ($_POST != null) {
  	extract($_POST);

  	$errors = [];
  	if ($title == '') array_push($errors, 'Le titre ne peut pas être vide !');
  	if ($content == '') array_push($errors, 'Le contenu ne peut pas être vide !');

  	if (count($errors) == 0) {
  	  require_once(Conf::$DIR_MODELS . 'DBConnection.php');
  	  $dbc = new DBConnection();
  	  if (!isset(self::$ids[0])) {
  	    $success = $dbc->insert('INSERT INTO post (title, content, author) VALUES (\'' . $title . '\', \'' . $content . '\', ' . $author . ')');
        $id = $dbc->get('db')->insert_id;
  	  } else {
        $success = $dbc->update('UPDATE post SET title = \'' . $title . '\', content = \'' . $content . '\' WHERE id = ' . $this->ids[0]);
      }
      header('Location: ' . Conf::$BASE_URL . '/post/' . $id);
    }
  } else {

  }
  $action = 'Créer';
  include_once(Conf::$DIR_VIEWS . 'postUpdatePage.php');

?>