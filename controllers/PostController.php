<?php
class PostController {
  static function getHomePage() {
  	$posts = Post::fetchAll();
  	include_once(Conf::$DIR_VIEWS . 'homePage.php');
  }

  static function getPostPage() {
  	$post = new Post(Router::$ids[0]);
    include_once(Conf::$DIR_VIEWS . 'postPage.php');
  }

  static function getPostUpdatePage() {
  	if (isset(Router::$ids[0])) {
      $post = new Post(Router::$ids[0]);
      $id = $post->get('id');
      $title = $post->get('title');
      $content = $post->get('content');
      $author = $post->get('author');

      if (unserialize($_SESSION['user'])->get('id') != $author->get('id')) {
        http_response_code(403);
        die('<h1>403 Accès interdit !</h1><p>Vous ne pouvez pas modifier cet article, vous n\'en êtes pas l\'auteur.</p>');
      }
    }

    if (!(isset($_SESSION['user']) && $_SESSION['user'] != null)) {
      http_response_code(403);
      die('<h1>403 Accès interdit !</h1><p>Vous devez être connecté pour créer un article.</p><p><a href="' . Conf::$BASE_URL . '/user/login">Se connecter</a></p>');
    }
  
    if ($_POST != null) {
      extract($_POST);
      $errors = Post::checkErrors($_POST);

  	  if (count($errors) == 0) {
  	    if (!isset(Router::$ids[0])) {
  	      $success = Post::create($title, $content, $author);
  	    } else {
          $success = Post::update(Router::$ids[0], $title, $content);
        }

        if ($success) {
          header('Location: ' . Conf::$BASE_URL . '/post/' . $success);
        }
      }
    } 

    $action = Router::$uri;
    $wording = (Router::$uri == '/post/create') ? 'Créer' : 'Modifier';
    include_once(Conf::$DIR_VIEWS . 'postUpdatePage.php');
  }
}
?>