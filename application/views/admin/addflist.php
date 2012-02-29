<div class="page-header">
  <h1>Add a Functions list</h1>
</div>
<?php if (isset($message)) {
  echo '<div><strong><em>' . $message . '</em></strong></div>';
  } ?>
<?php echo Form::open('admin/addflist'); ?>
<fieldset>
  <div class="clearfix">
	<?php echo Form::label('cercle_id', 'Cercle'); ?>
	<div class="input">
	  <?php echo Form::select('cercle_id', $cercles); ?>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('functions', 'Functions list'); ?>
	<div class="input">
	  <?php echo Form::textarea('functions', NULL, array('class' => 'span12', 'rows' => '10', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'functions');
		  } ?>
	  </span>
	</div>
  </div>

  <div class="actions">
	<?php echo Form::submit('addflist', 'Save modifications'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>

