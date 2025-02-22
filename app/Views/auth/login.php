<?php if (isset($validation)) : ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<?php if (isset($error)) : ?>
    <div style="color: red;">
        <?= $error ?>
    </div>
<?php endif; ?>

<form action="/login" method="post">
    <?= csrf_field() ?>

    <label>Email</label>
    <input type="email" name="email" value="<?= set_value('email') ?>"><br><br>

    <label>Password</label>
    <input type="password" name="password"><br><br>

    <button type="submit">Login</button>
</form>
