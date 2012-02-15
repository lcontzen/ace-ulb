<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Template {

  public $template = 'template';
  
  public function action_index() {
	$view = new View('page/index');
	$this->template->set('content', $view);
  }

  public function action_comite() {
	$view = new View('page/comite');
	$this->template->set('content', $view);
  }

  public function action_contact() {
	$view = new View('page/contact');

	$form = array(
				  'contact_name' => '',
				  'contact_email' => '',
				  'contact_subject' => '',
				  'contact_message' =>''
				  );

	$errors = $form;
	
	if (isset($_POST['contact_submit'])) {
	  $post = array_map('trim', $_POST);
	  $post = Validation::factory($_POST)
		->rule('contact_name', 'not_empty')
		->rule('contact_email', 'not_empty')
		->rule('contact_email', 'email')
		->rule('contact_subject', 'not_empty')
		->rule('contact_message', 'not_empty');

	  if($post->check()) {
		$to = "lcontzen@gmail.com";
		$from = $this->request->post('contact_email');
		$subject = $this->request->post('contact_subject');
		$message = $this->request->post('contact_message');

		$message .= "\n\n This message was sent to you from ".$this->request->post('contact_name')." and the email given is ".$from;

		Email::send($to, $from, $subject, $message);
		$view->set('form_values', $form);
		$view->set('message', 'Your email was sent!');
		$this->template->set('content', $view);
	  } else {
		$form = arr::overwrite($errors, $post->as_array());
		$errors = arr::overwrite($errors, $post->errors('form_errors'));

		$view->set('errors', $errors);
		$view->set('form_values', $form);

		$this->template->set('content', $view);
	  }
	} else {
	  $view->set('form_values', $form);
	  $this->template->set('content', $view);
	}
  }

  public function action_photos() {
	$view = View::factory('page/photos');
	$this->template->set('content', $view);
  }

  public function action_listesace() {
	$view = View::factory('page/listesace');

	$names = array();
	$dir = "public/listes/ace";
	$lists = scandir($dir);
	$ignore = array(".", "..", "Listes ACE – 2011.docx", ".gitignore");
	foreach ($ignore as $i)
	  unset($lists[array_search($i ,$lists)]);
	$lists = array_values($lists);
	unset($i);

	foreach ($lists as $list) {
	  $tmp = preg_replace("/\\.[^.\\s]{3,4}$/", "", $list);
	  $tmp = str_replace("Liste", "Comité", $tmp);
	  $names[] = $tmp;
	}

	$view->set('names', $names);
	$view->set('lists', $lists);
	$this->template->set('content', $view);
  }

  public function action_tds() {
	$view = View::factory('page/tds');
	$this->template->set('content', $view);
  }
}
?>