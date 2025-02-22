<?php if (isset($validation)) : ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="/register" method="post">
    <?= csrf_field() ?>

    <label>Username</label>
    <input type="text" name="username" value="<?= set_value('username') ?>"><br><br>

    <label>Email</label>
    <input type="email" name="email" value="<?= set_value('email') ?>"><br><br>

    <label>Password</label>
    <input type="password" name="password"><br><br>

    <label>Confirm Password</label>
    <input type="password" name="password_confirm"><br><br>

    <button type="submit">Register</button>
</form>
