<?php $pageTitle = $action . ' article';?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php include(Conf::$DIR_PARTIALS . '_header.php'); ?>

  <h1><?php echo $pageTitle; ?></h1>

  <?php
  	if (isset($errors) && count($errors) != 0) {
  	  echo '<p><strong>Il y a des erreurs :</strong></p>';
  	  echo '<ul>';
  	  foreach ($errors as $error) {
  	    echo '<li>' . $error . '</li>';
  	  }
  	  echo '</ul>';
  	}
  ?>
  
  <form action="<?php echo Conf::$BASE_URL; ?>/post/create" method="post">
  	<label>Titre : 
  		<input type="text" name="title" placeholder="Titre de l'article..." value="<?php echo (isset($title)) ? $title : ''; ?>" />
  	</label><br/>
  	<label>Image : 
  		<?php echo (isset($picture)) ? '<br/><img src="' . $picture . '" /><br/>' : ''; ?>
  		<input type="file" name="picture" /><br/>
  	</label>
  	<label>Contenu : <br/>
  		<textarea name="content" placeholder="Contenu de l'article..."><?php echo (isset($content)) ? $content : ''; ?></textarea>
  	</label><br/>
  	<input type="submit" value="<?php echo $action; ?>" />
  </form>

  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>