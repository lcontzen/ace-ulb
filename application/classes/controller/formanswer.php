<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Formanswer extends Controller_Template_Aceulb {
  public function action_form() {
	$slug = $this->request->param('slug');
	$formquestions = ORM::factory('formquestion')
	  ->where('form_slug', '=', $slug)
	  ->order_by('number')
	  ->find_all();
	if ($formquestions) {
	  $view = View::factory('formanswer/form');
	  if (HTTP_Request::POST == $this->request->method()) {
		try {
		  $nbr_of_questions = count($formquestions);
		  $post_values = $this->request->post();
		  for ($i = 0; $i < $nbr_of_questions; $i++) {
			$answer = ORM::factory('formanswer');
			$answer->body = $post_values['question-'.$i];
			$answer->question_number = $i;
			$answer->form_slug = $slug;
			$answer->create();
		  }
		  $_POST = array();
		  $this->request->redirect('formanswer/success');
		}catch (ORM_Validation_Exception $e) {
		  $message = 'There were errors, please see form below';
		  $errors = $e->errors('models');
		  $view->set('message', $message);
		  $view->set('errors', $errors);
		}
	  }
	  $view->set('slug', $slug);
	  $view->set('formquestions', $formquestions);
	  $this->template->set('content', $view);
	}
  }

  public function action_success() {
	$content = '<div class="page-header"><h1>Merci de votre participation</h1</div>';
	$this->template->set('content', $content);
  }
  
}
/* 	$nbr_of_questions = $this->request->param('nbr');
/* 	if (HTTP_Request::POST == $this->request->method()) { */
/* 	  try { */
/* 		$post_values = $this->request->post(); */
/* 		for ($i = 0; $i < $nbr_of_questions; $i++) { */
/* 		  $question = ORM::factory('formquestion'); */
/* 		  $question->body = $post_values['question-'.$i]; */
/* 		  $question->number = $i; */
/* 		  $question->form_slug = $post_values['form_slug']; */
/* 		  $question->create(); */
/* 		} */
/* 		$_POST = array(); */
/* 		$message = 'Added new form with '.$nbr_of_questions.' questions'; */
/* 		$view->set('message', $message); */
/* 	  } catch (ORM_Validation_Exception $e) { */
/* 		$message = 'There were errors, please see form below'; */
/* 		$errors = $e->errors('models'); */
/* 		$view->set('message', $message); */
/* 		$view->set('errors', $errors); */
/* 	  } */
/* 	} */
/* 	$view->set('nbr_of_questions', $nbr_of_questions); */
/* 	$this->template->set('content', $view); */
/*   } */
/* } */