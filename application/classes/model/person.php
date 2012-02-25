<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Person extends ORM {
  public function rules() {
	return array(
				 'first_name' => array(
									   array('not_empty'),
									   array('max_length', array(':value', 50)),
									   ),
				 'last_name' => array(
									   array('not_empty'),
									   array('max_length', array(':value', 50)),
									   ),
				 );
  }

  public function labels() {
	return array(
				 'first_name' => 'first_name',
				 'last_name' => 'last_name',
				 );
  }

  public function create_person($values, $expected) {
	return $this->values($values, $expected)->create();
  }
}