<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_ComiteeMember extends ORM {  
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
				 'picture_link' => array(
										 array('not_empty'),
										 array('max_length', array(':value', 200)),
										 ),
				 'gsm_number' => array(
										 array('max_length', array(':value', 64)),
										 ),
				 'mail_address' => array(
										 array('max_length', array(':value', 200)),
										 ),
				 );
  }

  public function labels() {
	return array(
				 'first_name' => 'first_name',
				 'last_name' => 'last_name',
				 'picture_link' => 'picture_link',
				 'gsm_number' => 'gsm_number',
				 'mail_address' => 'mail_address',
				 );
  }

  public function create_comitees_member($values, $expected) {
	return $this->values($values, $expected)->create();
  }
}