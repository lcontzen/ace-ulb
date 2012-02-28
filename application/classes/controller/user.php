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
  
  public function action_login() {
	$view = View::factory('user/login');
	$message = '';
	if (HTTP_Request::POST == $this->request->method()) {
	  $remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
	  $user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);
	  if ($user) {
		if(Auth::instance()->logged_in('admin'))
		  $this->request->redirect('admin/index');
		else
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

  public function action_view() {
	$this->check_admin_status();
	$view = View::factory('user/view');
	$id = $this->request->param('id');
	$user = ORM::factory('user')
	  ->where('id', '=', $id)
	  ->find();
	if ($user->loaded()) {
	  $view->set('user', $user);
	}
	$this->template->set('content', $view);
  }

  public function action_add() {
	$this->check_admin_status();
	$view = View::factory('user/add');
	$message = '';
	$errors = '';
	$cercles = ORM::factory('cercle')
	  ->find_all();
	$cercles_var = array();
	foreach ($cercles as $cercle) {
	  $cercles_var[$cercle->id] = $cercle->name;
	}
	if (HTTP_Request::POST == $this->request->method()) {
	  try {
		$person = ORM::factory('person');
		$person->create_person($this->request->post(), array(
															 'first_name',
															 'last_name'));
		$user = ORM::factory('user');
		$values = $this->request->post();
		$values['person_id']  = $person->id;
		$user->create_user($values, array(
														 'username',
														 'password',
														 'status',
														 'person_id',
														 'cercle_id'
														 ));
		$user->add('roles', ORM::factory('role', array('name' => 'login' )));
		$_POST = array();
		$message = "You have added '{$user->username}' to the database";
	  } catch (ORM_Validation_Exception $e) {
		$message = 'There were errors, please see form below.';
		$errors = $e->errors('models');
	  }
	}
	$view->set('cercles', $cercles_var);
	$view->set('message', $message);
	$view->set('errors', $errors);
	$this->template->set('content', $view);
  }

  public function action_promoteadmin() {
	$user = Auth::instance()->get_user();
	$dbuser = ORM::factory('user')
	  ->where('id', '=', $user->id)
	  ->find();
	if ($dbuser->loaded()) {
	  if (!Auth::instance()->logged_in('admin')) {
		try {
		  $dbuser->add('roles', ORM::factory('role', array('name' => 'admin')));
		} catch (ORM_Validation_Exception $e) {
		  echo $e;
		}
	  }
	}
	else {
	  echo 'failed';
	}
  }
}
