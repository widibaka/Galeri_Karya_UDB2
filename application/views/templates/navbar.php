<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
<<<<<<< Updated upstream
    <li class="nav-item dropdown">
      <a class="nav-link shaking" data-toggle="dropdown" href="javascript:void(0)" onclick="notification_bell()">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge" id="notification-badge">15</span>
=======
    <li class="nav-item dropdown" id="notification_button">
      <a class="nav-link shaking" href="javascript:void(0)" onclick="open_notification(10)">
        <i class="fa fa-bell"></i>
        <span class="badge badge-warning navbar-badge" id="notification-badge" style="display: none;">0</span>
>>>>>>> Stashed changes
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->