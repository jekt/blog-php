<?php
class Router {
  private $uri,
  		  $params,
  		  $controller;

  public function __construct() {
  	$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
	$uri = '/' . substr($_SERVER['REQUEST_URI'], strlen($basepath));
	if (strpos($uri,'?')) {
		$this->params = $_GET;
		$uri = explode('?', $uri);
		$this->uri = $uri[0];
	} else {
		$this->uri = $uri;
	}
  }

  public function get($route, $controller) {
  	$route = preg_replace('#\(\:[a-z]+\)#i', '([a-z0-9-_]{3,})', $route);
  	
  	if (preg_match('#^' . $route . '/?$#i', $this->uri, $ids)) {
  	  if (isset($ids)) {
  	  	$ids = array_slice($ids, 1);
  	  	var_dump($ids);
  	  }
  	  include_once(Conf::$DIR_CONTROLLERS . $controller);
  	  $this->controller = $controller;
  	}
  }

  public function error($fallbackController) {
  	if (!$this->controller) {
  	  http_response_code(404);
  	  include_once(Conf::$DIR_CONTROLLERS . $fallbackController);
  	  $this->controller = $fallbackController;
  	}
  }
}
?>