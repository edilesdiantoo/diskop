<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-5" href="<?php echo base_url('DashboardController'); ?>"><img src="<?= base_url(); ?>assets/images/SINETA3.png" class="mr-2" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('DashboardController'); ?>"><img src="<?= base_url(); ?>assets/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item"><?= $this->session->userdata('nama') ?></li>

      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="icon-mail icon-lg"></i>
          <?php if ($getPelakuUsahaBaru->hitung < 0) {
            echo '';
          } else {
            echo '<span class="count text"></span>';
          }
          ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <a class="dropdown-item preview-item">
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Data Pelaku Usaha</h6>
              <p class="font-weight-light small-text mb-0" style="color: brown;">
                <?= $getPelakuUsahaBaru->hitung ?> Data Belum Periksa
              </p>
            </div>
          </a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="icon-bell mx-0"></i>
          <?php if ($getPelakuUsahaBaru->hitung < 0) {
            echo '';
          } else {
            echo '<span class="count text" "></span>';
          }
          ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <a class="dropdown-item preview-item">
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Data Pelaku Usaha</h6>
              <p class="font-weight-light small-text mb-0" style="color: brown;">
                <?= $getPelakuUsahaBaru->hitung ?> Data Belum Periksa
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <!-- <img src="<?= base_url(); ?>assets/images/faces/face30.jpg" alt="profile" /> -->
          <i class="material-icons" style="color: gray;font-size:36px;">&#xe7fd;</i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item">
            <i class="material-icons" style="color: red; font-size:25px;">&#xe0c8;</i>
            <?= $this->session->userdata('kab_name') ?>
          </a>
          <a class="dropdown-item">
            <i class="material-icons" style="color: gray; font-size:25px;">&#xe838;</i>
            <?= $this->session->userdata('jabatan') ?>
          </a>
          <a class="dropdown-item">
            <i class="material-icons" style="color: gray; font-size:23px;">&#xe0da;</i>
            <?= $this->session->userdata('level') ?>
          </a>
          <a href="<?= base_url('LoginDiskopController/logout') ?>" class="dropdown-item">
            &nbsp;<i class="ti-power-off text-primary"></i>
            &nbsp;Logout
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>