<div class="page-header">
  <h1>Edition : <?php echo $member->function; ?></h1>
</div>
<?php if (isset($message)) {
  echo '<div><strong><em>' . $message . '</em></strong></div>';
  } ?>
<?php echo Form::open('comitee/editmember/'.$member->id, array('enctype' => 'multipart/form-data')); ?>
<fieldset>
  <div class="clearfix">
	<?php echo Form::label('first_name', 'First_Name'); ?>
	<div class="input">
	  <?php echo Form::input('first_name', $member->first_name, array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'first_name');
		  } ?>
	  </span>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('last_name', 'Last Name'); ?>
	<div class="input">
	  <?php echo Form::input('last_name', $member->last_name, array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'last_name');
		  } ?>
	  </span>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('picture', 'Picture'); ?>
	<div class="input">
	  <?php echo Form::file('picture'); ?>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('gsm_number', 'GSM Number'); ?>
	<div class="input">
	  <?php echo Form::input('gsm_number', $member->gsm_number, array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'gsm_number');
		  } ?>
	  </span>
	</div>
  </div>
  <div class="clearfix">
	<?php echo Form::label('mail_address', 'Mail address'); ?>
	<div class="input">
	  <?php echo Form::input('mail_address', $member->mail_address, array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
	  <span class="error">
		<?php
   		  if (isset($errors)) {
			echo Arr::get($errors, 'mail_address');
		  } ?>
	  </span>
	</div>
  </div>
  
  <div class="actions">
	<?php echo Form::submit('comitee/editmember/'.$member->id, 'Save modifications'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>
