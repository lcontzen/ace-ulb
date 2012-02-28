<div class="page-header">
  <h1>Edit news <?php echo $article->title; ?></h1>
</div>
<?php
  if (isset($message)) {
	echo '<div><strong><em>' . $message . '</em></strong></div>';
  } ?>

<?php echo Form::open('article/editnews/'.$article->slug); ?>
<fieldset>
  <div class="clearfix">
	<?php echo Form::label('title', 'Titre'); ?>
	<div class="input">
	  <?php echo Form::input('title', $article->title, array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
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
	  <?php echo Form::textarea('body', $article->body, array('class' => 'span7', 'rows' => '10', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'body');
		  } ?>
	  </span>
	</div>
  </div>
  
  <div class="actions">
	<?php echo Form::submit('editnews', 'Save modifications'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>

