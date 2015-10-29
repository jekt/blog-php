<?php $pageTitle = "Article : " . $post->get('title'); ?>

<html>
<?php include(Conf::$DIR_PARTIALS . '_head.php'); ?>
<body>
  <?php include(Conf::$DIR_PARTIALS . '_header.php'); ?>
  
  <h1><?php echo $post->get('title'); ?></h1>
  <?php if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->get('id') == $post->get('author')->get('id')) {
  	echo '<p><a href="' . Conf::$BASE_URL . '/post/' . $post->get('id') . '/update">Modifier cet article</a></p>';
  	}
  ?>
  <ul>
	<?php 
	  echo '<li>ID : ' . $post->get('id') . '</li>';
	  echo '<li>Title : ' . $post->get('title') . '</li>';
	  echo '<li>Picture : ' . $post->get('picture') . '</li>';
	  echo '<li>Content : ' . $post->get('content') . '</li>';
	  echo '<li>PubDate : ' . $post->get('pubDate') . '</li>';
	  echo '<li>Author : <a href="' . Conf::$BASE_URL . '/user/' . $post->get('author')->get('id') . '">' . $post->get('author')->get('pseudo') . '</a></li>';
	?>
  </ul>
  <?php include(Conf::$DIR_PARTIALS . '_footer.php'); ?>
</body>
</html>