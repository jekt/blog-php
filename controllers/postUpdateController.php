<?php
  
  if ($_POST != null) {
  	extract($_POST);

  	$errors = [];
  	if ($title == '') array_push($errors, 'Le titre ne peut pas être vide !');
  	if ($content == '') array_push($errors, 'Le contenu ne peut pas être vide !');

  	if (count($errors) == 0) {
  	  require_once(Conf::$DIR_MODELS . 'DBConnection.php');
  	  $dbc = new DBConnection();
  	  if (!isset($this->ids[0])) {
  	    $success = $dbc->insert('INSERT INTO post (title, content) VALUES (\'' . $title . '\', \'' . $content . '\')');
        $id = $dbc->insert_id;
  	  } else {
        $success = $dbc->update('UPDATE post SET title = \'' . $title . '\', content = \'' . $content . '\' WHERE id = ' . $this->ids[0]);
      }
      header('Location: /post/' . $id);
    }
  } else {

  }
  $action = 'Créer';
  include_once(Conf::$DIR_VIEWS . 'postUpdatePage.php');

?>