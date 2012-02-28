<div class="page-header">
  <h1>Add a new Page</h1>
</div>
<?php if (isset($message)) {
  echo '<div><strong><em>' . $message . '</em></strong></div>';
  } ?>
<?php echo Form::open('article/addpage'); ?>
<fieldset>
  <div class="clearfix">
	<?php echo Form::label('slug', 'Slug'); ?>
	<div class="input">
	  <?php echo Form::input('slug', NULL, array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'slug');
		  } ?>
	  </span>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('title', 'Titre'); ?>
	<div class="input">
	  <?php echo Form::input('title', NULL, array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'title');
		  } ?>
	  </span>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('body', 'Body'); ?>
	<div class="input">
	  <?php echo Form::textarea('body', NULL, array('class' => 'span12', 'rows' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'body');
		  } ?>
	  </span>
	</div>
  </div>
  
  <div class="actions">
	<?php echo Form::submit('editpage', 'Save modifications'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>

