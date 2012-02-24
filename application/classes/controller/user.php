<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_User extends Controller_Template_Aceulb {
  public function action_index() {
	$view = View::factory('user/info');
	$user = Auth::instance()->get_user();
	
	if (!$user) {
	  $this->request->redirect('user/login');
	}
	$view->set('user', $user);
	$this->template->set('content', $view);
  }
  
  public function action_create() {
	$view = View::factory('user/create');
	$message = '';
	$errors = '';
	if (HTTP_Request::POST == $this->request->method()) {
	  try {
		$user = ORM::factory('user');
		$user->create_user($this->request->post(), array(
														 'username',
														 'password',
														 'email'
														 ));
		$user->add('roles', ORM::factory('role', array('name' => 'login' )));
		$_POST = array();
		$message = "You have added '{$user->username}' to the database";
	  } catch (ORM_Validation_Exception $e) {
		$message = 'There were errors, please see form below.';
		$errors = $e->errors('models');
	  }
	}
	$view->set('message', $message);
	$view->set('errors', $errors);
	$this->template->set('content', $view);
  }
  
  public function action_login() {
	$view = View::factory('user/login');
	$message = '';
	if (HTTP_Request::POST == $this->request->method()) {
	  $remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
	  $user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);
	  if ($user) {
		$this->request->redirect('user/index');
	  } else {
		$message = 'Login failed';
	  }
	}
	$view->set('message', $message);
	$this->template->set('content', $view);	
  }

  public function action_logout() {
	Auth::instance()->logout();
	$this->request->redirect('user/login');
  }
}
