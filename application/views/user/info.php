<h2>Info for  user "<?php echo $user->username; ?>"</h2>
 
<ul>
    <li>Number of logins: <?php echo $user->logins; ?></li>
    <li>Last Login: <?php echo Date::fuzzy_span($user->last_login); ?></li>
</ul>
<?php echo HTML::anchor('user/promoteadmin', 'Promote admin'); ?>
<br />
<?php echo HTML::anchor('user/logout', 'Logout'); ?>
