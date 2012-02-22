<form action="<?php URL::site('/user'); ?>" method="post" accept-charset="utf-8">
    <label for="username">Username:</label>
    <input id="username" type="text" name="username" value="<?php Arr::get($values, 'username'); ?>" />
    <label for="username" class="error"><?php Arr::get($errors, 'username'); ?>
 
    <label for="password">Password:</label>
    <input id="password" type="password" name="password" value="<?php Arr::get($values, 'password'); ?>" />
    <label for="password" class="error"><?php Arr::get($errors, 'password'); ?>
 
    <label for="password_confirm">Repeat Password:</label>
    <input id="password_confirm" type="password" name="_external[password_confirm]" value="<?php Arr::path($values, '_external.password_confirm'); ?>" />
    <label for="password_confirm" class="error"><?php Arr::path($errors, '_external.password_confirm'); ?>
 
    <button type="submit">Create</button>
</form>
