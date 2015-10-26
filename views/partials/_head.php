<head>
  <title>
  	<?php 
  	  if (isset($pageTitle)) {
  	  	echo $pageTitle; 
  	  } else {
  	  	echo 'Un joli blog en PHP';
  	  }
  	?>
  </title>

  <?php include(Conf::$DIR_PARTIALS . '_customMetas.php'); ?>
</head>