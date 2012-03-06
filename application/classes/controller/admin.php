<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Admin extends Controller_Template_Aceulb {
  public function action_index() {
	$this->check_admin_status();
	$view = View::factory('admin/index');
	$this->template->set('content', $view);
  }

  public function action_addcomiteemember() {
	$this->check_admin_status();
	$view = View::factory('admin/addcomiteemember');
	$cercles = ORM::factory('cercle')
	  ->find_all();
	$cercles_var = array();
	foreach ($cercles as $cercle) {
	  $cercles_var[$cercle->id] = $cercle->name;
	}
	if (HTTP_Request::POST == $this->request->method()) {
	  try {
		/* $person = ORM::factory('person'); */
		/* $person->create_person($this->request->post(), array( */
		/* 													 'first_name', */
		/* 													 'last_name')); */
		$comitee_member = ORM::factory('comiteemember');
		$values = $this->request->post();
		/* $values['person_id'] = $person->id; */
		$comitee_member->create_comitees_member($values, array(
															   'cercle_id',
															   'function',
															   'first_name',
															   'last_name',
															   'picture_link',
															   'gsm_number',
															   'mail_address',
															   ));
		$_POST = array();
		$message = "Comitee member added!";
		$view->set('message', $message);
	  } catch (ORM_Validation_Exception $e) {
		$message = 'There were errors, please see form below.';
		$view->set('message', $message);
		$errors = $e->errors('models');
		$view->set('errors', $errors);
	  }
	}
	$view->set('cercles', $cercles_var);
	$this->template->set('content', $view);
  }
  
  public function action_addflist() {
	$this->check_admin_status();
	$view = View::factory('admin/addflist');
	$cercles = ORM::factory('cercle')
	  ->find_all();
	$cercles_var = array();
	foreach ($cercles as $cercle) {
	  $cercles_var[$cercle->id] = $cercle->name;
	}
	if (HTTP_Request::POST == $this->request->method()) {
	  try {
		$functions = $this->request->post('functions');
		$functions_list = explode(', ', $functions);
		foreach ($functions_list as $function_item) {
		  $values = array();
		  $values['function'] = $function_item;
		  $values['cercle_id'] = $this->request->post('cercle_id');
		  $comitee_member = ORM::factory('comiteemember');
		  $comitee_member->create_comitees_member($values, array(
																 'cercle_id',
																 'function',
																 'first_name',
																 'last_name',
																 'picture_link',
																 'gsm_number',
																 'mail_address',
																 ));
		}
		$_POST = array();
		$count = count($functions_list);
		$message = "You have added {$count} functions to the database";
		$view->set('message', $message);
	  } catch (ORM_Validation_Exception $e) {
		$message = 'There were errors, please see form below.';
		$view->set('message', $message);
		$errors = $e->errors('models');
		$view->set('errors', $errors);
	  }
	}
	$view->set('cercles', $cercles_var);
	$this->template->set('content', $view);	
  }
  
}