<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Cercle extends ORM {
  public function labels() {
	return array(
				 'id' => 'id',
				 'name' => 'name',
				 'description' => 'description',
				 'logo_link' => 'logo_link',
				 'website_url' => 'website_url',
				 );
  }
}