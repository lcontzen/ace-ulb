<h2>Add a New User</h2>
<?php if ($message) : ?>
    <h3 class="message">
        <?php echo $message; ?>
    </h3>
<?php endif; ?>
 
<?php echo Form::open('admin/adduser'); ?>

<?php echo Form::label('first_name', 'Prénom'); ?>
<?php echo Form::input('first_name', HTML::chars(Arr::get($_POST, 'first_name'))); ?>
<div class="error">
    <?php if ($errors) :
   	echo Arr::get($errors, 'first_name');
	endif; ?>
</div>

<?php echo Form::label('last_name', 'Nom'); ?>
<?php echo Form::input('last_name', HTML::chars(Arr::get($_POST, 'last_name'))); ?>
<div class="error">
    <?php if ($errors) :
   	echo Arr::get($errors, 'last_name');
	endif; ?>
</div>

<?php echo Form::label('username', 'Username'); ?>
<?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
<div class="error">
    <?php if ($errors) :
   	echo Arr::get($errors, 'username');
	endif; ?>
</div>
 
<?php echo Form::label('status', 'Status'); ?>
<?php echo Form::input('status', HTML::chars(Arr::get($_POST, 'status'))); ?>
<div class="error">
    <?php
	  if ($errors) :
		echo Arr::get($errors, 'status');
	endif; ?>
</div>

<?php echo Form::label('cercle_id', 'Cercle Id'); ?>
<?php echo Form::input('cercle_id', HTML::chars(Arr::get($_POST, 'cercle_id'))); ?>
<div class="error">
    <?php
	  if ($errors) :
		echo Arr::get($errors, 'cercle_id');
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
 
<?php echo Form::submit('adduser', 'Add User'); ?>
<?php echo Form::close(); ?>
 