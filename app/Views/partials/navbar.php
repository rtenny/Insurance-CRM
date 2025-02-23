<!-- app/Views/partials/navbar.php -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= site_url('dashboard') ?>" 
         class="nav-link <?= (current_url() == site_url('dashboard')) ? 'active' : '' ?>">
        <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= site_url('contacts') ?>" 
         class="nav-link <?= (uri_string() == 'contacts') ? 'active' : '' ?>">
        <i class="fas fa-address-book mr-1"></i> Contacts
      </a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= site_url('products') ?>" 
         class="nav-link <?= (uri_string() == 'products') ? 'active' : '' ?>">
        <i class="fas fa-box-open mr-1"></i> Products
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= site_url('users') ?>" 
         class="nav-link <?= (uri_string() == 'users') ? 'active' : '' ?>">
        <i class="fas fa-users-cog mr-1"></i> Users
      </a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
    <form action="<?= site_url('logout') ?>" method="POST">
      <?= csrf_field() ?>
      <button type="submit" class="nav-link btn btn-link">
        <i class="fas fa-sign-out-alt"></i> Logout
      </button>
    </form>
  </li>
  </ul>
</nav>
