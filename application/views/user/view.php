<?php
  if (isset($user)) {
?>
<div class="page-header">
  <h1>Informations about user "<?php echo $user->username; ?>"</h1>
</div>
<ul>
    <li>Number of logins: <?php echo $user->logins; ?></li>
    <li>Last Login: <?php echo Date::fuzzy_span($user->last_login); ?></li>
</ul>
<?php echo HTML::anchor('user/promoteadmin', 'Promote admin'); ?>
<?php
  } else { ?>
<div class="page-header">
  <h1>User not found</h1>
</div>
<?php } ?>
