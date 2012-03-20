<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Printer extends Controller_Template_Printing {
  public function action_test() {
	$view = View::factory('printer/listsgenerator');
	$this->template->set('content', $view);
  }
}