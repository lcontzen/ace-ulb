<div class="page-header">
  <h1>Formulaire <?php echo $slug; ?></h1>
</div>
  <?php if (isset($message)) {
  echo '<div><strong><em>' . $message . '</em></strong></div>';
  } ?>
  <?php echo Form::open('formanswer/form/'.$slug, array('class' => 'form-stacked')); ?>
<fieldset>
  <?php
	foreach ($formquestions as $question) {
	  echo '<div class="clearfix">';
	  echo Form::label('question-'.$question->number, $question->body);
	  echo '<div class="input">';
	  echo Form::textarea('question-'.$question->number, NULL, array('class' => 'span12', 'rows' => '7'));
	  echo '<span class="error">';
	  if (isset($errors))
		echo Arr::get($errors, 'question-'.$question->number);
	  echo '</span>';
	  echo '</div>';
	  echo '</div>';
	}
  ?>
  <div class="actions">
	<?php echo Form::submit('form/'.$slug, 'Save modifications'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>

