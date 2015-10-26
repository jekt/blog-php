<?php $pageTitle = 'Page d\'accueil'; ?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <h1><?php echo $pageTitle; ?></h1>
  <ul>
	<?php 
	  foreach($posts as $post) {
	  	echo '<li>' . $post->title . '</li>';
	  }
	?>
  </ul>
  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>