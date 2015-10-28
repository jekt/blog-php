<?php $pageTitle = "Auteur : " . $user->get('pseudo'); ?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php include(Conf::$DIR_PARTIALS . '_header.php'); ?>

  <h1><?php echo $user->get('pseudo'); ?></h1>
  <ul>
	<?php 
	  echo '<li>ID : ' . $user->get('id') . '</li>';
	  echo '<li>Pseudo : ' . $user->get('pseudo') . '</li>';
	?>
  </ul>
  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>