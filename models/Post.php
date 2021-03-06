<?php
class Post {
  private $id, 
          $title, 
          $content, 
          $pubDate,
          $author,
          $dbc;

  public function __construct($id, $title = null, $fetch = true) {
    $this->id = $id;

    if ($fetch) {
      DBConnection::connect();
      $post = DBConnection::select('SELECT p.id as post_id, p.title, p.content, p.pubDate, u.id as user_id, u.pseudo as author FROM post p INNER JOIN user u ON p.author = u.id WHERE p.id=' . DBConnection::getCleanVar($id));
      $post = $post[0];

      $this->title = $post->title;
      $this->content = $post->content;
      $this->pubDate = $post->pubDate;
      $this->author = new User($post->user_id, $post->author, false);
    } else {
      $this->title = $title;
    }
  }

  static function create($title, $content, $author) {
    DBConnection::connect();
    DBConnection::insert('INSERT INTO post (title, content, author, pubDate) VALUES (\'' . DBConnection::getCleanVar($title) . '\', \'' . DBConnection::getCleanVar($content) . '\', ' . DBConnection::getCleanVar($author) . ', NOW())');
    return DBConnection::getDB()->insert_id;
  }

  static function update($id, $title, $content) {
    DBConnection::connect();
    DBConnection::update('UPDATE post SET title = \'' . DBConnection::getCleanVar($title) . '\', content = \'' . DBConnection::getCleanVar($content) . '\' WHERE id = ' . DBConnection::getCleanVar($id));
    return $id;
  }

  public function get($prop) {
    return $this->$prop;
  }

  static function fetchAll() {
    DBConnection::connect();
    $result = DBConnection::select('SELECT * FROM post');
    $posts = [];
    if ($result) {
      foreach ($result as $post) {
        array_push($posts, new Post($post->id, $post->title, false));
      }
    }
    return $posts;
  }

  static function checkErrors($array) {
    $errors = [];
    if ($array['title'] == '') array_push($errors, 'Le titre ne peut pas être vide !');
    if ($array['content'] == '') array_push($errors, 'Le contenu ne peut pas être vide !');
    return $errors;
  }
}
?>