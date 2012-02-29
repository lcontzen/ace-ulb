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
	if (HTTP_Request::POST == $this->request->method()) {
	  try {
		$person = ORM::factory('person');
		$person->create_person($this->request->post(), array(
															 'first_name',
															 'last_name'));
		$comitee_member = ORM::factory('comiteemember');
		$values = $this->request->post();
		$values['person_id'] = $person->id;
		$comitee_member->create_comitees_member($values, array(
															   'picture_link',
															   'gsm_number',
															   'mail_address',
															   'person_id',
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
	$this->template->set('content', $view);
  }

  public function action_addfunction() {
	$this->check_admin_status();
	$view = View::factory('admin/addfunction');
		$cercles = ORM::factory('cercle')
	  ->find_all();
	$cercles_var = array();
	foreach ($cercles as $cercle) {
	  $cercles_var[$cercle->id] = $cercle->name;
	}
	if (HTTP_Request::POST == $this->request->method()) {
	  try {
		$function = ORM::factory('function');
		$function->create_function($this->request->post(), array(
																 'cercle_id',
																 'comiteemember_id',
																 'name'
																 ));
		$_POST = array();
		$message = "You have added '{$function->name}' to the database";
		$view->set('message', $message);
	  } catch (ORM_Validation_Exception $e) {
		$message = 'There were errors, please see form below.';
		$view->set('message', $message);
		$errors = $e->errors('models');
		$view->set('errors', $errors);
	  }
	}
	$view->set('cercles', $cercles_var);
	$view->set('cercles', $cercles_var);
	$this->template->set('content', $view);
  }
  
}