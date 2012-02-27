<div class="page-header">
  <h1>Add a New User</h1>  
</div>
<?php if ($message) : ?>
<div><strong><em><?php echo $message; ?></em></strong></div>
<?php endif; ?>

<?php echo Form::open('user/add'); ?>
<fieldset>
  <div class="clearfix">
	<?php echo Form::label('first_name', 'Prénom'); ?>
	<div class="input">
	  <?php echo Form::input('first_name', HTML::chars(Arr::get($_POST, 'first_name')), array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span>
		<?php if ($errors) :
   		  echo Arr::get($errors, 'first_name');
		  endif; ?>
	  </span>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('last_name', 'Nom'); ?>
	<div class="input">
	  <?php echo Form::input('last_name', HTML::chars(Arr::get($_POST, 'last_name')), array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php if ($errors) :
			echo Arr::get($errors, 'last_name');
		  endif; ?>
	  </span>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('username', 'Username'); ?>
	<div class="input">
	  <?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php if ($errors) :
			echo Arr::get($errors, 'username');
		  endif; ?>
	  </span>  
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('status', 'Status'); ?>
	<div class="input">
	  <?php echo Form::input('status', HTML::chars(Arr::get($_POST, 'status')), array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php if ($errors) :
			echo Arr::get($errors, 'status');
		  endif; ?>
	  </span>
	</div>  
  </div>

  <div class="clearfix">
	<?php echo Form::label('cercle_id', 'Cercle'); ?>
	<div class="input">
	  <?php echo Form::select('cercle_id', $cercles); ?>
	</div>
  </div>
  

  <div class="clearfix">
	<?php echo Form::label('password', 'Password'); ?>
	<div class="input">
	  <?php echo Form::password('password', NULL, array('class' => 'xlarge', 'size' => '30')); ?>
	  <span class="error">
		<?php if ($errors) :
			echo Arr::path($errors, '_external.password');
		  endif; ?>
	  </span>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('password_confirm', 'Confirm Password'); ?>
	<div class="input">
			<?php echo Form::password('password_confirm', NULL, array('class' => 'xlarge', 'size' => '30')); ?>
	  <span class="error">
		<?php if ($errors) :
			echo Arr::path($errors, '_external.password_confirm');
		  endif; ?>
	  </span>
	</div>
  </div>
  <div class="actions">
	<?php echo Form::submit('add', 'Add User'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>
