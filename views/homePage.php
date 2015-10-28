<?php $pageTitle = 'Page d\'accueil';?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php include(Conf::$DIR_PARTIALS . '_header.php'); ?>

  <h1><?php echo $pageTitle; ?></h1>
  <ul>
	<?php 
	  foreach($posts as $post) {
	  	echo '<li><a href="' . Conf::$BASE_URL . '/post/' . $post->get('id') .'">' . $post->get('title') . '</a></li>';
	  }
	?>
  </ul>
  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>