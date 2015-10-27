<?php $pageTitle = 'Liste des auteurs';?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php include(Conf::$DIR_PARTIALS . '_header.php'); ?>

  <h1><?php echo $pageTitle; ?></h1>
  <ul>
	<?php 
	  foreach($users as $user) {
	  	echo '<li><a href="' . Conf::$BASE_URL . '/user/' . $user->id .'">' . $user->pseudo . '</a></li>';
	  }
	?>
  </ul>
  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>