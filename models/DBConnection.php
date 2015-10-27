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
    return $this->select('*', $table);
  }

  public function select($fields, $tables, $condition = null, $offset = 0, $limit = 10, $orderBy = null) {
    $query = sprintf("SELECT %s FROM %s %s LIMIT %d, %d %s",
      $this->db->real_escape_string($fields),
      $this->db->real_escape_string($tables),
      ($condition) ? "WHERE " . $this->db->real_escape_string($condition) : '',
      $this->db->real_escape_string($offset),
      $this->db->real_escape_string($limit),
      ($orderBy) ? "ORDER BY " . $this->db->real_escape_string($orderBy) : ''
    );
    $result = $this->db->query($query);

    if (!$result) {
      die($query . ' => ' . $this->db->error);
    }

    switch ($result->num_rows) {
      case 0:
        return false;
        break;
      case 1:
        $rows = $result->fetch_object();
        break;
      default:
        for ($i = 0; $i < $result->num_rows; $i++) {
          $rows[$i] = $result->fetch_object();
        }
    }
    
    return $rows;
  }

  public function update($table, $properties, $condition) {

  }

  public function delete($table, $condition) {

  }
}
?>