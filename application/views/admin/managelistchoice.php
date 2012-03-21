<div class="page-header">
  <h1>Choose list to manage</h1>
</div>

<?php echo Form::open('admin/managelistchoice'); ?>
<fieldset>
  <div class="clearfix">
	<?php echo Form::label('cercle_id', 'Cercle'); ?>
	<div class="input">
	  <?php echo Form::select('cercle_id', $cercles); ?>
	</div>
  </div>
  <div class="actions">
	<?php echo Form::submit('managelistchoice', 'Go'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>
