<div class="page-header">
  <h1>Login</h1>
</div>
<?php if ($message) : ?>
<h3 class="message">
  <?php echo $message; ?>
</h3>
<?php endif; ?>

<?php echo Form::open('user/login'); ?>
<fieldset>
  <div class="clearfix">
	<?php echo Form::label('username', 'Username'); ?>
	<div class="input">
	  <?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('password', 'Password'); ?>
	<div class="input">
	  <?php echo Form::password('password', HTML::chars(Arr::get($_POST, 'password')), array('class' => 'xlarge', 'size' => '30')); ?>
	</div>
  </div>
  <div class="actions">
	<?php echo Form::submit('login', 'Login'); ?>
  </div>  
</fieldset>
<?php echo Form::close(); ?>
