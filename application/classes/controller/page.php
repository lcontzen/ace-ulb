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
  
  public function action_bals() {
	$view = View::factory('page/bals');
	$this->template->set('content', $view);
  }

  public function action_quetesociale() {
	$view = View::factory('page/quetesociale');
	$this->template->set('content', $view);
  }

  public function action_ntv() {
	$view = View::factory('page/ntv');
	$this->template->set('content', $view);
  }

  public function action_links() {
	$cercles = array(
					 "agro" => 
					 array("name" =>"AGRO - Cercle des BioIngénieurs",
						   "web" => "http://www.cercle-agro.be/",
						   "logo" => "public/images/logos/agro.png"),
					 "care" => 
					 array("name" =>"CARé - Cercle des Architectes Réunis",
						   "web" => "http://www.facebook.com/groups/400216605564/",
						   "logo" => "public/images/logos/care.jpg"),
					 "cd" => 
					 array("name" =>"CD - Cercle de Droit",
						   "web" => "http://www.cerclededroit.be/",
						   "logo" => "public/images/logos/cd.png"),
					 "cdh" => 
					 array("name" =>"CdH - Cercle d'Histoire",
						   "web" => "http://www.cerclehistoire.be",
						   "logo" => "public/images/logos/cdh.png"),
					 "cds" => 
					 array("name" =>"CdS - Cercle des Sciences",
						   "web" => "http://www.cercledessciences.be",
						   "logo" => "public/images/logos/cds.jpg"),
					 "cebulb" => 
					 array("name" =>"CEBULB - Cercle des Étudiants du Borinage",
						   "web" => "http://www.cebulb.be",
						   "logo" => "public/images/logos/cebulb.png"),
					 "cecs" => 
					 array("name" =>"CECS - Cercle des Étudiants du Centre et ses Sympathisants",
						   "web" => "https://sites.google.com/site/cecsulb/",
						   "logo" => "public/images/logos/cecs.jpg"),
					 "celb" => 
					 array("name" =>"CELB - Cercle des Étudiants Luxembourgeois à Bruxelles",
						   "web" => "http://www.celb.lu",
						   "logo" => "public/images/logos/celb.jpg"),
					 "cepha" => 
					 array("name" =>"CePHA - Cercle des Étudiants en Pharmacie",
						   "web" => "http://dev.ulb.ac.be/student/cepha/",
						   "logo" => "public/images/logos/cepha.jpg"),
					 "cgeo" => 
					 array("name" =>"CGEO - Cercle de Géographie et de Géologie",
						   "web" => "http://www.cgeo.be",
						   "logo" => "public/images/logos/cgeo.jpg"),
					 "chaa" => 
					 array("name" =>"CHAA - Cercle d'Histoire de l'Art et Archéologie",
						   "web" => "http://www.chaa.be",
						   "logo" => "public/images/logos/chaa.png"),
					 "chimacienne" => 
					 array("name" =>"Chimacienne - Cercle de la Chimacienne de Bruxelles",
						   "web" => "http://chimacienne-bxl.e-monsite.com/",
						   "logo" => "public/images/logos/chimacienne.png"),
					 "ci" => 
					 array("name" =>"CI - Cercle Informatique",
						   "web" => "http://www.cerkinfo.be",
						   "logo" => "public/images/logos/ci.jpg"),
					 "ciga" => 
					 array("name" =>"CIGA - Cercle des Infirmiers Gradués et Accoucheuses",
						   "web" => "http://www.ulb.ac.be/students/ciga/",
						   "logo" => "public/images/logos/ciga.png"),
					 "cjc" => 
					 array("name" =>"CJC - Cercle de Journalisme et Communication",
						   "web" => "http://www.cjculb.be",
						   "logo" => "public/images/logos/cjc.jpg"),
					 "ck" => 
					 array("name" =>"CK - Cercle de Kinésithérapie",
						   "web" => "http://www.cerclekine.be",
						   "logo" => "public/images/logos/ck.png"),
					 "cm" => 
					 array("name" =>"CM - Cercle de Médecine",
						   "web" => "http://www.cercle-medecine.be",
						   "logo" => "public/images/logos/cm.png"),
					 "cp" => 
					 array("name" =>"CP - Cercle Polytechnique",
						   "web" => "http://www.cerclepolytechnique.be",
						   "logo" => "public/images/logos/cp.png"),
					 "cpl" => 
					 array("name" =>"CPL - Cercle de Philosophie et Lettres",
						   "web" => "http://www.cercle-philo.be",
						   "logo" => "public/images/logos/cpl.jpg"),
					 "cps" => 
					 array("name" =>"CPS - Cercle des Étudiants en Sciences Politiques et Sociales",
						   "web" => "http://www.cpsulb.be",
						   "logo" => "public/images/logos/cps.png"),
					 "cpsy" => 
					 array("name" =>"CPSY - Cercle de Psychologie",
						   "web" => "http://www.students-psycho.site.ulb.ac.be/CPSY/",
						   "logo" => "public/images/logos/cpsy.png"),
					 "crom" => 
					 array("name" =>"CROM - Cercle de Romanes",
						   "web" => "http://www.romanes.be",
						   "logo" => "public/images/logos/crom.png"),
					 "cs" => 
					 array("name" =>"CS - Cercle Solvay",
						   "web" => "http://www.cercle-solvay.be",
						   "logo" => "public/images/logos/cs.png"),
					 "fronta" => 
					 array("name" =>"FRONTA - Cercle La Frontalière",
						   "web" => "http://www.lafronta.be",
						   "logo" => "public/images/logos/fronta.png"),
					 "isep" => 
					 array("name" =>"ISEP - Cercle d'Éducation Physique",
						   "web" => "http://sites.google.com/site/cercleisep/",
						   "logo" => "public/images/logos/isep.png"),
					 "lux" => 
					 array("name" =>"La LUX - Cercle des Étudiants de la Province du Luxembourg",
						   "web" => "http://www.luxbxl.be",
						   "logo" => "public/images/logos/lux.jpg"),
					 "librex" => 
					 array("name" =>"Librex - Cercle du Libre Examen",
						   "web" => "http://www.librex.be",
						   "logo" => "public/images/logos/librex.png"),
					 "nam" => 
					 array("name" =>"Namuroise - Cercle de la Namuroise de Bruxelles",
						   "web" => "http://www.namuroise-bxl.be",
						   "logo" => "public/images/logos/nam.jpg"),
					 "semeur" => 
					 array("name" =>"Semeur - Cercle des étudiants du pays de Charleroi et de Thudinie",
						   "web" => "http://www.lesemeur.be",
						   "logo" => "public/images/logos/semeur.png")
					 );
	
	$view = View::factory('page/links');
	$view->set('cercles', $cercles);
	$this->template->set('content', $view);
  }

  public function action_heresie() {
	$view = View::factory('page/heresie');
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
	  $names[] = $tmp[0];
	}
	
	$view->set('zip_created', $result);
	$view->set('lists', $lists);
	$view->set('names', $names);
	$this->template->set('content', $view);
  }
}
?>