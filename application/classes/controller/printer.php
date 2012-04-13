<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Printer extends Controller_Template_Printing {
  public function action_pdflists() {
    set_time_limit(600);
	$config = array(
					'author'   => 'Laurent C',
					'title'    => 'Listes ACE 2011-2012',
					'subject'  => 'Your subject',
					'name'     => Text::random().'.pdf', // name file pdf
					);
	$view = View_PDF::factory('printer/lists', $config);
	$cercles = array();
	$cercles_temp = ORM::factory('cercle')
	  ->order_by('id')
	  ->find_all();
	$count = 0;
	foreach ($cercles_temp as $cercle) {
	  $cercles[$count]['name'] = $cercle->name;
	  $comitee_members =  ORM::factory('comiteemember')
	  ->where('cercle_id', '=', $cercle->id)
	  ->order_by('id')
	  ->find_all();
	  $cercles[$count]['comitee_members'] = $comitee_members;
	  $count = $count + 1;
	}
	$view->set('count', $count);
	$view->set('cercles', $cercles);
	$view->render();
	$this->request->redirect($this->request->referrer());
  }
}