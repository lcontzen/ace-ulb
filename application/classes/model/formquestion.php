<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Formquestion extends ORM {
  public function rules() {
	return array(
				 'form_slug' => array(
									  array('not_empty'),
									  array('max_length', array(':value', 50)),
									  ),
				 'number' => array(
								   array('not_empty'),
								   array('max_length', array(':value', 11)),
								   ),
				 'body' => array(
								 array('not_empty'),
								 ),
				 );
  }

  public function labels() {
	return array(
				 'form_slug' => 'form_slug',
				 'number' => 'number',
				 'body' => 'body',
				 );
  }

  public function save_question($values, $expected) {
	return $this->values($values, $expected)->create();
  }
}