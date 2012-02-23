<?php
return array(
			 'username' => array(
								 'not_empty' => 'You must provide a username.',
								 'max_length' => 'The username must be less than :param2 characters long.',
								 'username_available' => 'This username is not available.',
								 ),
			 'password' => array(
								 'not_empty' => 'You must provide a password.',
								 ),
			 );
?>