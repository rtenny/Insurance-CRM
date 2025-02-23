<?= $this->extend('layouts/adminlte_default') ?>

<?= $this->section('title') ?>
Edit Contact
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Contact</h3>
        </div>
        <div class="card-body">
            <!-- Show Validation Errors -->
            <?php if (session()->has('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('contacts/update/' . $contact['id']) ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= esc($contact['name']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname" class="form-control" value="<?= esc($contact['surname']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="text" name="street" class="form-control" value="<?= esc($contact['street']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" class="form-control" value="<?= esc($contact['postcode']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="town">Town</label>
                    <input type="text" name="town" class="form-control" value="<?= esc($contact['town']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control" value="<?= esc($contact['age']) ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Contact</button>
                <a href="<?= base_url('contacts') ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
