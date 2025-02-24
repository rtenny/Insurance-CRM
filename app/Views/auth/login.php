<?= $this->extend('layouts/adminlte_auth') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/" class="h1"><b>Vitalia</b>CRM</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sie müssen sich anmelden um das CRM zu benutzten</p>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form action="/login" method="post">
                <?= csrf_field() ?>
                
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="E-Mail" value="<?= set_value('email') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Passwort">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-7">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Erinnern</label>
                        </div>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary btn-block">Anmelden</button>
                    </div>
                </div>
            </form>

            <p class="mb-1">
                <a href="#">Passwort vergessen?</a>
            </p>
            <p class="mb-0">
                <a href="/register" class="text-center">Neues Konto anlegen</a>
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
