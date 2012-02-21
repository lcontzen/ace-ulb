<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Error extends Controller_Template_Nobrand {
  public function before() {
	if (Request::$initial !== Rquest::$current) {
	  if ($message = rawurldecode($this->request->param('message'))) {
		$this->template->message = $message;
	  }
	} else {
	  $this->request->action(404);
	}
	$this->response->status((int)$this->request->action());
  }

  public function action_404() {
	$this->template->title = '404 Not Found';
	$this->template->content = View::factory('error/404' );
  }
  
  public function action_500() {
	$this->template->title = 'Internal Server Error';
	$this->template->content = View::factory('error/500' );
  }

  public function action_503() {
	$this->template->title = 'Internal Server Error';
	$this->template->content = View::factory('error/503' );
  }
}
