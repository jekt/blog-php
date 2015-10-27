<?php $pageTitle = "Auteur : " . $user->pseudo; ?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php include(Conf::$DIR_PARTIALS . '_header.php'); ?>

  <h1><?php echo $user->pseudo; ?></h1>
  <ul>
	<?php 
	  foreach($user as $key => $value) {
	  	echo '<li>' . $key . ' : ' . $value . '</li>';
	  }
	?>
  </ul>
  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>