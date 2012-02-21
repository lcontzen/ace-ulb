<form action="<?= URL::site('/members'); ?>" method="post" accept-charset="utf-8">
    <label for="username">Username:</label>
    <input id="username" type="text" name="username" value="<?= Arr::get($values, 'username'); ?>" />
    <label for="username" class="error"><?= Arr::get($errors, 'username'); ?>
 
    <label for="password">Password:</label>
    <input id="password" type="password" name="password" value="<?= Arr::get($values, 'password'); ?>" />
    <label for="password" class="error"><?= Arr::get($errors, 'password'); ?>
 
    <label for="password_confirm">Repeat Password:</label>
    <input id="password_confirm" type="password" name="_external[password_confirm]" value="<?= Arr::path($values, '_external.password_confirm'); ?>" />
    <label for="password_confirm" class="error"><?= Arr::path($errors, '_external.password_confirm'); ?>
 
    <button type="submit">Create</button>
</form>
