<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Article extends Controller_Template_Aceulb {
  public function action_view() {
	$slug = $this->request->param('slug');
	$article = ORM::factory('article')
	  ->where('slug', '=', $slug)
	  ->find();
	if ($article->loaded()) {
	  $view = View::factory('article/index');
	  $view->set('page_title', $article->title);
	  $view->set('page_body', $article->body);
	  $this->template->set('content', $view);
	}
	else {
	  $view = View::factory('article/index');
	  $view->set('page_title', 'Error');
	  $view->set('page_body', 'Error');
	  $this->template->set('content', $view);
	}
  }
}