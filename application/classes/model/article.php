<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Article extends ORM {
  public function rules() {
	return array(
				 'type' => array(
								 array('not_empty'),
								 array('max_length', array(':value', 10)),
								 ),
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
								 ),
				 'author_id' => array(
									  array('not_empty'),
									  array('max_length', array(':value', 11)),
									  ),
				 );
  }

  public function labels() {
	return array(
				 'type' => 'type',
				 'slug' => 'slug',
				 'title' => 'title',
				 'body' => 'body',
				 'author_id' => 'author_id',
				 );
  }

  public function create_article($values, $expected) {
	return $this->values($values, $expected)->create();
  }

  
  
}