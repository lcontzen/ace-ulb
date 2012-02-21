 <?php echo Form::open(); ?>
 <dl>
   <dt><?php echo Form::label('username', 'User'); ?></dt>
   <dd><?php echo Form::input('username'); ?></dd>
   <dt><?php echo Form::label('password', 'Password'); ?></dt>
   <dd><?php echo Form::input('password'); ?></dd>
 </dl>
<p><?php echo Form::submit(NULL, 'Log in'); ?></p>
<?php echo Form::close(); ?>