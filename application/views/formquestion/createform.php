<div class="page-header">
  <h1>Add a form</h1>
</div>
<?php if (isset($message)) {
  echo '<div><strong><em>' . $message . '</em></strong></div>';
  } ?>
<?php echo Form::open('formquestion/createform/'.$nbr_of_questions); ?>
<fieldset>
  <div class="clearfix">
	<?php echo Form::label('form_slug', 'Form_Slug'); ?>
	<div class="input">
	  <?php echo Form::input('form_slug', NULL, array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'form_slug');
		  } ?>
	  </span>
	</div>
  </div>

<?php
	for ($i = 0; $i < $nbr_of_questions; $i++) {
	  echo '<div class="clearfix">';
	  echo Form::label('question-'.$i, 'Question '.$i);
	  echo '<div class="input">';
	  echo Form::input('question-'.$i, NULL, array('class' => 'xlarge', 'size' => 'span7', 'type' => 'text'));
	  echo '<span class="error">';
	  if (isset($errors))
		echo Arr::get($errors, 'question-'.$i);
	  echo '</span>';
	  echo '</div>';
	  echo '</div>';
	}
   	?>
  <div class="actions">
	<?php echo Form::submit('createform/'.$nbr_of_questions, 'Save modifications'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>

