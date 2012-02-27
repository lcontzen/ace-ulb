<div class="page-header">
  <h1>Add a new News</h1>
</div>
<?php if ($message) : ?>
<div><strong><em><?php echo $message; ?></em></strong></div>
<?php endif; ?>

<?php echo Form::open('article/addnews'); ?>
<fieldset>
  <div class="clearfix">
	<?php echo Form::label('slug', 'Slug'); ?>
	<div class="input">
	  <?php echo Form::input('slug', HTML::chars(Arr::get($_POST, 'slug')), array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span>
		<?php if ($errors) :
   		  echo Arr::get($errors, 'slug');
		  endif; ?>
	  </span>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('title', 'Titre'); ?>
	<div class="input">
	  <?php echo Form::input('title', HTML::chars(Arr::get($_POST, 'title')), array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php if ($errors) :
			echo Arr::get($errors, 'title');
		  endif; ?>
	  </span>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('body', 'Body'); ?>
	<div class="input">
	  <?php echo Form::textarea('body', HTML::chars(Arr::get($_POST, 'body')), array('class' => 'span7', 'rows' => '10', 'type' => 'text')); ?>
	  <span class="error">
		<?php if ($errors) :
			echo Arr::get($errors, 'body');
		  endif; ?>
	  </span>
	</div>
  </div>
  
  <div class="actions">
	<?php echo Form::submit('addnews', 'Create News'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>

