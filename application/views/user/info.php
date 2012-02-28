<div class="page-header">
  <h1>User <?php echo $user->username; ?> </h1> 
</div>
<?php if (isset($message)) {
  echo '<div><strong><em>' . $message . '</em></strong></div>';
  } ?>
 
<ul>
  <li></li>
    <li>Number of logins: <?php echo $user->logins; ?></li>
    <li>Last Login: <?php echo Date::fuzzy_span($user->last_login); ?></li>
</ul>
<?php echo HTML::anchor('user/promoteadmin/'.$user->id, 'Promote admin'); ?>
<br />
<?php echo HTML::anchor('user/logout', 'Logout'); ?>
