<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Admin extends Controller_Template_Aceulb {
  public function action_index() {
	$this->check_admin_status();
	$view = View::factory('admin/index');
	$this->template->set('content', $view);
  }

  public function action_adduser() {
	$this->check_admin_status();
	$view = View::factory('admin/adduser');
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

  public function action_addnews() {
	$this->check_admin_status();
	$message = '';
	$errors = '';
	$view = View::factory('admin/addnews');
	if (HTTP_Request::POST == $this->request->method()) {
	  try {
		$author = Auth::instance()->get_user();
		$news = ORM::factory('article');
		$values = $this->request->post();
		$values['type'] = 'news';
		$values['author_id'] = $author->id;
		$news->create_article($values, array(
											 'type',
											 'slug',
											 'title',
											 'body',
											 'author_id'
											 ));
		$_POST = array();
		$message = "News added";
	  } catch (ORM_Validation_Exception $e) {
		$message = 'There were errors, please see form below.';
		$errors = $e->errors('models');
	  }
	}
	$view->set('errors', $errors);
	$view->set('message', $message);
	$this->template->set('content', $view);
  }
  
}