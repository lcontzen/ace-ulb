<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Article extends ORM {
  public function rules() {
	return array(
				 'slug' => array(
								 array('not_empty'),
								 array('max_length', array(':value', 30)),
								 ),
				 'title' => array(
								  array('not_empty'),
								  array('max_length', array(':value', 50)),
								  ),
				 'body' => array(
								 array('not_empty'),
								 array('max_length', array(':value', 2000)),
								 ),
				 'author_id' => array(
									  array('not_empty'),
									  array('max_length', array(':value', 11)),
									  ),
				 );
  }
}