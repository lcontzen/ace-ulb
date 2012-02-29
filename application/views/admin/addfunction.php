<div class="page-header">
  <h1>Add a new Page</h1>
</div>
<?php if (isset($message)) {
  echo '<div><strong><em>' . $message . '</em></strong></div>';
  } ?>
<?php echo Form::open('admin/addfunction'); ?>
<fieldset>
  <div class="clearfix">
	<?php echo Form::label('cercle_id', 'Cercle'); ?>
	<div class="input">
	  <?php echo Form::select('cercle_id', $cercles); ?>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('comiteemember_id', 'comiteemember_id'); ?>
	<div class="input">
	  <?php echo Form::input('comiteemember_id', NULL, array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'comiteemember_id');
		  } ?>
	  </span>
	</div>
  </div>

  <div class="clearfix">
	<?php echo Form::label('name', 'Name'); ?>
	<div class="input">
	  <?php echo Form::input('name', NULL, array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'name');
		  } ?>
	  </span>
	</div>
  </div>

  <div class="actions">
	<?php echo Form::submit('addfunction', 'Save modifications'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>

