<h2>Login</h2>
<?php if ($message) : ?>
    <h3 class="message">
        <?php echo $message; ?>
    </h3>
<?php endif; ?>

<?php echo Form::open('user/login'); ?>
 
<?php echo Form::label('username', 'Username'); ?>
<?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
 <br />
<?php echo Form::label('password', 'Password'); ?>
<?php echo Form::password('password'); ?>
 <br />
<?php echo Form::label('remember', 'Remember Me'); ?>
<?php echo Form::checkbox('remember'); ?>
 <br />
<p>(Remember Me keeps you logged in for 2 weeks)</p>
 <br />
<?php echo Form::submit('login', 'Login'); ?>
<?php echo Form::close(); ?>
 <br />
<p>Or <?php echo HTML::anchor('user/create', 'create a new account'); ?></p>
