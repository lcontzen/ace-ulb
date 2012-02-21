<?php defined('SYSPATH') or die('No direct script access.');
class Kohana_Exception extends Kohana_Kohana_Exception {
  public static function handler(Exception $e) {
	if (Kohana::DEVELOPMENT === Kohana::$environment) {
	  parent::handler($e);
	}
  }
  else {
	try {
	  Kohana::$log->add(Log::ERROR, parent::text($e));
	  $attributes = array(
						  'controller' => 'error',
						  'action' => 500,
						  'message' => rawurlencode($e->getMessage())
						  );
	  if ($e instanceof HTTP_Exception) {
		$attributes['action'] = $e->getCode();
	  }
	  echo Request::factory(Route::get('error')->uri($attributes))
		->execute()
		->send_headers()
		->body();
	}
	catch (Exception $e) {
	  ob_get_level() and ob_clean();
	  echo parent::text($e);
	  exit(1);
	}
  }
}
