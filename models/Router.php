<?php
class Router {
  private $uri,
  		  $params,
  		  $ids,
  		  $controller;

  public function __construct() {
  	$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
	$uri = '/' . substr($_SERVER['REQUEST_URI'], strlen($basepath));
	$this->params = array();
	if (strpos($uri,'?')) {
		$this->params = $_GET;
		$uri = explode('?', $uri);
		$this->uri = $uri[0];
	} else {
		$this->uri = $uri;
	}
  }

  public function get($route, $controller) {
  	$route = preg_replace('#\(\:[a-z]+\)#i', '([a-z0-9-_]+)', $route);
  	
  	if (preg_match('#^' . $route . '/?$#i', $this->uri, $ids)) {
  	  if (isset($ids)) {
  	  	$this->ids = array_slice($ids, 1);
  	  }
  	  $this->controller = $controller;
  	  include_once(Conf::$DIR_CONTROLLERS . $controller);
  	}
  }

  public function error($fallbackController) {
  	if (!$this->controller) {
  	  http_response_code(404);
  	  $this->controller = $fallbackController;
  	  include_once(Conf::$DIR_CONTROLLERS . $fallbackController);
  	}
  }

  public function getURI() {
  	return $this->uri;
  }

  public function getParams() {
  	return $this->params;
  }

  public function getIds() {
  	return $this->ids;
  }
}
?>