<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Template_Aceulb extends Controller_Template {
  public $template = 'template/aceulb';

  public function before() {
	parent::before();
	if ($this->auto_render) {
	  $this->template->title = 'Association des Cercles Etudiants';
	  $this->template->content = '';
	  $this->template->styles = array();
	  $this->template->scripts = array(); 
	}
  }

  public function after() {
	if ($this->auto_render) {
	  $styles = array(
					  'public/theme/css/style.css' => 'screen, projection',
					  'public/theme/css/prettify.css' => 'screen, projection',
					  );
	  $scripts = array(
					   'public/theme/js/jquery-1.5.2.min.js',
					   'public/theme/js/prettify.js',
					   'public/theme/js/application.js',
					   'public/theme/js/bootstrap-dropdown.js',
					   );
	  $this->template->styles = array_merge($this->template->styles, $styles);
	  $this->template->scripts = array_merge($this->template->scripts, $scripts);
	}
	parent::after();
  }
}