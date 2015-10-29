<?php
  class Conf {
  	static $DB_HOST 		    = 'localhost',
           $DB_PORT 		    = 8889,
           $DB_USER 		    = 'root',
           $DB_PASSWORD 	  = 'root',
           $DB_SELECT 		  = 'blog',
           $DIR_CONTROLLERS = 'controllers/',
           $DIR_MODELS 		  = 'models/',
           $DIR_VIEWS 		  = 'views/',
           $DIR_PARTIALS	  = 'views/partials/',
           $DEBUG_MODE      = true,
           $BASE_URL        = '';

    static function init() {
      self::baseUrl();
    }

    private static function baseUrl() {
      self::$BASE_URL = implode('/', explode('/', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], -1));
    }
  }
?>