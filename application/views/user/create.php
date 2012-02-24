<h2>Create a New User</h2>
<?php if ($message) : ?>
    <h3 class="message">
        <?php echo $message; ?>
    </h3>
<?php endif; ?>
 
<?php echo Form::open('user/create'); ?>
 
<?php echo Form::label('username', 'Username'); ?>
<?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
<div class="error">
    <?php if ($errors) :
   	echo Arr::get($errors, 'username');
	endif; ?>
</div>
 
<?php echo Form::label('email', 'Email Address'); ?>
<?php echo Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
<div class="error">
    <?php
	  if ($errors) :
		echo Arr::get($errors, 'email');
	endif; ?>
</div>
 
<?php echo Form::label('password', 'Password'); ?>
<?php echo Form::password('password'); ?>
<div class="error">
    <?php if ($errors) :
	  echo Arr::path($errors, '_external.password');
	endif; ?>
</div>
 
<?php echo Form::label('password_confirm', 'Confirm Password'); ?>
<?php echo Form::password('password_confirm'); ?>
<div class="error">
    <?php if ($errors) :
	  echo Arr::path($errors, '_external.password_confirm');
	endif; ?>
</div>
 
<?php echo Form::submit('create', 'Create User'); ?>
<?php echo Form::close(); ?>
 
<p>Or <?php echo HTML::anchor('user/login', 'login'); ?> if you have an account already.</p>

