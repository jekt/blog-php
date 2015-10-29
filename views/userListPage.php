<?php $pageTitle = 'Liste des auteurs';?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php include(Conf::$DIR_PARTIALS . '_header.php'); ?>

  <h1><?php echo $pageTitle; ?></h1>
	<?php 
	  if (count($users) == 0) {
		echo '<p>Aucun auteur pour l\'instant.</p>';
	  } else {
	  	foreach($users as $user) {
	  	  echo '<ul>';
		  echo '<li><a href="' . Conf::$BASE_URL . '/user/' . $user->get('id') .'">' . $user->get('pseudo') . '</a></li>';
		  echo '</ul>';
		}
	  }
	?>
  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>