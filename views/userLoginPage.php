<?php $pageTitle = 'Se connecter';?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php include(Conf::$DIR_PARTIALS . '_header.php'); ?>

  <h1><?php echo $pageTitle; ?></h1>
  
  <form action="<?php echo Conf::$BASE_URL; ?>/user/login" method="post">
  	<label>Email : <input type="email" name="email" placeholder="Votre email..."></label>
  	<label>Mot de passe : <input type="password" name="password" placeholder="Votre mot de passe..."></label>
  	<input type="submit" value="Se connecter">
  </form>

  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>