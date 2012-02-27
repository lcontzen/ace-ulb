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
