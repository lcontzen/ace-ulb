<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Article extends Controller_Template_Aceulb {
  public function action_view() {
	$slug = $this->request->param('slug');
	$article = ORM::factory('article')
	  ->where('slug', '=', $slug)
	  ->find();
	if ($article->loaded()) {
	  $view = View::factory('article');
	  $view->set('page_title', $article->title);
	  $view->set('page_body', $article->body);
	  $this->template->set('content', $view);
	}
	else {
	  $view = View::factory('article');
	  $view->set('page_title', 'Error');
	  $view->set('page_body', 'Error');
	  $this->template->set('content', $view);
	}
  }
  
  public function action_addnews() {
	$this->check_admin_status();
	$message = '';
	$errors = '';
	$view = View::factory('article/addnews');
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