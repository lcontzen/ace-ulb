<?php
class Controller_Login extends Controller_Template_Website {
  Session::instance()->set('key', 'value');
  Session::instance()->get('key');
  
  public function action_index() {
	$this->template->title = 'Log in';
	$this->template->content = View::factory('login');
  }

  public function action_showinfooverlay() {
	$this->template = 'template/overlay';
	parent::before();
	$this->template->title = 'Log in';
	$this->template->content = View::factory('login');   
  }
}
?>