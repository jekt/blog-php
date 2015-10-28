<?php
class Post {
  private $id, 
          $title, 
          $picture, 
          $content, 
          $pubDate,
          $author,
          $dbc;

  public function __construct($id, $title = null) {
    $this->id = $id;

    if (!$title) {
      $dbc = self::setDB();
      $post = $dbc->select('SELECT p.id as post_id, p.title, p.picture, p.content, p.pubDate, u.id as user_id, u.pseudo as author FROM post p INNER JOIN user u ON p.author = u.id WHERE p.id=' . $id);
      $post = $post[0];

      $this->title = $post->title;
      $this->picture = $this->picture;
      $this->content = $this->content;
      $this->pubDate = $this->pubDate;
      $this->author = new User($post->user_id, $post->author);
    } else {
      $this->title = $title;
    }
  }

  public function create() {

  }

  public function update($properties) {
    foreach($properties as $key => $value) {
      $this[$key] = $value;
    }
  }

  public function get($prop) {
    return $this->$prop;
  }

  static function fetchAll() {
    $dbc = self::setDB();
    $result = $dbc->select('SELECT * FROM post');
    $posts = [];
    foreach ($result as $post) {
      array_push($posts, new Post($post->id, $post->title));
    }
    return $posts;
  }

  static function setDB() {
    require_once(Conf::$DIR_MODELS . 'DBConnection.php');
    return new DBConnection();
  }
}
?>