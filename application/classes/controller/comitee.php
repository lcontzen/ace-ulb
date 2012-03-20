<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Comitee extends Controller_Template_Aceulb {
  public function action_view() {
	$this->check_logged_in_status();
	$view = View::factory('comitee/view');
	$name = $this->request->param('name');
	$cercle_id = ORM::factory('cercle')
	  ->where('name', '=', $name)
	  ->find()
	  ->id;
	$comitee_members = ORM::factory('comiteemember')
	  ->where('cercle_id', '=', $cercle_id)
	  ->order_by('id')
	  ->find_all();
	$view->set('comitee_name', $name);
	$view->set('comitee_members', $comitee_members);
	$this->template->set('content', $view);
  }

  public function action_manage() {
	$this->check_logged_in_status();
	$view = View::factory('comitee/manage');
	$cercle_id = Auth::instance()->get_user()->cercle_id;
	$comitee_members = ORM::factory('comiteemember')
	  ->where('cercle_id', '=', $cercle_id)
	  ->order_by('id')
	  ->find_all();
	$cercle = ORM::factory('cercle')
	  ->where('id', '=', $cercle_id)
	  ->find();
	$view->set('cercle', $cercle);
	$view->set('comitee_members', $comitee_members);
	$this->template->set('content', $view);
  }

  private function _treat_picture($picturefile) {
	$pic = Image::factory($picturefile);
	$pic->resize(120, 170);
	$pic->save();
  }


  public function action_editmember() {
	$this->check_logged_in_status();
	$member_id = $this->request->param('id');
	$view = View::factory('comitee/editmember');
	if (!Auth::instance()->logged_in('admin')) {
	  $cercle_id = Auth::instance()->get_user()->cercle_id;
	  $member = ORM::factory('comiteemember')
		->where('cercle_id', '=', $cercle_id)
		->and_where('id', '=', $member_id)
		->find();
	} else {
	  $member = ORM::factory('comiteemember')
		->where('id', '=', $member_id)
		->find();
	}
	if ($member->loaded()) {
	  $file = Validation::factory($_FILES);
	  $file->rule('picture', 'Upload::image');
	  $file->rule('picture', 'Upload::size', array(':value', '3M'));
	  if (HTTP_Request::POST == $this->request->method()) {
		try {
		  $values = $this->request->post();
		  if ($values['first_name'] != $member->first_name)
		  	$member->first_name = $values['first_name'];
		  if ($values['last_name'] != $member->last_name)
		  	$member->last_name = $values['last_name'];
		  if ($values['gsm_number'] != $member->gsm_number)
		  	$member->gsm_number = $values['gsm_number'];
		  if ($values['mail_address'] != $member->mail_address)
		  	$member->mail_address = $values['mail_address'];
		  if ($file->check()) {
			$tmp = explode('.',$file['picture']['name']);
			$ext = $tmp[count($tmp)-1];
			$picture_name = $cercle_id.'-'.$member->id.'.'.$ext;
			$picture_path = 'public/pics/listes/ace/';
			$picturefile = Upload::save($file['picture'], $picture_name, $picture_path);
			if ( $picturefile === false ) {
			  throw new Exception( 'Unable to save uploaded file!' );
			}
			$this->_treat_picture($picturefile);
			$member->picture_link = $picture_path.$picture_name;
		  }
		  $member->save();
		  $this->request->redirect('comitee/manage');
		} catch (ORM_Validation_Exception $e) {
		  $message = 'There were errors, please see form below.';
		  $view->set('message', $message);
		  $errors = $e->errors('models');
		  $view->set('errors', $errors);
		}
	  }		
	  $view->set('member', $member);
	  $this->template->set('content', $view);
	}
  }
}