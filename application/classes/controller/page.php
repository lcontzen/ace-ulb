<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Template_Aceulb {

  public function action_index() {
	$view = View::factory('page/index');
	$news = ORM::factory('article')
	  ->where('type', '=', 'news')
	  ->order_by('id', 'desc')
	  ->limit(3)
	  ->find_all();
	$view->set('news', $news);
	$this->template->title .= ' - Accueil';
	$this->template->set('content', $view);
  }

  public function action_view() {
	$slug = $this->request->param('slug');
	if ($slug == 'index') {
	  $this->request->redirect('page/index');
	}
	$view = View::factory('article');
	$page = ORM::factory('article')
	  ->where('type', '=', 'page')
	  ->and_where('slug', '=', $slug)
	  ->find();
	$view->set('body', $page->body);
	$this->template->set('content', $view);
  }

  public function action_comite() {
	$view = View::factory('page/comite');
	$this->template->title .= ' - Comité 2011-2012';
	$this->template->set('content', $view);
  }

  public function action_contact() {
	$view = View::factory('page/contact');
	$this->template->title .= ' - Contact';
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
	$this->template->title .= ' - Photos';
	$this->template->set('content', $view);
  }

  public function action_listesace() {
	$view = View::factory('page/listesace');
	$this->template->title .= ' - Listes ACE';
	
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
	$this->template->title .= ' - Agenda des TDs';
	$this->template->set('content', $view);
  }
  
  public function action_bals() {
	$view = View::factory('page/bals');
	$this->template->title .= ' - Agenda des bals';
	$this->template->set('content', $view);
  }

  public function action_quetesociale() {
	$view = View::factory('page/quetesociale');
	$this->template->title .= ' - Quête sociale';
	$this->template->set('content', $view);
  }

  public function action_ntv() {
	$view = View::factory('page/ntv');
	$this->template->title .= ' - Nuit Théodore Verhaegen';
	$this->template->set('content', $view);
  }

  public function action_links() {
	$cercles = new Model_Links();
	$view = View::factory('page/links');
	$this->template->title .= ' - Liens';
	$view->set('cercles', $cercles->get_informations());
	$this->template->set('content', $view);
  }

  public function action_heresie() {
	$view = View::factory('page/heresie');
	$this->template->title .= ' - Hérésie';
	$this->template->set('content', $view);
  }

  private function create_zip($files = array(),$destination = '',$overwrite = true) {
	if(file_exists($destination) && !$overwrite) { return false; }
	$valid_files = array();
	if(is_array($files)) {
	  foreach($files as $file) {
		if(file_exists($file)) {
		  $valid_files[] = $file;
		}
	  }
	}
	if(count($valid_files)) {
	  $zip = new ZipArchive();
	  if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
		return false;
	  }
	  foreach($valid_files as $file) {
		$new_filename = substr($file,strrpos($file,'/') + 1);
		$zip->addFile($file,$new_filename);
	  }
	  //debug
	  //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
	  $zip->close();
	  return file_exists($destination);
	}
	else {
	  return false;
	}
  }
  
  public function action_vlecks() {
	$view = View::factory('page/vlecks');
	$this->template->title .= ' - Listes Vlecks';
	
	$names = array();
	$dir = "public/listes/vlecks";
	$lists = scandir($dir);
	$ignore = array(".", "..", ".gitignore", "listesvlecks.zip");
	foreach ($ignore as $i)
	  unset($lists[array_search($i ,$lists)]);
	$lists = array_values($lists);
	unset($i);

	$to_zip = array();
	foreach($lists as $i) {
	  $to_zip[] = $dir . "/" . $i;
	}
	$result = $this->create_zip($to_zip,'public/listes/vlecks/listesvlecks.zip');

	foreach ($lists as $list) {
	  $tmp = preg_replace("/\\.[^.\\s]{3,4}$/", "", $list);
	  $tmp = explode(" ", $tmp);
	  $tmp = str_replace("_", " ", $tmp);
	  $names[] = $tmp;
	}
	
	$view->set('zip_created', $result);
	$view->set('lists', $lists);
	$view->set('names', $names);
	$this->template->set('content', $view);
  }
}
?>