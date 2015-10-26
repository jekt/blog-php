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

  public function fetchAll($table, $offset = 0, $limit = 10) {
    $query = sprintf("SELECT * FROM %s LIMIT %d, %d",
      $this->db->real_escape_string($table),
      $this->db->real_escape_string($offset),
      $this->db->real_escape_string($limit)
    );
  	$result = $this->db->query($query);

    if (!$result) {
      die($query . ' => ' . $this->db->error);
    }

    $n = $result->num_rows;
    if ($n == 0) {
      echo "Aucune ligne trouvée, rien à afficher.";
      exit;
    }

    for ($i = 0; $i < $n; $i++) {
      $rows[$i] = $result->fetch_object();
    }
    return $rows;
  }

  public function select($fields, $tables, $condition = null, $offset = 0, $limit = 10, $orderBy = null) {

  }

  public function update($table, $properties, $condition) {

  }

  public function delete($table, $condition) {

  }
}
?>