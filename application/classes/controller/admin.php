<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Admin extends Controller_Template_Aceulb {
  public function action_index() {
	$this->check_admin_status();
	$view = View::factory('admin/index');
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