<?php
class DBConnection {
  private static $db;

  static function connect() {
  	self::$db = new mysqli(
      Conf::$DB_HOST, 
      Conf::$DB_USER, 
      Conf::$DB_PASSWORD,
      Conf::$DB_SELECT,
      Conf::$DB_PORT
    );

    if (self::$db->connect_errno) {
      die('Erreur de connexion (' . self::$db->connect_errno . ') ' . self::$db->connect_error);
    }
  }

  static function select($query) {
    $result = self::doRequest($query);

    $n = $result->num_rows;
    if ($n == 0) {
      return false;
    }
    
    for ($i = 0; $i < $n; $i++) {
      $rows[$i] = $result->fetch_object();
    }
    
    return $rows;
  }

  static function update($query) {
    return self::doRequest($query);
  }

  static function insert($query) {
    return self::doRequest($query);
  }

  private static function doRequest($query) {
    $query = trim($query);
    $result = self::$db->query($query);

    if (!$result) {
      die($query . ' => ' . self::$db->error);
    }

    return $result;
  }

  static function getCleanVar($var) {
    return self::$db->real_escape_string(trim($var));
  }

  static function getDB() {
    return self::$db;
  }
}
?>