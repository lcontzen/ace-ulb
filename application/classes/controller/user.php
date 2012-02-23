<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_User extends Controller_Template_Aceulb {
  public function action_index() {
	$view = View::factory('user/index');
	$this->template->set('content', $view);
  }
  
  public function action_create() {
	$view = View::factory('user/create')
	  ->set('values', $_POST)
	  ->bind('errors', $errors);
	if ($_POST) {
	  $user = ORM::factory('user')
		->values($_POST, array('username', 'password'));
	  $external_values = array(
							   'password' => Arr::get($_POST, 'password'),
							   ) + Arr::get($_POST, '_external', array());
	  $extra = Validation::factory($external_values)
		->rule('password_confirm', 'matches', array(':validation', ':field', 'password'));
	  try {
		$user->save($extra);
		/* $this->request->redirect('user/'.$user->id); */
		$this->request->redirect('user/index');
	  } catch (ORM_Validation_Exception $e) {
		$errors = $e->errors('models');
	  }
	}
	$this->template->set('content', $view);
	/* $this->response->body($view); */
  }
}