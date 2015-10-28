<?php
class Router {
  static $uri,
  		  $params,
  		  $ids,
  		  $routeFound = false;

  static function init() {
  	$uri = str_replace(Conf::$BASE_URL, '', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

  	self::$params = $_GET || [];
    self::$uri = strtok($uri, '?');
  }

  static function r($route, $controller) {
    self::init();
    if (!self::$routeFound) {
    	$route = preg_replace('#\(\:[a-z]+\)#i', '([a-z0-9-_]+)', $route);
    	
    	if (preg_match('#^' . $route . '/?$#i', self::$uri, $ids)) {
    	  if (isset($ids)) {
    	  	self::$ids = array_slice($ids, 1);
    	  }
    	  self::$routeFound = true;
    	  include_once(Conf::$DIR_CONTROLLERS . $controller);
    	}
    }
  }

  static function error($fallbackController) {
  	if (!self::$routeFound) {
  	  http_response_code(404);
      self::$routeFound = true;
  	  include_once(Conf::$DIR_CONTROLLERS . $fallbackController);
  	}
  }

  static function get($prop) {
    return self::$$prop;
  }
}
?>