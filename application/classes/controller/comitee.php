<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Comitee extends Controller_Template_Aceulb {
  public function action_view() {
	$this->check_logged_in_status();
	$view = View::factory('comitee/view');
	$name = $this->request->param('name');
	$cercle_id = ORM::factory('cercle')
	  ->where('name', '=', $name)
	  ->find()
	  ->id;
	$comitee_members = ORM::factory('comiteemember')
	  ->where('cercle_id', '=', $cercle_id)
	  ->order_by('id')
	  ->find_all();
	$view->set('comitee_name', $name);
	$view->set('comitee_members', $comitee_members);
	$this->template->set('content', $view);
  }
}