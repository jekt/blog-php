<?php
class Post {
  private $id, 
          $title, 
          $picture, 
          $content, 
          $pubDate,
          $author,
          $url;

  public function __construct($id) {
    $this->retrieve($id);
  }

  public function create() {

  }

  public function retrieve($id) {
    $this->id = $id;
    $this->title = "";
    $this->picture = "";
    $this->content = "";
    $this->pubDate = "";
    $this->author = new User();
    $this->url = "";
  }

  public function update($properties) {
    foreach($properties as $key => $value) {
      $this[$key] = $value;
    }
  }

  public function delete() {
    
  }
}
?>