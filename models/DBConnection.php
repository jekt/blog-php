<?php
class DBConnection {
  private $db;

  public function __construct() {
  	$this->db = new mysqli(
      Conf::$DB_HOST, 
      Conf::$DB_USER, 
      Conf::$DB_PASSWORD,
      Conf::$DB_SELECT,
      Conf::$DB_PORT
    );

    if ($this->db->connect_errno) {
      die('Erreur de connexion (' . $this->db->connect_errno . ') ' . $this->db->connect_error);
    }
  }

  public function __destruct() {
    $this->db->close();
  }

  public function select($query) {
    $result = $this->doRequest($query);

    $n = $result->num_rows;
    if ($n == 0) {
      return false;
    }
    
    for ($i = 0; $i < $n; $i++) {
      $rows[$i] = $result->fetch_object();
    }
    
    return $rows;
  }

  public function update($query) {
    return $this->doRequest($query);
  }

  public function insert($query) {
    return $this->doRequest($query);
  }

  private function doRequest($query) {
    $query = trim($query);
    $result = $this->db->query($query);

    if (!$result) {
      die($query . ' => ' . $this->db->error);
    }

    return $result;
  }

  public function clean($var) {
    return $this->db->real_escape_string(trim($var));
  }

  public function get($prop) {
    return $this->$prop;
  }
}
?>