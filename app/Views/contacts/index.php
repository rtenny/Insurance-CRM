<?= $this->extend('layouts/adminlte_default') ?>

<?= $this->section('title') ?>
Contacts
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?= base_url('contacts/create') ?>" class="btn btn-success">
        <i class="fas fa-plus"></i> Kontakt hinzufügen
    </a>
</div>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Contacts List</h3>
        </div>
        <div class="card-body">
            <table id="contactsTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Street</th>
                        <th>Postcode</th>
                        <th>Town</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <td>
                                <a href="<?= base_url('contacts/edit/' . $contact['id']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>                            
                            <td><?= esc($contact['id']) ?></td>
                            <td><?= esc($contact['name']) ?></td>
                            <td><?= esc($contact['surname']) ?></td>
                            <td><?= esc($contact['street']) ?></td>
                            <td><?= esc($contact['postcode']) ?></td>
                            <td><?= esc($contact['town']) ?></td>
                            <td><?= esc($contact['age']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function () {
        $('#contactsTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>
