<nav>
  <ol>
    <li>
	  <a href="<?php echo Conf::$BASE_URL; ?>/">Accueil</a>
	</li>
	<li>
	  <a href="<?php echo Conf::$BASE_URL; ?>/post/create">Nouvel article</a>
	</li>
	<li>
	  <a href="<?php echo Conf::$BASE_URL; ?>/users">Auteurs</a>
	</li>
	<li>
	  <?php 
	  	if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
	  	  echo '<a href="' . Conf::$BASE_URL . '/user/logout">Se déconnecter (' . unserialize($_SESSION['user'])->get('pseudo') . ')</a>';
	  	} else {
	  	  echo '<a href="' . Conf::$BASE_URL . '/user/login">Se connecter</a>';
	  	}
	  ?>
	  
	</li>
	<li>
	  <a href="<?php echo Conf::$BASE_URL; ?>/404">404</a>
	</li>
  </ol>
</nav>