<?php $pageTitle = "Article : " . $post->title; ?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php echo '<a href="' . Conf::$BASE_URL . '">&laquo; accueil</a>'; ?>
  <h1><?php echo $post->title; ?></h1>
  <ul>
	<?php 
	  foreach($post as $key => $value) {
	  	echo '<li>' . $key . ' : ' . $value . '</li>';
	  }
	?>
  </ul>
  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>