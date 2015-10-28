<?php
  
  if ($_POST != null) {
  	extract($_POST);

  	$errors = [];
  	if ($title == '') array_push($errors, 'Le titre ne peut pas être vide !');
  	if ($content == '') array_push($errors, 'Le contenu ne peut pas être vide !');

  	if (count($errors) == 0) {
	  require_once(Conf::$DIR_MODELS . 'DBConnection.php');
	  $dbc = new DBConnection();
	  if (!isset($ids)) {
	    $post = $dbc->query('INSERT INTO post (title, content) VALUES (\'' . $title . '\', \'' . $content . '\')');
	  }
    }
  } else {

  }
  $action = 'Créer';
  include_once(Conf::$DIR_VIEWS . 'postUpdatePage.php');

?>