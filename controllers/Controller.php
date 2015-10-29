<?php 
class Controller {
  protected static function render($view, $data = array()) {
  	extract($data);

  	ob_start();
  	include(Conf::$DIR_VIEWS . $view . '.php');
  	$viewContent = ob_get_contents();
  	ob_end_clean();
  	return $viewContent;
  }
}
?>