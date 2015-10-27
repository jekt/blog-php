<?php $pageTitle = 'Article : créer/modifier';?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php include(Conf::$DIR_PARTIALS . '_header.php'); ?>

  <h1><?php echo $pageTitle; ?></h1>
  
  <form action="<?php echo Conf::$BASE_URL; ?>/post/create" method="post">
  	<label>Titre : <input type="text" name="title" placeholder="Titre de l'article..."></label>
  	<label>Image : <input type="file" name="picture"></label>
  	<label>Contenu : <textarea name="content" placeholder="Contenu de l'article..."></textarea></label>
  	<input type="submit" value="Se connecter">
  </form>

  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>