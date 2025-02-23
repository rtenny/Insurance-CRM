<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $this->renderSection('title') ?> | My CRM</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
  <!-- Optionally include the AdminLTE dependencies like FontAwesome, Ionicons, or Google Fonts here -->
  <link rel="stylesheet" href="<?= base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
</head>
<body class="hold-transition layout-top-nav">
<!-- Wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  <?= $this->include('partials/navbar') ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper" style="margin-left: 0;">
    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">
        <?= $this->renderSection('content') ?>
      </div>
    </section>
  </div>

  <!-- Footer -->
  <?= $this->include('partials/footer') ?>

</div>

<!-- Required Scripts -->
<script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
<!-- Add other plugin scripts if you’re using them -->
</body>
</html>
