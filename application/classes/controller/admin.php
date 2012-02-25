<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Admin extends Controller_Template_Aceulb {
  private function check_admin_status() {
	if (!Auth::instance()->logged_in('admin')) {
	  $this->request->redirect('user/login');
	}
  }
  public function action_index() {
	$this->check_admin_status();
	$view = View::factory('admin/index');
	$this->template->set('content', $view);
  }
}