<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Formanswer extends ORM {
  public function rules() {
	return array(
				 'form_slug' => array(
									  array('not_empty'),
									  array('max_length', array(':value', 50)),
									  ),
				 'question_id' => array(
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
				 'question_id' => 'question_id',
				 'body' => 'body',
				 );
  }

  public function save_answer($values, $expected) {
	return $this->values($values, $expected)->create();
  }
}