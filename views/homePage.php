<?php $pageTitle = 'Page d\'accueil'; ?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php include(Conf::$DIR_PARTIALS . '_header.php'); ?>

  <h1><?php echo $pageTitle; ?></h1>
	<?php 
	  if (count($posts) == 0) {
		echo '<p>Aucun article à afficher.</p>';
	  } else {
	  	foreach($posts as $post) {
	  	  echo '<ul>';
		  echo '<li><a href="' . Conf::$BASE_URL . '/post/' . $post->get('id') .'">' . $post->get('title') . '</a></li>';
		  echo '</ul>';
		}
	  }
	?>
  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>