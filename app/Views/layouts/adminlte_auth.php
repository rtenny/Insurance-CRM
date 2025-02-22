<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ?> | My CRM</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
</head>
<body class="hold-transition login-page">
    <?= $this->renderSection('content') ?>
    
    <!-- Scripts -->
    <script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
