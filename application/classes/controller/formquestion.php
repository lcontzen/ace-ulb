<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Formquestion extends Controller_Template_Aceulb {
  public function action_createform() {
	$this->check_admin_status();
	$view = View::factory('formquestion/createform');
	$nbr_of_questions = $this->request->param('nbr');
	if (HTTP_Request::POST == $this->request->method()) {
	  try {
		$post_values = $this->request->post();
		for ($i = 0; $i < $nbr_of_questions; $i++) {
		  $question = ORM::factory('formquestion');
		  $question->body = $post_values['question-'.$i];
		  $question->number = $i;
		  $question->form_slug = $post_values['form_slug'];
		  $question->create();
		}
		$_POST = array();
		$message = 'Added new form with '.$nbr_of_questions.' questions';
		$view->set('message', $message);
	  } catch (ORM_Validation_Exception $e) {
		$message = 'There were errors, please see form below';
		$errors = $e->errors('models');
		$view->set('message', $message);
		$view->set('errors', $errors);
	  }
	}
	$view->set('nbr_of_questions', $nbr_of_questions);
	$this->template->set('content', $view);
  }
}