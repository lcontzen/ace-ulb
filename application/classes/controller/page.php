<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Template {

  public $template = 'template';
  
  public function action_index() {
	$view = new View('page/index');
	$this->template->set('content', $view);
  }
}
?>