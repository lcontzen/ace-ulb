<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Admin extends Controller_Template_Aceulb {
  public function action_index() {
	$this->check_admin_status();
	$view = View::factory('admin/index');
	$this->template->set('content', $view);
  }

  private function _function_exists($cercle_id, $function) {
	return ORM::factory('comiteemember')
	  ->where('cercle_id', '=', $cercle_id)
	  ->and_where('function', '=', $function)
	  ->find()
	  ->loaded();
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
		$cercle_id = $this->request->post('cercle_id');
		$function = $this->request->post('function');
		if (!$this->_function_exists($cercle_id, $function)) {
		  $comitee_member = ORM::factory('comiteemember');
		  $values = $this->request->post();
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
		} else {
		  $message = "Ce poste existe déjà";
		  $view->set('message', $message);
		}
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
		$count = 0;
		$functions = $this->request->post('functions');
		$functions_list = explode(', ', $functions);
		foreach ($functions_list as $function_item) {
		  if (!$this->_function_exists($this->request->post('cercle_id'), $function_item)) {
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
			$count = $count + 1;
		  }
		}
		$_POST = array();
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