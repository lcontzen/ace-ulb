<div class="page-header">
  <h1>Contact</h1>
</div>
<div class="row">
  <div class="span11">
	<h3>Formulaire de contact</h3>
	  <?php echo form::open('page/contact'); ?>
	  <?php
   		if(isset($errors)) {
		  foreach($errors as $error) { ?>
			<div><strong><em><?php echo $error; ?> </em></strong></div>
		  <?php }
		}
	  ?>

	  <?php if(isset($message)): ?>
	  <h2><?php echo $message; ?></h2>
	  <?php endif; ?>
	<fieldset>	
	  <div class="clearfix">
		<?php echo form::label('contact_name', 'Nom'); ?>
		<div class="input">
		  <?php echo form::input('contact_name', $form_values['contact_name'], array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
		</div>
	  </div>
	  <div class="clearfix">
		<?php echo form::label('contact_email', 'Adresse Email');?>
		<div class="input">
   <?php echo form::input('contact_email', $form_values['contact_email'], array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
		</div>
	  </div>
	  <div class="clearfix">
		<?php echo form::label('contact_subject', 'Sujet'); ?>
		<div class="input">
		  <?php echo form::input('contact_subject', $form_values['contact_subject'], array('class' => 'xlarge', 'size' => '30', 'type' => 'text')); ?>
		</div>
	  </div>
	  <div class="clearfix">
		<?php echo form::label('contact_message', 'Message'); ?>
		<div class="input">
		  <?php echo form::textarea('contact_message', $form_values['contact_message'], array('class' => 'span7', 'rows' => '5', 'type' => 'text')); ?>
		</div>
	  </div>
	  <div class="actions">
		<?php echo form::submit('contact_submit', 'Envoyer', array('class' => "btn primary")); ?>
	  </div>
	  	</fieldset>
	  <?php echo form::close(); ?>
  </div>
  <div class="span5">
	<h3>Téléphone</h3>
	<p>02/650.25.14 </p>
	<h3>Adresse postale</h3>
	<p>Association des Cercles Etudiants ASBL<br />
	  Av. Paul Héger, 22 CP 166/09  <br />
	  1000 Bruxelles </p>
	<h3>Numéro de compte</h3>
	<p>BE61 001-0810667-17</p>
  </div>
</div>
