<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_User extends ORM {
  public function rules() {
	return array(
				 'username' => array(
									 array('not_empty'),
									 array('max_length', array(':value', 50)),
									 array(array($this, 'username_available')),
									 ),
				 'password' => array(
									 array('not_empty'),
									 ),
				 );
  }

  public function filters() {
	return array(
				 'password' => array(
									 array(array($this, 'hash_password')),
									 ),
				 );
  }

  public function username_available($username) {
	return ORM::factory('user', array('username' => $username))->loaded();
  }

  public function hash_password($password) {
	return sha1($password);
  }
}