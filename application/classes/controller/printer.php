<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Printer extends Controller_Template_Printing {
  public function action_test() {
	$view = View::factory('printer/listsgenerator');
	$this->template->set('content', $view);
  }

  public function action_testpdf() {
	$config = array(
					'author'   => 'Laurent C',
					'title'    => 'Listes ACE 2011-2012',
					'subject'  => 'Your subject',
					'name'     => Text::random().'.pdf', // name file pdf
					);
	$view = View_PDF::factory('printer/listsgenerator', $config);
	$view->render();
	$this->request->body($view);
  }

  public function action_pdfpages() {
	$config = array(
					'author'   => 'Laurent C',
					'title'    => 'Listes ACE 2011-2012',
					'subject'  => 'Your subject',
					'name'     => Text::random().'.pdf', // name file pdf
					);
	$view = View_PDF::factory('printer/pdfpages', $config);
	$view->render();
	$this->request->body($view);
  }
}