<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Template_Printing extends Controller_Template {
  public $template = 'template/printing';

  public function check_admin_status() {
	if (!Auth::instance()->logged_in('admin')) {
	  $this->request->redirect('user/login');
	}
  }

  public function check_logged_in_status() {
	if (!Auth::instance()->get_user()) {
	  $this->request->redirect('user/login');
	}
  }
  
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
					  'public/theme/css/printing.css' => '',
					  );
	  $scripts = array(
					   'public/theme/js/jquery-1.5.2.min.js',
					   'public/theme/js/prettify.js',
					   'public/theme/js/bootstrap-dropdown.js',
					   'public/theme/js/application.js',
					   );
	  if (Auth::instance()->logged_in('admin')) {
		  $dropdownmenu = View::factory('template/dropdownmenuadmin');
		  $this->template->set('dropdownmenu', $dropdownmenu);
	  } else if (Auth::instance()->logged_in('login')) {
		  $dropdownmenu = View::factory('template/dropdownmenuuser');
		  $this->template->set('dropdownmenu', $dropdownmenu);
	  }
	  $this->template->styles = array_merge($this->template->styles, $styles);
	  $this->template->scripts = array_merge($this->template->scripts, $scripts);
	}
	parent::after();
  }
}