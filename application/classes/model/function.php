<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Function extends ORM {  
  public function rules() {
	return array(
				 'cercle_id' => array(
									  array('not_empty'),
									  array('max_length', array(':value', 11)),
									  ),
				 'comiteemember_id' => array(
									 array('max_length', array(':value', 11)),
									 ),
				 'name' => array(
								 array('not_empty'),
								 array('max_length', array(':value', 50)),
								 ),
				 );
  }

  public function labels() {
	return array(
				 'cercle_id' => 'cercle_id',
				 'comiteemember_id' => 'comiteemember_id',
				 'name' => 'name',
				 );
  }

  public function create_function($values, $expected) {
	return $this->values($values, $expected)->create();
  }
}